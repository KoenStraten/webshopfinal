<?php namespace App\Traits;

use App\ProductInCart;

trait TransferShoppingCart {

    public function transferShoppingCart($cart, $productsInCart) {
        $oldCart = auth()->user()->shoppingCarts->where('paid', '0')->last();
        if (!isset($oldCart)) {
            $user = auth()->user();
            $cart->user_id = $user->id;
            $cart->save();

            foreach($productsInCart as $p) {
                $productInCart = new ProductInCart();
                $productInCart->product_id = $p->product->id;
                $productInCart->shopping_cart_id = $p->shoppingCart->id;
                $productInCart->cheese_type = $p->cheese_type;
                $productInCart->save();
            }
        }
    }

}
?>