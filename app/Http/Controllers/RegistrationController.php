<?php

namespace App\Http\Controllers;

use App\Adress;
use App\User;
use App\Traits\TransferShoppingCart;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    use TransferShoppingCart;

    public function create() {
        return view('auth.register');
    }

    public function store() {
        // Validate information
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'city' => 'required|string|max:255',
            'zipcode' => 'required|string|min:6|max:6',
            'housenumber' => 'required|int',
            'streetname' => 'required|string|max:255',
        ]);

        // Create adress first
        Adress::create([
            'city' => request('city'),
            'zipcode' => request('zipcode'),
            'housenumber' => request('housenumber'),
            'streetname' => request('streetname'),
        ]);

        // Create user
        $user = User::create([
            'adress_id' => Adress::getLast()->id,
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'role' => 'gebruiker',
        ]);

        // check if user has shopping cart
        $shoppingCart = null;
        $productsInCart = null;
        if (session()->has('cart') && session()->has('productsInCart')) {
            $shoppingCart = session()->get('cart');
            $productsInCart = session()->get('productsInCart');
        }

        // Authenticate user (login)
        auth()->login($user);

        // Transfer shopping cart, it checks if it needs to be transfered.
        if (isset($shoppingCart) && isset($productsInCart)) {
            $this->transferShoppingCart($shoppingCart, $productsInCart);
        }

        return redirect('/');
    }
}
