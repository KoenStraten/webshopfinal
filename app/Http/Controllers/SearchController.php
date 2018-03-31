<?php

namespace App\Http\Controllers;

use App\Product;

class SearchController extends Controller
{
    public function index()
    {
        // required toevoegen niet leeg
        $query = request('query');

        $searchProductResults = Product::where('name', 'LIKE', '%' . $query . '%')->orWhere('description', 'LIKE', '%' . $query . '%')->orWhere('category', 'LIKE', '%' . $query . '%')->get();

        return view('pages.searchresults', compact('searchProductResults', 'query'));
    }
}