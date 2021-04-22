<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetails::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function users()
    {
        return $this->belongsTo(Users::class, 'users_id', 'id');
    }

    public function getCreatedAtAttribute()
    {
        \Carbon\Carbon::setLocale('id');
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y H:i');
    }

    public function getUpdatedAtAttribute()
    {
        \Carbon\Carbon::setLocale('id');
        return \Carbon\Carbon::parse($this->attributes['updated_at']);
    }
}
