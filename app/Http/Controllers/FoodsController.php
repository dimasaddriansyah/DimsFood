<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function index()
    {
        $foods = Products::where('category', 'food')->get();

        return view('content.admin.products.foods.index', compact('foods'));
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

        $foods = Products::find($id);
        $foods->name = ucwords($request->name);
        $foods->stock = $request->stock;
        $foods->price = $request->price;
        $foods->description = ucfirst($request->description);

        if (empty($request->image)) {
            $foods->image = $foods->image;
        } else {
            unlink('uploads/products/' . $foods->image); //menghapus file lama
            $file = $request->file('image'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move('uploads/products/', $nama_file); // isi dengan nama folder tempat kemana file diupload
            $foods->image = $nama_file;
        }
        $foods->save();

        alert()->success('Food was updated !', 'Success');
        return redirect()->route('foods.index');
    }

    public function destroy($id)
    {
        Products::find($id)->delete();

        return redirect()->route('foods.index');
    }
}
