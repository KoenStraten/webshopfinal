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
        return view('pages/admin/products/edit', compact('categories', 'product'));
    }

    public function update(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:4',
            'price' => 'required|numeric|min:0',
            'description' => 'required|min:20',
            'category' => 'required',
        ]);

        if ($request->file('image')) {
            $path = $request->file('image')->store('public');
            $path = str_replace('public', '/storage', $path);
        }

        $product = Product::find(request('id'));
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');
        if (isset($path)) {
            $product->image = $path;
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
        ]);

        $path = $request->file('image')->store('public');

        $path = str_replace('public', '/storage', $path);

        $product = new Product();
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');
        $product->image = $path;
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
