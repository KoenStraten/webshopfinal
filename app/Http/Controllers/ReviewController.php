<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function store()
    {
        $this->validate(request(), [
            'titel' => 'required',
            'content' => 'required',
            'star' => 'required',
        ]);

        $product_id = request('product');

        $review = new Review();
        $review->title = request('titel');
        $review->rating = request('star');
        $review->text = request('content');
        $review->user_id = Auth::user()->id;
        $review->product_id = $product_id;

        $review->save();

        return redirect('/product/' . $product_id);
    }

    public function destroy($id)
    {
        Review::find($id)->delete();

        $product_id = request('product_id');

        return redirect('/product/' . $product_id);
    }
}
