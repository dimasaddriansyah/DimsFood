<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Transaction;
use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users      = Users::count();
        $foods      = Products::where('category', 'Food')->count();
        $drinks     = Products::where('category', 'Drink')->count();
        $products   = Products::count();
        $income     = Transaction::sum('total_price');
        $critical   = Products::where('stock','<',5)->where('stock','>',0)->count();
        $sold       = Products::where('stock','=',0)->count();

        return view('content.admin.dashboard', compact('users', 'foods', 'drinks', 'products', 'income', 'critical', 'sold'));
    }

    public function getUsers()
    {
        $users = Users::get();

        return view('content.admin.users.index', compact('users'));
    }

    public function addProducts()
    {
        return view('content.admin.products.addProducts');
    }

    public function productsStore(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|unique:products|min:4|regex:/^[\pL\s\-]+$/u',
                'stock' => 'required|numeric|min:1',
                'price' => 'required|numeric|min:1',
                'description' => 'required|min:5',
                'category' => 'required',
                'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]
        );

        $file = $request->file('image');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'uploads/products/';
        $file->move($tujuan_upload, $nama_file);

        $products = new Products();
        $products->name = ucwords($request->name);
        $products->stock = $request->stock;
        $products->price = $request->price;
        $products->description = ucwords($request->description);
        $products->category = $request->category;
        $products->image = $nama_file;
        $products->save();


        if ($products->category == 'Food') {

            alert()->success('Food was created', 'Success');
            return redirect()->route('foods.index');
        } else {

            alert()->success('Drink was created', 'Success');
            return redirect()->route('drinks.index');
        }
    }
}
