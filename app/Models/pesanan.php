<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $table = 'pesanan';

    public function pesanan_detail()
    {
        return $this->hasMany('App\pesanan_detail');
    }

    public function pengguna()
    {
        return $this->belongsTo('App\pengguna', 'pengguna_id', 'id');
    }

    public function getCreatedAtAttribute()
    {
        \Carbon\Carbon::setLocale('id');
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y H:i');
    }

    public function getTanggalAttribute()
    {
        \Carbon\Carbon::setLocale('id');
        return \Carbon\Carbon::parse($this->attributes['tanggal'])
            ->translatedFormat('l, d F Y H:i');
    }

    public function getUpdatedAtAttribute()
    {
        \Carbon\Carbon::setLocale('id');
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
            ->translatedFormat();
    }
}
