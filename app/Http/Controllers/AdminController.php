<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
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
        $orderAmount = 0;
        $productAmount = Product::count();
        $categoryAmount = Category::count();

        $recentUsers = User::orderBy('created_at', 'desc')->limit(10)->get();
        $mbProducts = Product::orderByPopularity()->limit(10)->get();

        return view('pages.admin.dashboard', compact('userAmount', 'orderAmount', 'productAmount', 'categoryAmount', 'recentUsers', 'mbProducts'));
    }
}
