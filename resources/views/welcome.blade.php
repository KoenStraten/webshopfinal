@extends ('layouts.master')
@section ('content')

    {{--Carrousel--}}
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="images/coolecow.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-left carousel-background">
                        <h1>Benieuwd naar ons bedrijf?.</h1>
                        <p>Wij willen natuurlijk de lekkerste en de meest biologische kaas, om dit te bereiken geven wij onze koeien een prachtig leventje, kijk dan toch hoe blij hij is.</p>
                        <p><a class="btn btn-lg btn-primary" href="/../about" role="button">Meer weten?</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide" src="images/coolefield.jpeg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption carousel-background">
                        <h1>Lekker veel korting!</h1>
                        <p>Omdat de lucht natuurlijk zo prachtig en mooi blauw is op deze foto, kun je met de volgende actie code: "MooieBlauweLucht23,6" nu 25% korting krijgen op je allereerste aankoop!</p>
                        <p><a class="btn btn-lg btn-primary" href="/../categoryoverview" role="button">Bekijk onze producten!</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="images/coolekaas.jpeg" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption text-right carousel-background">
                        <h1>Meest verkochte product!</h1>
                        <p>De kaas hierachter ziet er toch heerlijk uit, vind je ook niet? Koop daarom nu het meest verkochte product!</p>
                        <p><a class="btn btn-lg btn-primary" href="/../product/{{ $populairProduct->id }}" role="button">Bekijk product</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>




    <div class="container">
        <div class="my-3 p-3 mt-5 bg-white rounded box-shadow">
            <h3 class="pb-2">Populaire producten:</h3>
            @foreach ($products as $p)
                @if (!$loop->last)
                    <div class="row productline">
                        @else
                            <div class="row lastline">
                                @endif
                                <div class="col-md-4">
                                    <a href="../product/{{ $p->id }}">
                                        <img class="h-200px" src="{{ $p->image }}">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <h4><a class="text-dark" href="../product/{{ $p->id }}">{{ $p->name }}</a></h4>
                                    <p>{{ $p->description  }} <br><br>
                                        @for($i = 0; $i < 5; $i++)
                                            @if($i < $p->rating())
                                                <span class="fa fa-star checked"></span>
                                            @else
                                                <span class="fa fa-star unchecked"></span>
                                            @endif
                                        @endfor
                                        <span class="card-text">{{ " ( " . count($p->reviews) . " )" }}</span>
                                </div>
                                <div class="col-md-2">
                                    <p class="price">{{ "$" . $p->price }}</p>
                                    <a href="../product/{{ $p->id }}" class="btn btn-warning">To product page ></a>
                                    {{--@if(\Illuminate\Support\Facades\Auth::check())--}}
                                        <form class="pt-3" method="POST" action="../shoppingcart/store/">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="product" value="{{ $p->id }}">
                                            <button type="submit" class="btn btn-block btn-warning"><i
                                                        class="fas fa-plus"></i>
                                                In winkelwagen
                                            </button>
                                        </form>
                                    {{--@else--}}
                                    {{--<button disabled class="mt-3 btn btn-block btn-warning">Log in</button>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                            @endforeach
                    </div>
        </div>
    </div>
@endsection