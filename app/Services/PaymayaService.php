<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PaymayaService {
    public function __construct() {
    
    }

    public function pay(array $request_model) {
        try {
            $authToken = base64_encode(config('services.paymaya.api_key') . ":");
            
            $url = config('services.paymaya.url');

            $response = Http::withHeaders([
                'accept' => 'application/json',
                'content-type' => 'application/json',
                'Authorization' => 'Basic ' . $authToken,
            ])->post($url, $request_model);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200) {
                $content = json_decode($response->getBody()->getContents());
                throw new Exception($content->error . ' in Paymaya Payment Gateway.');
            }

            $responseData = json_decode($response->getBody(), true);
            return $responseData;

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createRequestModel($transaction, $paymaya_user_details) {
        return [
            "totalAmount" => [
                "value" => $transaction->total_amount,
                "currency" => "PHP",
            ],
            "buyer" => [
                "firstName" => $paymaya_user_details['firstname'] ?? '',
                "lastName" => $paymaya_user_details['lastname'] ?? '',
            ],
            "requestReferenceNumber" => $transaction->reference_code,
        ];
    }
}