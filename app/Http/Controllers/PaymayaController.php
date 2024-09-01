<?php

namespace App\Http\Controllers;

use App\Enum\PaymentType;
use App\Models\Tithe;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymayaController extends Controller
{
    public function payment_success(Request $request) {
        $reference_number = $request->requestReferenceNumber;
        $payment_id = $request->id;

        $transaction = Transaction::where('reference_code', $reference_number)->first();

        abort_if(!$transaction, 404);

        if($request->isPaid) {
            $transaction->update([
                'status' => 'paid',
            ]);

            if($transaction->payment_type === PaymentType::TITHE) {
                $tithe = Tithe::where('transaction_id', $transaction->id)->first();

                $tithe->update([
                    'status' => "paid",
                ]);
            }
        }

        return response(['message' => "OK"], 200);
    }


}
