@extends ('layouts.master')
@section ('content')

    <div class="container-fluid bg-white">
        <div class="row">
            @include('layouts.sidenav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-4 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Gebruiker aanmaken</h1>
                </div>

                @if(count($errors))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="mb-3" method="POST" action="/../admin/users/store">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Naam</label>
                        <input class="form-control" name="name" type="text" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="text" required>
                    </div>

                    <div class="form-group">
                        <label>Wachtwoord</label>
                        <input class="form-control" name="password" type="password" required>
                    </div>

                    <div class="form-group">
                        <label>Wachtwoord bevestigen</label>
                        <input class="form-control" name="password_confirmation" type="password" required>
                    </div>

                    <div class="form-group">
                        <label>Rol</label>
                        <select class="form-control" name="role">
                            @foreach($roles as $role)
                                <option value="{{ $role->role }}">{{ $role->role }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Stad</label>
                        <input class="form-control" name="city" type="text" required>
                    </div>

                    <div class="form-group">
                        <label>Postcode</label>
                        <input class="form-control" name="zipcode" type="text" required>
                    </div>

                    <div class="form-group">
                        <label>Huisnummer</label>
                        <input class="form-control" name="housenumber" type="number" required>
                    </div>

                    <div class="form-group">
                        <label>Straatnaam</label>
                        <input class="form-control" name="streetname" type="text" required>
                    </div>

                    <button type="submit" class="btn btn-primary">aanmaken</button>
                </form>
            </main>
        </div>
    </div>

@endsection