<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class login_pengguna extends Authenticatable
{
    protected $table = 'pengguna';
}
 