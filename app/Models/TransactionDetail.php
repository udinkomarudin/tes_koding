<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';

    protected $fillable = [
        'document_code',
        'document_number',
        'product_code',
        'price',
        'currency',
        'quantity',
        'unit',
        'sub_total',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
