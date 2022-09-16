<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    public function index()
    {
        $data_product = Product::all();
        $category = Category::all();
        return view('product', [
            'data_product' => $data_product,
            'category' => $category
        ]);
    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();

        return redirect('/');
    }

    public function addProduct()
    {
        $category = Category::all();
        return view('add_product', ['category' => $category]);
    }

    public function edit($id)
    {
        $edit_product = Product::find($id);
        return view('edit_product', ['edit_product' => $edit_product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'stock' => 'required'
        ]);
        Product::where('id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'weight' => $request->weight,
                'stock' => $request->stock,
                'category_id' => $request->category,
            ]);
        return redirect()->route('index');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product,name',
            'description' => 'required',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->save();
        return redirect('/');
    }
}
