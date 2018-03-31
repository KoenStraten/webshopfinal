@extends ('layouts.master')
@section ('content')

    <div class="container-fluid bg-white">
        <div class="row">
            @include('layouts.sidenav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-4 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Products</h1>
                    <a role="button" class="btn btn-primary float-right" href="/../admin/products/create"><span data-feather="plus"></span></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>
                                        <form method="get" action="/../admin/products/edit/{{ $product->id }}">
                                            <button class="btn btn-outline-info btn-sm" type="submit"><span data-feather="edit"></span></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="/../admin/products/remove/{{ $product->id }}">
                                            {{ csrf_field() }}
                                            <button class="btn btn-outline-danger btn-sm" type="submit"><span data-feather="trash-2"></span></button>
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