@extends ('layouts.master')
@section('title', 'Winkelwagen aanpassen')
@section ('content')
    {{ Breadcrumbs::render('shoppingCart') }}

    <div class="container">
        <h3 class="pt-3">Product bewerken</h3>
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <div class="row">
                <div class="col-md-4">
                    <a href="../product/{{ $productInCart->product->id }}">
                        @if (substr($productInCart->product->image, 0, 4) != 'http')
                            <img alt="kaas" src="{{  "data:image;base64," . $productInCart->product->image }}"
                                 class="img-fluid">
                        @else
                            <img alt="kaas" src="{{ $productInCart->product->image }}" class="img-fluid">
                        @endif
                    </a>
                </div>
                <div class="col-md-6">
                    <h4><a class="text-dark"
                           href="../product/{{ $productInCart->product->id }}">{{ $productInCart->product->name }}</a>
                    </h4>

                    <form method="POST" action="/../shoppingcart/edit">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Smaak</label>
                            <select name="cheeseType" class="form-control">
                                @foreach($cheeseTypes as $cheeseType)
                                    @if($cheeseType->type == $productInCart->cheese_type)
                                        <option value="{{ $cheeseType->type }}"
                                                selected="selected">{{ $cheeseType->type }}
                                        </option>
                                    @else
                                        <option value="{{ $cheeseType->type }}">{{ $cheeseType->type }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @auth
                            <input type="hidden" name="product" value="{{ $productInCart->id }}">
                            <button type="submit" class="mt-5 btn btn-block btn-warning">Opslaan
                            </button>
                        @endauth
                        @guest
                            <input type="hidden" name="product" value="{{ $id }}">
                            <button type="submit" class="mt-5 btn btn-block btn-warning">Opslaan
                            </button>
                        @endguest
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection