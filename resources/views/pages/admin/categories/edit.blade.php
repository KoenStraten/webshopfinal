@extends ('layouts.master')
@section ('content')

    <div class="container-fluid bg-white">
        <div class="row">
            @include('layouts.sidenav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-4 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Categorie aanpassen</h1>
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

                <form class="mb-3" method="POST" action="/../admin/categories/edit">
                    {{ csrf_field() }}
                    <input type="hidden" name="category_old" value="{{ $category->category }}">
                    <div class="form-group">
                        <label>Categorie</label>
                        <input class="form-control" name="category" type="text" value="{{ $category->category }}" required>
                    </div>

                    <div class="form-group">
                        <label>Beschrijving</label>
                        <input class="form-control" name="description" type="text" value="{{ $category->description }}" required>
                    </div>

                    <img class="w-25 mb-3" src="{{ $category->image }}">

                    <div class="form-group">
                        <label>Foto: </label>
                        <input name="image" type="file" required>
                    </div>

                    <button type="submit" class="btn btn-primary">aanpassen</button>
                </form>
            </main>
        </div>
    </div>

@endsection