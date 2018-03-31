@extends ('layouts.master')
@section ('content')

    <div class="container-fluid bg-white">
        <div class="row">
            @include('layouts.sidenav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-4 px-4">
                <h3>Order #{{ $order->id }} van {{ $user->name }}</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Smaak</th>
                            <th>Prijs</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productsInCart as $productInCart)
                            <tr>
                                {{--<td>{{ $loop->iteration }}</td>--}}
                                <td>{{ $productInCart->name }}</td>
                                <td>{{ $productInCart->cheese_type }}</td>
                                <td>{{ $productInCart->price }}</td>
                                <td>
                                    <form method="get"
                                          action="/../admin/orders/edit/{{ $order->id }}/{{ $productInCart->id }}">
                                        <button class="btn btn-outline-info btn-sm" type="submit"><span
                                                    data-feather="edit"></span></button>
                                    </form>
                                </td>
                                <td>
                                    <form method="get"
                                          action="/../admin/orders/remove/{{ $order->id }}/{{ $productInCart->id }}">
                                        <button class="btn btn-outline-danger btn-sm" type="submit"><span
                                                    data-feather="trash-2"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a role="button" href="/../admin/orders" class="btn btn-outline-danger btn-sm">Ga terug</a>
            </main>
        </div>
    </div>

@endsection