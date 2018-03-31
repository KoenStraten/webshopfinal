<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInCart extends Model
{
    protected $table = 'product_in_shopping_cart';

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function shoppingCart() {
        return $this->belongsTo(ShoppingCart::class);
    }
}