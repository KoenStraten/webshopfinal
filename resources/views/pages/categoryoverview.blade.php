@extends ('layouts.master')
@section ('content')

    {{ Breadcrumbs::render('categories') }}

    <div class="container">
        <h3 class="pt-3">Categorieën</h3>
        <div class="my-3 p-3 bg-white rounded box-shadow">
            @foreach ($categories as $category)
                @if (!$loop->last)
                    <div class="row productline">
                        @else
                            <div class="row lastline">
                                @endif
                                <div class="col-md-3">
                                    <a href="{{ "/../category/" . $category->category }}"><img
                                                src="{{ $category->image }}" class="img-responsive xs-pic"></a>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <a class="text-dark" href="{{ "/../category/" . $category->category }}">
                                            <h4>{{ $category->category }}</h4>
                                        </a>
                                    </div>
                                    <div class="row">
                                        <p>{{ $category->description }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
        </div>
    </div>
@endsection