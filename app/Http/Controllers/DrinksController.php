<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use SweetAlert;
use Throwable;

class DrinksController extends Controller
{
    public function index()
    {
        $drinks = Products::where('category', 'drink')->get();
        $critical   = Products::where('category', 'drink')->where('stock','<',5)->where('stock','>',0)->count();
        $sold       = Products::where('category', 'drink')->where('stock','=',0)->count();

        return view('content.admin.products.drinks.index', compact('drinks', 'critical', 'sold'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|min:4|unique:products,name,' . $id,
                'stock' => 'required|numeric|min:1',
                'price' => 'required|min:1',
                'description' => 'required|min:5',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]
        );

        $drinks = Products::find($id);
        $drinks->name = ucwords($request->name);
        $drinks->stock = $request->stock;
        $drinks->price = $request->price;
        $drinks->description = ucfirst($request->description);

        if (empty($request->image)) {
            $drinks->image = $drinks->image;
        } else {
            unlink('uploads/products/' . $drinks->image); //menghapus file lama
            $file = $request->file('image'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move('uploads/products/', $nama_file); // isi dengan nama folder tempat kemana file diupload
            $drinks->image = $nama_file;
        }
        $drinks->save();

        alert()->success('Drink was updated', 'Success');
        return redirect()->route('drinks.index');
    }

    public function destroy($id)
    {
        try {
            Products::find($id)->delete();

            alert()->success('Drink was deleted!', 'Success');
            return redirect()->route('drinks.index');
        } catch (Throwable $e) {

            alert()->error('Something when wrong!', 'Error');
            return redirect()->route('drinks.index');
        }
    }
}
