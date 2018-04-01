<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }

    public function index()
    {
        $categories = Category::all();

        foreach($categories as $category) {
            if (substr($category->image, 0, 4) != 'http') {
                $category->image = "data:image;base64," . $category->image;
            }
        }

        return view('pages.categoryoverview', compact( 'categories'));
    }

    public function show($category)
    {
        $products = Product::getAllProductsByCategory($category)->paginate(10);

        foreach($products as $product) {
            if (substr($product->image, 0, 4) != 'http') {
                $product->image = "data:image;base64," . $product->image;
            }
        }

        return view('pages.category', compact('products', 'category'));
    }

    public function categoryIndex() {
        $categories = Category::all();

        return view('pages.admin.categories.index', compact('categories'));
    }

    public function create() {
        return view('pages/admin/categories/create');
    }

    public function edit($category) {
        $category = Category::find($category);
        if (substr($category->image, 0, 4) != 'http') {
            $category->image = "data:image;base64," . $category->image;
        }

        return view('pages/admin/categories/edit', compact('category'));
    }

    public function update() {
        $this->validate(request(), [
            'category' => 'required|min:2',
        ]);
        
        $category = Category::find(request('category_old'));
        $category->category = request('category');
        $category->save();

        return redirect('/admin/categories');
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'category' => 'required|min:2',
            'description' => 'required',
            'image' => 'required|max:64'
        ]);

        $image = addslashes($request->file('image'));
        $image = file_get_contents($image);
        $image = base64_encode($image);

        $category = new Category();
        $category->category = request('category');
        $category->image = $image;
        $category->description = request('description');
        $category->save();

        return redirect('/../admin/categories');
    }
    public function remove($category) {
        Category::find($category)->delete();
        return redirect('/../admin/categories');
    }
}
