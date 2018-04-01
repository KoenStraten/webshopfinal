@extends ('layouts.master')
@section ('content')
    {{ Breadcrumbs::render('purchaseHistory') }}

    <div class="container">
        <h3 class="pt-3">Aankoopgeschiedenis</h3>
        <div class="my-3 p-3 bg-white rounded box-shadow">
            @foreach ($products as $p)
                @if(!isset($oldDate) || date('d-m-Y', strtotime($p->datePaid)) != $oldDate)
                    <h3 class="text-secondary">{{ 'Gekocht op ' . date('d-m-Y', strtotime($p->datePaid)) }}</h3>
                    @php $oldDate = date('d-m-Y', strtotime($p->datePaid)) @endphp
                @endif
                <div @if (!$loop->last) class="row productline" @else class="row lastline" @endif>
                    <div class="col-md-4">
                        <a href="../product/{{ $p->id }}">
                            <img class="h-200px" src="{{ $p->image }}" alt="product image">
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection