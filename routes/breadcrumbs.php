<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Home > [Search]
Breadcrumbs::register('search', function($breadcrumbs, $search) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($search, route('search', $search));
});

// Home > purchasehistory
Breadcrumbs::register('purchaseHistory', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Aankoopgeschiedenis', route('purchaseHistory'));
});

// Home > account
Breadcrumbs::register('account', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Mijn account', route('account'));
});

// Home > About
Breadcrumbs::register('about', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Over ons', route('about'));
});

// Home > categories
Breadcrumbs::register('categories', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Categorieën', route('categories'));
});

// Home > [category]
Breadcrumbs::register('category', function($breadcrumbs, $category) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($category, route('category', $category));
});

// Home > [category] > [product]
Breadcrumbs::register('product', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('category', $product->category);
    $breadcrumbs->push($product->name, route('product', $product));
});

// Home > ShoppingCart
Breadcrumbs::register('shoppingCart', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Winkelwagen', route('shoppingCart'));
});

// Home > ShoppingCart
Breadcrumbs::register('shoppingCartPurchase', function($breadcrumbs) {
    $breadcrumbs->parent('shoppingCart');
    $breadcrumbs->push('Betalen', route('shoppingCartPurchase'));
});

?>