@extends ('layouts.master')
@section ('content')
    <div class="container">
        <h3 class="pt-3">Zoekresultaten</h3>
        <p>Je hebt gezocht op '{{ $query }}'</p>
        <div class="my-3 p-3 bg-white rounded box-shadow">
            @if(count($searchProductResults) > 0)
                <h4>Producten</h4>
                @foreach ($searchProductResults as $product)
                    @if (!$loop->last)
                        <div class="row productline">
                            @else
                                <div class="row lastline">
                                    @endif
                                    <div class="col-md-4">
                                        <a href="../product/{{ $product->id }}">
                                            <img class="h-200px" src="{{ $product->image }}">
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <h4><a class="text-dark"
                                               href="../product/{{ $product->id }}">{{ $product->name }}</a>
                                        </h4>
                                        <p>{{ $product->description  }} <br><br>
                                            @for($i = 0; $i < 5; $i++)
                                                @if($i < $product->rating())
                                                    <span class="fa fa-star checked"></span>
                                                @else
                                                    <span class="fa fa-star unchecked"></span>
                                                @endif
                                            @endfor
                                            <span class="card-text">{{ " ( " . count($product->reviews) . " )" }}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="price">{{ "$" . $product->price }}</p>
                                        <a href="../product/{{ $product->id }}" class="btn btn-warning">To product page ></a>
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            <form class="pt-3" method="POST" action="../shoppingcart/store/">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="product" value="{{ $product->id }}">
                                                <button type="submit" class="btn btn-block btn-warning"><i
                                                            class="fas fa-plus"></i>
                                                    In winkelwagen
                                                </button>
                                            </form>
                                        @else
                                            <button disabled class="mt-3 btn btn-block btn-warning">Log in</button>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <p>Er zijn geen resultaten</p>
                                @endif
                        </div>
        </div>
@endsection