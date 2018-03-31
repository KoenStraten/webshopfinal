<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $times_sold;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function rating()
    {
        return Review::where('product_id', $this->id)->avg('rating');
    }

    public static function getAllProductsByCategory($category)
    {
        return static::where('category', $category);
    }

    public static function orderByPopularity() {
        //query:: SELECT p.*, COUNT(ps.id) as 'times_sold'
        // FROM products p
        // LEFT OUTER JOIN product_in_shopping_cart ps ON p.id = ps.product_id
        // GROUP BY p.id
        // ORDER BY COUNT(ps.id) DESC
        return static::leftJoin('product_in_shopping_cart', 'products.id', '=', 'product_in_shopping_cart.product_id')
            ->selectRaw(DB::raw('products.*, COUNT(product_in_shopping_cart.product_id) as "times_sold"'))
            ->groupBy('products.id', 'products.name', 'products.price', 'products.description', 'products.image', 'products.category', 'products.created_at', 'products.updated_at')
            ->orderBy('times_sold', 'desc');
    }

    public function shoppingCarts()
    {
        return $this->belongsToMany(ShoppingCart::class);
    }
}
