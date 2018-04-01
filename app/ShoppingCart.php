<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShoppingCart extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_in_shopping_cart');
    }

    public static function getAllOrders() {
        return ShoppingCart::selectRaw(DB::raw('shopping_carts.id as "id", users.name as "username", shopping_carts.total_cost as "total_cost", shopping_carts.paid as "paid", COUNT(product_in_shopping_cart.id) as "amountOfProducts"'))
            ->join('users', 'users.id', '=', 'shopping_carts.user_id')
            ->leftJoin('product_in_shopping_cart', 'shopping_carts.id', '=', 'product_in_shopping_cart.shopping_cart_id')
            ->groupBy('shopping_carts.id', 'users.name', 'shopping_carts.total_cost', 'shopping_carts.paid')
            ->orderBy('shopping_carts.id')->get();
    }
}
