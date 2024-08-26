<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";
    protected $fillable = ["transaction_code", "reference_code", "sub_amount", "total_amount", "payment_mode", "payment_type", "checkout_id", "payment_link", "status"];

    public function user_details() {
        return $this->hasOne(UserTransactionDetail::class, "transaction_id");
    }
}
