<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function shoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class);
    }

    public function products()
    {
        return $this->hasManyThrough('App\ProductInCart', 'App\ShoppingCart');
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'adress_id', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function adress()
    {
        return $this->belongsTo(Adress::class);
    }
}
