@extends ('layouts.master')
@section ('content')

    <div class="container-fluid bg-white">
        <div class="row">
            @include('layouts.sidenav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-4 px-4">
                <p>{{ $order }}</p>
                <p>{{ $user }}</p>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Smaak</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                {{--<td>{{ $loop->iteration }}</td>--}}
                                <td>{{ $product->name }}</td>
                                {{--<td>{{ $product->cheese_type }}</td>--}}
                                <td>
                                    <form method="get" action="/../admin/orders/edit/{{ $product->id }}">
                                        <button class="btn btn-outline-info btn-sm" type="submit"><span
                                                    data-feather="edit"></span></button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="/../admin/orders/remove/{{ $product->id }}">
                                        {{ csrf_field() }}
                                        <button class="btn btn-outline-danger btn-sm" type="submit"><span
                                                    data-feather="trash-2"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

@endsection