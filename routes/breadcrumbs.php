<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
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