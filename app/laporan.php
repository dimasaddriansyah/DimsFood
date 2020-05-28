<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    protected $table = 'laporan';
    
    public function pesanan()
    {
        return $this->belongsTo('App\pesanan', 'pesanan_id', 'id');
    }
}
