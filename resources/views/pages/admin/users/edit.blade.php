@extends ('layouts.master')
@section ('content')

    <div class="container-fluid bg-white">
        <div class="row">
            @include('layouts.sidenav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-4 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Gebruiker aanpassen</h1>
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

                <form class="mb-3" method="POST" action="/../admin/users/edit">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Naam</label>
                        <input class="form-control" name="name" type="text" value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="text" value="{{ $user->email }}" required>
                    </div>

                    <div class="form-group">
                        <label>Rol</label>
                        <select class="form-control" name="role">
                            @foreach($roles as $role)
                                @if ($role->role == $user->role)
                                    <option value="{{ $role->role }}" selected>{{ $role->role }}</option>
                                @else
                                    <option value="{{ $role->role }}">{{ $role->role }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Stad</label>
                        <input class="form-control" name="city" type="text" value="{{ $user->adress->city }}" required>
                    </div>

                    <div class="form-group">
                        <label>Postcode</label>
                        <input class="form-control" name="zipcode" type="text" value="{{ $user->adress->zipcode }}" required>
                    </div>

                    <div class="form-group">
                        <label>Huisnummer</label>
                        <input class="form-control" name="housenumber" type="number" value="{{ $user->adress->housenumber }}" required>
                    </div>

                    <div class="form-group">
                        <label>Straatnaam</label>
                        <input class="form-control" name="streetname" type="text" value="{{ $user->adress->streetname }}" required>
                    </div>

                    <input type="hidden" name="address_id" value="{{ $user->adress->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <button type="submit" class="btn btn-primary">aanpassen</button>
                </form>
            </main>
        </div>
    </div>

@endsection