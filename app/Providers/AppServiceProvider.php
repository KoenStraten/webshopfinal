<?php

namespace App\Providers;

use App\Category;
use App\Menu;
use App\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::DefaultStringLength(191);
        view()->composer('layouts.header', function ($view) {

            $leftItems = Menu::where('parent_id', 0)->where('position', 'left')->orderBy('order')->get();
            $categories = Category::all();

            $amountOfProducts = 0;

            if (Auth::check()) {
                $user = Auth::user();
                $cart = $user->shoppingCarts->where('paid', 0)->last();

                if (isset($cart)) {
                    $amountOfProducts = count($cart->products);
                }

                if ($user->role == 'admin') {
                    // menu, winkelwagen, dashboard ophalen
                    $rightItems = Menu::where('parent_id', 0)->where('position', 'right')->where(function ($query) {
                        $query->where('role', 'gebruiker')->orWhere('role', null)->orWhere('role', 'admin');
                    })->orderBy('order')->get();
                } else {
                    // menu, winkelwagen ophalen
                    $rightItems = Menu::where('parent_id', 0)->where('position', 'right')->where(function ($query) {
                        $query->where('role', 'gebruiker')->orWhere('role', null);
                    })->orderBy('order')->get();
                }
            } else {
                // De counter voor een 'gast' die producten in zijn winkelwagentje heeft.
                if (session()->has('productsInCart')) {
                    $amountOfProducts = count(session()->get('productsInCart'));
                }
                // hier inlog,register,winkelwagen ophalen
                $rightItems = Menu::where('parent_id', 0)->where('position', 'right')->where('role', null)->orWhere('role', 'gast')->orderBy('order')->get();
            }
            $view->with('leftItems', $leftItems)->with('rightItems', $rightItems)->with('amountOfProducts', $amountOfProducts)->with('categories', $categories);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
