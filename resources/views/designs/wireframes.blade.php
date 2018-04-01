@extends ('layouts.master')
@section ('content')
    {{--    {{ Breadcrumbs::render('wireframes') }}--}}

    <div class="container">
        <h3 class="pt-3">Wireframes</h3>
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <div class="row">
                <h4>Home</h4>
                <img class="w-100" src="/images/wireframes/home.jpg">
            </div>
            <div class="row">
                <img class="w-100" src="/images/wireframes/about.png">
            </div>
            <div class="row">
                <img class="w-100" src="/images/wireframes/product.png">
            </div>
            <div class="row">
                <img class="w-100" src="/images/wireframes/shoppingcart.png">
            </div>
            <div class="row">
                <img class="w-100" src="/images/wireframes/categorieen.jpg">
            </div>
        </div>
@endsection