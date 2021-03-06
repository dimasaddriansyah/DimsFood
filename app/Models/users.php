<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class users extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
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
