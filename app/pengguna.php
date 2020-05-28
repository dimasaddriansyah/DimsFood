<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $table = 'pengguna';

    public function transaksi_barang()
    {
        return $this->hasMany('App\transaksi_barang');
    }
}
