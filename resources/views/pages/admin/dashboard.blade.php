@extends ('layouts.master')
@section ('content')
    <div class="container-fluid bg-white">
        <div class="row">
            @include('layouts.sidenav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-4 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card dbg-blue">
                            <div class="row card-body">
                                <div class="col-md-7">
                                    <h5 class="card-text">Gebruikers</h5>
                                    <h3 class="card-title mb-0">{{ $userAmount }}</h3>
                                </div>
                                <span class="feather-lg col-md-5" data-feather="users"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card dbg-pink">
                            <div class="row card-body">
                                <div class="col-md-7">
                                    <h5 class="card-text">Orders</h5>
                                    <h3 class="card-title mb-0">{{ $orderAmount }}</h3>
                                </div>
                                <span class="feather-lg col-md-5" data-feather="file"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card dbg-green">
                            <div class="row card-body">
                                <div class="col-md-7">
                                    <h5 class="card-text">Producten</h5>
                                    <h3 class="card-title mb-0">{{ $productAmount }}</h3>
                                </div>
                                <span class="feather-lg col-md-5" data-feather="shopping-cart"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card dbg-yellow">
                            <div class="row card-body">
                                <div class="col-md-7">
                                    <h5 class="card-text">Categorieën</h5>
                                    <h3 class="card-title mb-0">{{ $categoryAmount }}</h3>
                                </div>
                                <span class="feather-lg col-md-5" data-feather="layers"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h2>Recente gebruikers</h2>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Naam</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentUsers as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h2>Meest verkochte producten</h2>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Afb.</th>
                                    <th>Naam</th>
                                    <th>Prijs</th>
                                    <th>Categorie</th>
                                    <th>Aantal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mbProducts as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img class="table-img" src="{{ $product->image }}"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->times_sold }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </main>
        </div>
    </div>

@endsection