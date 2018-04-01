<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ShoppingCart;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {
        $userAmount = User::count();
        $orderAmount = ShoppingCart::getAllOrders()->count();
        $productAmount = Product::count();
        $categoryAmount = Category::count();

        $recentUsers = User::orderBy('created_at', 'desc')->limit(10)->get();
        $mbProducts = Product::orderByPopularity()->limit(10)->get();
        foreach($mbProducts as $product) {
            if (substr($product->image, 0, 4) != 'http') {
                $product->image = "data:image;base64," . $product->image;
            }
        }

        return view('pages.admin.dashboard', compact('userAmount', 'orderAmount', 'productAmount', 'categoryAmount', 'recentUsers', 'mbProducts'));
    }
}
