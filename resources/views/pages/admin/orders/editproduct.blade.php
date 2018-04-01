@extends ('layouts.master')
@section('title', 'Order aanpassen')
@section ('content')
    <div class="container-fluid bg-white">
        <div class="row">
            @include('layouts.sidenav')
            <main class="col-md-9 ml-sm-auto col-lg-10 pt-4 px-4">
                <h3>{{ $product->name }}</h3>

                <form method="POST" action="/../admin/orders/update/{{ $order->id }}/{{ $productInCart->id }}">
                    {{ csrf_field() }}
                    <h5>Smaak</h5>
                    <div class="form-group">
                        <select class="form-control" name="cheeseType">
                            @foreach($cheeseTypes as $cheeseType)
                                @if($cheeseType->type == $productInCart->cheese_type)
                                    <option value="{{ $cheeseType->type }}"
                                            selected="selected">{{ $cheeseType->type }}</option>
                                @else
                                    <option value="{{ $cheeseType->type }}">{{ $cheeseType->type }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </form>
            </main>
        </div>
    </div>
@endsection