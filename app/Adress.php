<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    public static function getLast() {
        return static::orderBY('id', 'desc')->first();
    }

    protected $fillable = [
        'city', 'zipcode', 'housenumber', 'streetname',
    ];

    protected $guarded = [
        'id',
    ];
}
