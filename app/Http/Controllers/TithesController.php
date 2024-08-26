<?php

namespace App\Http\Controllers;

use App\Models\Tithe;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserTransactionDetail;
use App\Services\PaymayaService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class TithesController extends Controller
{   
    private $paymayaService;
    public function __construct(PaymayaService $paymayaService) {
        $this->paymayaService = $paymayaService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $endPoint = 'list';

        if($request->ajax()) {
            $tithes = Tithe::query();
            return DataTables::of($tithes)
                ->addColumn('user', function ($row) {
                    return ($row->user->first_name ?? ' ') . ' ' . ($row->user->last_name ?? ' ');
                })
                ->editColumn('amount', function ($row) {
                    return number_format($row->amount,2);
                })
                ->addColumn('section', function ($row) {
                    return $row->user->section->name ?? 'No Section Found';
                })
                ->editColumn('status', function ($row) {
                    if($row->status == 'paid') {
                        return "<div class='badge bg-success'>Paid</div>";
                    } 

                    if($row->status == 'unpaid') {
                        return "<div class='badge bg-warning'>Unpaid</div>";
                    } 

                })
                ->addColumn('actions', function ($tithe) {
                    $actions = "<div class='hstack gap-2'>
                        <a href='" . route('tithes.show', ['tithe' => $tithe->id]) . "' class='btn btn-soft-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='View'><i class='ri-eye-fill align-bottom'></i></a>
                        <button type='button' class='btn btn-soft-danger btn-sm remove-btn' id='" . $tithe->id . "' data-bs-toggle='tooltip' data-bs-placement='top' title='Remove'><i class='ri-delete-bin-5-fill align-bottom'></i></button>
                    </div>";

                    return $actions;
                })
                ->rawColumns(['actions', 'status'])
                ->make(true);
        }

        return view("pages.tithes.list", compact("endPoint"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $endPoint = 'create';
        return view('pages.tithes.create', compact('endPoint'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        try {
            DB::beginTransaction();

            $user = User::where('mfc_id_number', $request->mfc_user_id)->first();
            if(!$user) throw new Exception("User not found based on your mfc user id.", 404);

            $transaction_code = generateTransactionCode();
            $reference_code = generateReferenceCode();
    
            $transaction = Transaction::create([
                "transaction_code" => $transaction_code,
                "reference_code" => $reference_code,
                "sub_amount" => $request->amount,
                "total_amount" => $request->amount,
                "payment_mode" => "N/A",
                "payment_type" => "tithe",
                "status" => "pending",
            ]);

            UserTransactionDetail::create([
                "transaction_id" => $transaction->id,
                "first_name" => $user->first_name ?? ($request->firstname ?? "No First Name Found"),
                "last_name" => $user->last_name ??  ($request->lastname ?? "No Last Name Found"),
                "email" => $user->email ?? ($request->email ?? "No Email Found"),
                "contact_number" => $user->contact_number ?? ($request->contact_number ?? "000000000000"),
                "address" => $user->address ?? ($request->address ?? "No Address Found"),
            ]);

            Tithe::create([
                "mfc_user_id" => $user->mfc_id_number,
                "transaction_id" => $transaction->id,
                "payment_mode" => "N/A",
                "amount" => $request->amount,
                "status" => "unpaid", 
            ]);

            $payment_request_model = $this->paymayaService->createRequestModel($transaction);

            $payment_response = $this->paymayaService->pay($payment_request_model);

            $transaction->update([
                'checkout_id' => $payment_response['checkoutId'],
                'payment_link' => $payment_response['redirectUrl'],
            ]);
            
            DB::commit();

            return redirect($payment_response['redirectUrl']);

        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('fail', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $endPoint = "Details";
        $tithe = Tithe::findOrFail($id);
        return view('pages.tithes.show', compact('tithe', 'endPoint'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
