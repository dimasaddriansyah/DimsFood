<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';

    public function pengguna()
    {
        return $this->belongsTo('App\pengguna', 'pengguna_id', 'id');
    }

    public function pesanan()
    {
        return $this->belongsTo('App\pesanan', 'pesanan_id', 'id');
    }
}
