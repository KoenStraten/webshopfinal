@extends ('layouts.master')
@section ('content')

    <div class="container-fluid bg-white">
        <div class="row">
            @include('layouts.sidenav')
            <main class="col-md-9 ml-sm-auto col-lg-10 pt-4 px-4">
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
                        <select class="form-control" name="user">
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

                    <!-- Dynamic Module Details -->

                    <div class="form-group">
                        <table class="table-responsive" id="dynamic_field">
                            <tr>
                                <th>Product</th>
                                <th>Kaassoort</th>
                                <th>Aantal</th>
                                <th></th>
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
                                    <input class="form-control" type="number" name="amount[]" value="1" min="1" required>
                                </td>
                                <td>
                                    <input type='button' class='btn btn-secondary btn-sm AddNew' value='Voeg rij toe'>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <button type="submit" class="btn btn-primary">aanmaken</button>
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