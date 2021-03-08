<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetails::class);
    }

    public function getCreatedAtAttribute()
    {
        \Carbon\Carbon::setLocale('id');
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y H:i');
    }
}
