<?php

namespace App\Http\Controllers;

use App\Category;
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
            ->orderBy('users.name')->get();

        return view('pages.admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        return view('pages/admin/orders/create', compact('users'));
    }

    public function edit($order_id)
    {
//        $category = Category::find($order);
        $order = ShoppingCart::find($order_id);
        $user = User::find($order->user_id);
        $productsInCart = ProductInCart::all()->where('shopping_cart_id', $order->id);

        $products = array();

        foreach ($productsInCart as $productInCart) {
            $product = Product::find($productInCart);
            array_push($products, $product);
        }

//        $orders = ShoppingCart::selectRaw(DB::raw('shopping_carts.id as "id", users.name as "username", shopping_carts.total_cost as "total_cost", shopping_carts.paid as "paid", COUNT(product_in_shopping_cart.id) as "amountOfProducts"'))
//            ->join('users', 'users.id', '=', 'shopping_carts.user_id')
//            ->leftJoin('product_in_shopping_cart', 'shopping_carts.id', '=', 'product_in_shopping_cart.shopping_cart_id')
//            ->groupBy('shopping_carts.id', 'users.name', 'shopping_carts.total_cost', 'shopping_carts.paid')
//            ->orderBy('users.name')->get();

        return view('pages/admin/orders/edit', compact('order', 'user', 'products'));
    }

    public function update()
    {
        return redirect('/admin/orders');
    }

    public function store()
    {
        $shoppingCart = new ShoppingCart();
        $shoppingCart->user_id = request('user');
        $shoppingCart->paid = request('paid');
        $shoppingCart->total_cost = 0;
        $shoppingCart->save();

        return redirect('/../admin/orders');
    }

    public function remove($id)
    {
        ShoppingCart::find($id)->delete();
        return redirect('/../admin/orders');
    }
}
