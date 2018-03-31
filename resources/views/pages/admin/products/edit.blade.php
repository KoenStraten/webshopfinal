@extends ('layouts.master')
@section ('content')

    <div class="container-fluid bg-white">
        <div class="row">
            @include('layouts.sidenav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-4 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Product aanpassen</h1>
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
                <form method="POST" action="/../admin/products/edit" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Naam</label>
                        <input class="form-control" name="name" type="text" value="{{ $product->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Prijs</label>
                        <input class="form-control" name="price" type="number" step="0.01" value="{{ $product->price }}" required>
                    </div>

                    <div class="form-group">
                        <label>Beschrijving</label>
                        <textarea class="form-control" name="description" required>{{ $product->description }}</textarea>
                    </div>

                    <img class="w-25 mb-3" src="{{ $product->image }}">
                    <div class="form-group">
                        <label>Afbeelding</label>
                        <input type="file" name="image">
                    </div>

                    <div class="form-group">
                        <label>Categorie</label>
                        <select class="form-control" name="category">
                            @foreach($categories as $category)
                                @if ($product->category == $category)
                                    <option value="{{ $category->category }}" selected>{{ $category->category }}</option>
                                @else
                                    <option value="{{ $category->category }}">{{ $category->category }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary">aanpassen</button>
                </form>
            </main>
        </div>
    </div>

@endsection