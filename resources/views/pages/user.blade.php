@extends ('layouts.master')
@section ('content')

    <div class="container">
        <h3 class="pt-3">Mijn account</h3>
        <div class="my-3 p-3 bg-white rounded box-shadow">

            <h3>Inloggegevens</h3>
            <div class="row">
                <div class="col-md-6">
                    <p>Naam:</p>
                    <p>Email:</p>
                </div>
                <div class="col-md-6">
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                </div>
            </div>

            <h3>Adres</h3>
            <div class="row">
                <div class="col-md-6">
                    <p>Postcode:</p>
                    <p>Straat:</p>
                    <p>Huisnummer:</p>
                    <p>Woonplaats:</p>
                </div>
                <div class="col-md-6">
                    <p>{{ $user->adress->zipcode }}</p>
                    <p>{{ $user->adress->streetname }}</p>
                    <p>{{ $user->adress->housenumber }}</p>
                    <p>{{ $user->adress->city }}</p>
                </div>
            </div>

        </div>
    </div>
@endsection