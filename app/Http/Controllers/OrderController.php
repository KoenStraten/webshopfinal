<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductInCart;
use App\ShoppingCart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        /*SELECT users.name, shopping_carts.total_cost, shopping_carts.paid, COUNT(product_in_shopping_cart.id) FROM shopping_carts
        JOIN users ON users.id = shopping_carts.user_id
        JOIN product_in_shopping_cart ON shopping_carts.id = product_in_shopping_cart.shopping_cart_id
        GROUP BY shopping_carts.id*/
        $orders = ShoppingCart::selectRaw(DB::raw('shopping_carts.id as "id", users.name as "username", shopping_carts.total_cost as "total_cost", shopping_carts.paid as "paid", COUNT(product_in_shopping_cart.id) as "amountOfProducts"'))
            ->join('users', 'users.id', '=', 'shopping_carts.user_id')
            ->leftJoin('product_in_shopping_cart', 'shopping_carts.id', '=', 'product_in_shopping_cart.shopping_cart_id')
            ->groupBy('shopping_carts.id', 'users.name', 'shopping_carts.total_cost', 'shopping_carts.paid')
            ->orderBy('shopping_carts.id')->get();

        return view('pages.admin.orders.index', compact( 'orders'));
    }

    public function create() {
        $users = User::all();
        $products = Product::all();
        $cheeseTypes = DB::table('cheese_types')->get();
        return view('pages/admin/orders/create', compact('users', 'products', 'cheeseTypes'));
    }

    public function edit($category) {
        $category = Category::find($category);
        return view('pages/admin/orders/edit', compact('category'));
    }

    public function update() {
        return redirect('/admin/orders');
    }

    public function store() {
        $this->validate(request(), [
            'products' => 'required',
            'cheeseTypes' => 'required',
            'amount' => 'required'
        ]);

        $shoppingCart = new ShoppingCart();
        $shoppingCart->user_id = request('user');
        $shoppingCart->paid = request('paid');
        $shoppingCart->total_cost = 0;
        $shoppingCart->save();

        $products = request('products');
        $cheeseTypes = request('cheeseTypes');
        $amounts = request('amount');

        $totalCost = 0;

        for($i = 0; $i < count($products); $i++) {
            if (isset($amounts[$i])) {
                for ($j = 0; $j < $amounts[$i]; $j++) {
                    $totalCost = $totalCost + Product::find($products[$i])->price;
                    $pic = new ProductInCart();
                    $pic->product_id = $products[$i];
                    $pic->shopping_cart_id = $shoppingCart->id;
                    $pic->cheese_type = $cheeseTypes[$i];
                    $pic->save();
                }
            }
        }

        $shoppingCart->total_cost = $totalCost;
        $shoppingCart->save();

        return redirect('/../admin/orders');
    }
    public function remove($id) {
        ShoppingCart::find($id)->delete();
        return redirect('/../admin/orders');
    }
}
