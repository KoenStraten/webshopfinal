<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::orderBy('times_sold', 'desc')->limit(5)->get();
        $products = Product::orderByPopularity()->limit(5)->get();
        foreach($products as $product) {
            if (substr($product->image, 0, 4) != 'http') {
                $product->image = "data:image;base64," . $product->image;
            }
        }
        $populairProduct = $products->first();

        return view('welcome', compact('products', 'populairProduct'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (substr($product->image, 0, 4) != 'http') {
            $product->image = "data:image;base64," . $product->image;
        }
        $cheeseTypes = DB::table('cheese_types')->get();

        return view('pages.product', compact('product', 'cheeseTypes'));

    }
}
