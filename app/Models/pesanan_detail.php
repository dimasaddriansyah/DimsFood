<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesanan_detail extends Model
{
    protected $table = 'pesanan_detail';

    public function barang()
    {
        return $this->belongsTo('App\barang', 'barang_id', 'id');
    }

    public function pesanan()
    {
        return $this->belongsTo('App\pesanan', 'pesanan_id', 'id');
    }
}
