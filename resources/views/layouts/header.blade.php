<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/images/logo.jpg" class="img-responsive w-100px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @foreach($leftItems as $item)
                        @if($item->label == 'Categorieën')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"
                                   href="{{ $item->link }}" id="navbarDropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false"> {{ $item->label }} </a>
                                <div class="dropdown-menu droponhover m-0" aria-labelledby="navbarDropdown">
                                    @foreach($categories as $category)
                                        <a class="dropdown-item" href="/../category/{{ $category->category }}">{{ $category->category }}</a>
                                        @if(!$loop->last)
                                            <div class="dropdown-divider"></div>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li>
                                <a class="pr-2 nav-link" href="{{ $item->link }}">{{ " ". $item->label }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <form action="/search" class="pr-3" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query"
                                   placeholder="Waar heb je zin in?"/>
                            <button type="submit" class=" btn btn-secondary notcurved"><i
                                        class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    @foreach($rightItems as $item)
                        @if(count($item->children) > 0)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($item->children as $child)
                                        @if($child->label == 'Uitloggen')
                                            <a class="dropdown-item" href="{{ $child->link }}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Uitloggen') }}
                                            </a>
                                            <form id="logout-form" action="/../logout"
                                                  method="POST">
                                                @csrf
                                            </form>
                                        @elseif($child->label == 'Dashboard')
                                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                                <a class="dropdown-item"
                                                   href="{{ $child->link }}">{{ $child->label }}</a>
                                            @else
                                                @continue
                                            @endif
                                        @else
                                            <a class="dropdown-item"
                                               href="{{ $child->link }}">{{ $child->label }}</a>
                                        @endif
                                        @if(!$loop->last)
                                            <div class="dropdown-divider"></div>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @elseif($item->label == 'Winkelwagen')
                            <li>
                                <a class="pr-2 nav-link position-relative" href="{{ $item->link }}"><span
                                            class="feather-md"
                                            data-feather="{{ $item->icon }}"></span>
                                    <span class="numberCircle">{{ $amountOfProducts }}</span>
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="pr-2 nav-link" href="{{ $item->link }}">{{ $item->label }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</div>