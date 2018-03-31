<?php

namespace App\Http\Controllers;

use App\ProductInCart;
use Illuminate\Http\Request;
use App\Traits\TransferShoppingCart;

class SessionController extends Controller
{
    use TransferShoppingCart;

    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create() {
        return view('auth.login');
    }

    public function store() {
        // Validate login.
        $this->validate(request(), [
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // check if user has shopping cart
        $shoppingCart = null;
        $productsInCart = null;
        if (session()->has('cart') && session()->has('productsInCart')) {
            $shoppingCart = session()->get('cart');
            $productsInCart = session()->get('productsInCart');
        }

        // Check if user can be authenticated, if so login, else return back.
        if (!auth()->attempt(request(['name', 'password']))) {
            return back()->withErrors([
                'message' => 'De combinatie van uw gebruikersnaam en wachtwoord is ongeldig.',
            ]);
        }

        // Transfer shopping cart, it checks if it needs to be transfered.
        if (isset($shoppingCart) && isset($productsInCart)) {
            $this->transferShoppingCart($shoppingCart, $productsInCart);
        }

        // if user authenticated, redirect to home.
        $request = request('purchase');
        if (isset($request)) {
            return redirect('/shoppingcart/purchase/');
        }
        return redirect('/');
    }

    public function destroy() {
        auth()->logout();
        session()->flush();

        return redirect('/');
    }
}
