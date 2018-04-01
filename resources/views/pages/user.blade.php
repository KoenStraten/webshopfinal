@extends ('layouts.master')
@section('title', 'Mijn account')
@section ('content')
    {{ Breadcrumbs::render('account') }}

    <div class="container">
        <h3 class="pt-3">Mijn account</h3>
        <div class="my-3 p-3 bg-white rounded box-shadow mb-5">

            @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h3 class="pb-4">Inloggegevens</h3>
            <form method="post" action="/../user/update">
                {{ csrf_field() }}
                <div class="row pb-4">
                    <div class="col-md-6">
                        <h5>Naam:</h5>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" name="name" value="{{ $user->name }}"/>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-md-6">
                        <h5>Email:</h5>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" name="email" value="{{ $user->email }}"/>
                    </div>
                </div>

                <h3 class="pb-4">Adresgegevens</h3>
                <div class="row pb-4">
                    <div class="col-md-6">
                        <h5>Postcode</h5>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" name="zipcode" value="{{ $user->adress->zipcode }}"/>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-md-6">
                        <h5>Straatnaam</h5>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" name="streetname" value="{{ $user->adress->streetname }}"/>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-md-6">
                        <h5>Huisnummer</h5>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" name="housenumber" value="{{ $user->adress->housenumber }}"/>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-md-6">
                        <h5>Stad</h5>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" name="city" value="{{ $user->adress->city }}"/>
                    </div>
                </div>
                <input type="hidden" name="user" value="{{ $user->id }}">
                <button type="submit" class="btn-primary btn">Opslaan</button>
            </form>
        </div>
    </div>
@endsection