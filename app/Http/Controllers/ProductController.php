<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $products = Product::all();
        return view('pages/admin/products/index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages/admin/products/create', compact('categories'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        if (substr($product->image, 0, 4) != 'http') {
            $product->image = "data:image;base64," . $product->image;
        }

        return view('pages/admin/products/edit', compact('categories', 'product'));
    }

    public function update(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:4',
            'price' => 'required|numeric|min:0',
            'description' => 'required|min:20',
            'category' => 'required',
            'image' => 'max:1024'
        ]);

        if ($request->file('image')) {
            $image = addslashes($request->file('image'));
            $image = file_get_contents($image);
            $image = base64_encode($image);
        }

        $product = Product::find(request('id'));
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');
        if (isset($image)) {
            $product->image = $image;
        }
        $product->category = request('category');
        $product->save();

        return redirect('/admin/products');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:4',
            'price' => 'required|numeric|min:0',
            'description' => 'required|min:20',
            'category' => 'required',
            'image' => 'required|max:1024',
        ]);

        $image = addslashes($request->file('image'));
        $image = file_get_contents($image);
        $image = base64_encode($image);

        $product = new Product();
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');
        $product->image = $image;
        $product->category = request('category');
        $product->save();

        return redirect('/../admin/products');
    }

    public function remove($id)
    {
        Product::find($id)->delete();
        return redirect('/../admin/products');
    }
}
