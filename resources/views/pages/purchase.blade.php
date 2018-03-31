@extends ('layouts.master')
@section ('content')
    {{ Breadcrumbs::render('shoppingCartPurchase') }}

    <div class="container">
        @auth
            <h3 class="pt-3">Afrekenen</h3>
            <div class="row p-3 pb-5 text-left">
                <div class="card w-100">
                    <div class="card-header">Uw bestelling wordt bezorgd op {{ $deliveryDay }}</div>
                    <div class="card-body">
                        <form method="POST" action="/../shoppingcart/empty/">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <h5 class="col-md-3">Naam</h5>
                                <h5 class="col-md-3">{{ $user->name }}</h5>
                            </div>

                            <div class="form-group row">
                                <h5 class="col-md-3">Email adres</h5>
                                <h5 class="col-md-3">{{ $user->email }}</h5>
                            </div>

                            <div class="form-group row">
                                <h5 class="col-md-3">Straatnaam</h5>
                                <h5 class="col-md-3">{{ $user->adress->streetname }}</h5>
                            </div>

                            <div class="form-group row">
                                <h5 class="col-md-3">Huisnr</h5>
                                <h5 class="col-md-3">{{ $user->adress->housenumber }}</h5>
                            </div>

                            <div class="form-group row">
                                <h5 class="col-md-3">Postcode</h5>
                                <h5 class="col-md-3">{{ $user->adress->zipcode }}</h5>
                                <h5 class="col-md-3 text-right">Betaalwijze</h5>
                                <h5 class="col-md-3">
                                    <select name="payment">
                                        @foreach($paymentOptions as $payment)
                                            <option value="{{ $payment }}">{{ $payment }}</option>
                                        @endforeach
                                    </select>
                                </h5>
                            </div>

                            <div class="form-group row">
                                <h5 class="col-md-3">Stad</h5>
                                <h5 class="col-md-3">{{ $user->adress->city }}</h5>
                                <h5 class="col-md-3 text-right">Prijs</h5>
                                <h5 class="col-md-3">{{ $cart->total_cost }}</h5>
                            </div>
                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                            <button type="submit" class="btn btn-block btn-warning">
                                Bestellen
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endAuth
        @guest
            <div class="row p-3 mb-3 justify-content-center bg-white">
                <div class="col-md-6 p-5 border-right">
                    <h3>Al een account?</h3>
                    <p>Bent u al een bestaande klant? dat zijn wij zeer dankbaar! log wel eerst in om je producten te kunnen afrekenen.</p>
                    <form method="POST" action="/../login">
                        @csrf

                        <div class="form-group row">
                            <label for="name"
                                   class="col-sm-4 col-form-label text-md-right">{{ __('Gebruikersnaam') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="name"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="purchase" value="true">
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Inloggen') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 p-5">
                    <h3>Nog geen account?</h3>
                    <p>Binnen een paar minuten heeft u uw product besteld!</p>
                    <a class="btn btn-primary" role="button" href="/../register">Registreren</a>
                </div>
            </div>
        @endguest
    </div>
@endsection