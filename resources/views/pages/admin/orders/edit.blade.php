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
                <form method="POST" action="/../admin/orders/update/{{ $order->id }}">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <label>Betaald</label>
                        @if($order->paid)
                            <div>
                                <input class="ml-1 mr-2" name="paid" value="1" type="radio" checked="checked" required>ja
                                <input class="ml-2 mr-2" name="paid" value="0" type="radio" required>nee
                            </div>
                        @else
                            <div>
                                <input class="ml-1 mr-2" name="paid" value="1" type="radio" required>ja
                                <input class="ml-2 mr-2" name="paid" value="0" type="radio" checked="checked" required>nee
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Extra producten toevoegen</label>
                        <p class="text-muted">Wanneer aantal op 0 staat, zal er niks extra's worden toegevoegd.</p>
                        <table class="table-responsive" id="dynamic_field">
                            <tr>
                                <th>Product</th>
                                <th>Kaassoort</th>
                                <th>Aantal</th>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="products[]">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="cheeseTypes[]">
                                        @foreach($cheeseTypes as $cheeseType)
                                            <option value="{{ $cheeseType->type }}">{{ $cheeseType->type }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="number" value="0" name="amount[]" min="0"
                                           required>
                                </td>
                                <td>
                                    <input type='button' class='btn btn-secondary AddNew'
                                           value='Voeg rij toe'>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </form>
            </main>
        </div>
    </div>
    <script>
        $('.AddNew').click(function () {
            var row = $(this).closest('tr').clone();
            row.find('input').val('');
            $(this).closest('tr').after(row);
            $('input[type="button"]', row).removeClass('AddNew')
                .addClass('RemoveRow').val('Verwijder rij');
        });

        $('table').on('click', '.RemoveRow', function () {
            $(this).closest('tr').remove();
        });
    </script>
@endsection