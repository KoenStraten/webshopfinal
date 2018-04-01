<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getReviewString() {
        $string = $this->user->name . " | " . $this->user->adress->city . " | " . date_format($this->created_at, 'j F Y');
        return $string;
    }

    public function fromCurrentUser() {
        if (Auth::id() == $this->user->id) {
            return true;
        }
        return false;
    }

    public static function getAllById($id) {
        return static::where('product_id', $id)->get();
    }
}
