<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $products = Products::get();
        return view('content.user.home', compact('products'));
    }
}
