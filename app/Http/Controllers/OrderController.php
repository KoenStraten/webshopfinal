<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductInCart;
use App\ShoppingCart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $orders = ShoppingCart::getAllOrders();

        return view('pages.admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        $products = Product::all();
        $cheeseTypes = DB::table('cheese_types')->get();
        return view('pages/admin/orders/create', compact('users', 'products', 'cheeseTypes'));
    }

    public function edit($order_id)
    {
        $order = ShoppingCart::find($order_id);
        $user = User::find($order->user_id);

        $users = User::all();
        $products = Product::all();
        $cheeseTypes = DB::table('cheese_types')->get();

        $productsInCart = ProductInCart::selectRaw(DB::raw('product_in_shopping_cart.id as "id", products.name as "name", products.price as "price", product_in_shopping_cart.cheese_type as "cheese_type"'))
            ->join('products', 'products.id', '=', 'product_in_shopping_cart.product_id')
            ->where('shopping_cart_id', $order->id)
            ->orderBy('product_in_shopping_cart.id')->get();

        return view('pages/admin/orders/edit', compact('order', 'user', 'users', 'products', 'cheeseTypes', 'productsInCart'));
    }

    public function update($order_id)
    {
        $this->validate(request(), [
            'products' => 'required',
            'cheeseTypes' => 'required',
            'amount' => 'required'
        ]);

        $paid = request('paid');
        $products = request('products');
        $cheeseTypes = request('cheeseTypes');
        $amounts = request('amount');

        $cart = ShoppingCart::find($order_id);

        $cart->paid = $paid;
        $totalCost = $cart->total_cost;

        for ($i = 0; $i < count($products); $i++) {
            if (isset($amounts[$i])) {
                for ($j = 0; $j < $amounts[$i]; $j++) {
                    $totalCost = $totalCost + Product::find($products[$i])->price;
                    $pic = new ProductInCart();
                    $pic->product_id = $products[$i];
                    $pic->shopping_cart_id = $cart->id;
                    $pic->cheese_type = $cheeseTypes[$i];
                    $pic->save();
                }
            }
        }

        $cart->total_cost = $totalCost;

        $cart->save();

        return redirect('/admin/orders');
    }

    public function editProduct($order_id, $productInCart_id)
    {
        // naar de indiv view voor productupdate

        $productInCart = ProductInCart::find($productInCart_id);

        $order = ShoppingCart::find($order_id);

        $product = Product::find($productInCart->product_id);

        $cheeseTypes = DB::table('cheese_types')->get();

        $order->save();

        return view('pages/admin/orders/editProduct', compact('order', 'product', 'cheeseTypes', 'productInCart'));
    }

    public function updateProduct($order_id, $productInCart_id)
    {
        $cheeseType = request('cheeseType');

        $productInCart = ProductInCart::find($productInCart_id);

        $productInCart->cheese_type = $cheeseType;

        $productInCart->save();

        return $this->edit($order_id);
//        return view('pages/admin/orders', compact('order_id', 'user', 'product'));
    }

    public function removeProduct($order_id, $productInCart_id)
    {
        $productInCart = ProductInCart::find($productInCart_id);

        $cart = ShoppingCart::find($order_id);

        $product = Product::find($productInCart->product_id);

        $cart->total_cost -= $product->price;

        ProductInCart::find($productInCart_id)->delete();

        $cart->save();

        return back();
    }

    public function store()
    {
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

        for ($i = 0; $i < count($products); $i++) {
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

    public function remove($id)
    {
        ShoppingCart::find($id)->delete();
        return redirect('/../admin/orders');
    }
}
