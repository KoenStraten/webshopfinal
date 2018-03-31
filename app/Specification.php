<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    public static function getAllById($id) {
        return static::where('product_id', $id)->get();
    }
}
