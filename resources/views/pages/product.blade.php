@extends ('layouts.master')
@section ('content')
    {{ Breadcrumbs::render('product', $product) }}

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="row justify-content-center">
                    <img src="{{ $product->image }}" class="image-responsive pic" alt="Kaas">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-1">
                    <div class="card-body">
                        <h2 class="card-title">{{ $product->name }}</h2>
                        <br>
                        <h5 class="card-subtitle mb-2 text-muted">Beschrijving</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <h5 class="card-subtitle mb-2 text-muted">Categorie</h5>
                        <p class="card-text">{{ $product->category }}</p>
                        <h5 class="card-subtitle mb-2 text-muted">Prijs</h5>
                        <p class="card-text price">${{ $product->price }}</p>
                        <div class="rating">
                            @for($i = 0; $i < 5; $i++)
                                @if($i < $product->rating())
                                    <span class="fa fa-star checked"></span>
                                @else
                                    <span class="fa fa-star unchecked"></span>
                                @endif
                            @endfor
                            <span class="card-text">{{ " ( " . count($product->reviews) . " )" }}</span>

                        </div>

                        {{--@if(\Illuminate\Support\Facades\Auth::check())--}}
                            <form method="POST" action="../shoppingcart/store/">
                                <div class="form-group">
                                    <label>Cheese type</label>
                                    <select name="cheeseType" class="form-control">
                                        @foreach($cheeseTypes as $cheeseType)
                                            <option value="{{ $cheeseType->type }}">{{ $cheeseType->type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <label>Amount</label>
                                    <input name="amount" id="amount" type="number" value="1" class="form-control">
                                </div>
                                <input type="hidden" name="product" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-block btn-warning"><i class="fas fa-plus"></i> In
                                    winkelwagen
                                </button>
                            </form>
                        {{--@else
                            <button disabled class="btn btn-block btn-warning">Log in</button>
                        @endif--}}
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h3>
            <a class="text-dark card-header card" data-toggle="collapse" href="#multiCollapseExample1"
               role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Reviews</a>
        </h3>

        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">

                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="row productline">
                            <div class="col-md-10">
                                <h5>Plaats hier een review</h5>
                                <div class="row">
                                    <form class="col-md-10" method="post" action="../postReview">
                                        {{ csrf_field() }}

                                        <div class="stars">
                                            <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>

                                            <label class="star star-5" for="star-5"></label>
                                            <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>

                                            <label class="star star-4" for="star-4"></label>
                                            <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>

                                            <label class="star star-3" for="star-3"></label>
                                            <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>

                                            <label class="star star-2" for="star-2"></label>
                                            <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>

                                            <label class="star star-1" for="star-1"></label>

                                        </div>

                                        <input class="form-control" name="titel" type="text" placeholder="Titel">
                                        <div class="form-space"></div>
                                        <textarea class="form-control" name="content"
                                                  placeholder="Plaats hier uw opmerkingen"></textarea>
                                        <div class="form-space"></div>
                                        <input type="hidden" name="product" value="{{ $product->id }}">
                                        <input class="btn btn-primary" type="submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    @foreach ($product->reviews as $review)
                        <div class="row productline">
                            <div class="col-md-10">
                                <div class="row">
                                    @for($i = 0; $i < 5; $i++)
                                        @if($i < $review->rating)
                                            <span class="fa fa-star checked"></span>
                                        @else
                                            <span class="fa fa-star unchecked"></span>
                                        @endif
                                    @endfor
                                    <h5 class="col-md-6">{{ $review->title }}</h5>
                                </div>
                                <p class="col-md-10 text-muted">{{ $review->getReviewString() }}</p>
                                <p>{{ $review->text }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <br>

        <h3>
            <a class="text-dark card-header card" data-toggle="collapse" href="#multiCollapseExample2"
               role="button" aria-expanded="false" aria-controls="multiCollapseExample2">Specificaties</a>
        </h3>

        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
                <div class="card card-body">
                    @foreach ($specifications as $spec)
                        <div class="row">
                            <h6 class="col-md-4">{{ $spec->type }}</h6>
                            <h6 class="col-md-4 text-muted">{{  $spec->answer }}</h6>
                            <div class="dropdown-divider"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection