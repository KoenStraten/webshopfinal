@extends ('layouts.master')
@section ('content')

    <div class="container-fluid bg-white">
        <div class="row">
            @include('layouts.sidenav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-4 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Order aanmaken</h1>
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

                <form class="mb-3" method="POST" action="/../admin/orders/store">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Gebruiker</label>
                        <select class="form-control" name="user" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Betaald</label>
                        <div>
                            <input class="ml-1 mr-2" name="paid" value="1" type="radio" required>ja
                            <input class="ml-2 mr-2" name="paid" value="0" type="radio" required>nee
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-6">Producten</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">aanmaken</button>
                </form>
            </main>
        </div>
    </div>

@endsection