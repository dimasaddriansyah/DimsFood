<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $table = 'pengguna';
    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'no_hp',
    ]; //field tabel

    public $timestamps = false;

    public function transaksi_barang()
    {
        return $this->hasMany('App\transaksi_barang');
    }
}
