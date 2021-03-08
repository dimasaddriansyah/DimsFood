<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';

    public function products()
    {
        return $this->belongsTo(Products::class, 'products_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(transaction::class, 'transaction_id', 'id');
    }
}
