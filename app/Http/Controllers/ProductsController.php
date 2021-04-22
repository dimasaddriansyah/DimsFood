<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products   = Products::get();
        $critical   = Products::where('stock','<',5)->where('stock','>',0)->count();
        $sold       = Products::where('stock','=',0)->count();
        $drinks     = Products::where('category', 'drink')->get();
        $foods      = Products::where('category', 'food')->get();

        return view('content.admin.products.index', compact('products', 'critical', 'sold', 'drinks', 'foods'));
    }

    public function critical()
    {
        $products   = Products::where('stock','<',5)->where('stock','>',0)->get();

        return view('content.admin.products.criticalProducts', compact('products'));
    }

    public function sold()
    {
        $products       = Products::where('stock','=',0)->get();

        return view('content.admin.products.soldProducts', compact('products'));
    }
}
