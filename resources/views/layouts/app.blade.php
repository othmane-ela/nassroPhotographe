<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('internalimg/photographe.png')}}" />
    <title> NassroPhotographe | @yield('title')</title>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/e70c4c9411.js" crossorigin="anonymous"></script>

    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- JQ -->

    @yield('extra-meta')

        <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

@yield('extra-css')

<body class="bg-dark-primary">
    <div class="container">
        <div class="bottom-bags">
            <div class="">
                <a href="{{route('cart.index')}}" class="">
                    <i class="fab fas text-white fa-shopping-bag"></i>
                    @if (Cart::instance('default')->count() > 0)
                    <span class="badge-two bag-bdage badge-pill badge-success">{{Cart::count()}}</span>
                    @endif
                </a>
            </div>
        </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-expand-xl fixed-top bg-dark-secondary navbar-dark shadow-lg">
            <div id="mySidenav" class="sidenav">
                <a href="{{route('cart.index')}}" class="mx-3">
                    <i class="fab fas text-white fa-shopping-bag"></i>
                    @if (Cart::instance('default')->count() > 0)
                    <span class="badge bag-bdage badge-pill badge-success">{{Cart::count()}}</span>
                    @endif
                </a>
                <a class="nav-link op" href="{{route('studio.index')}}">Studio</a>
                <a class="nav-link op" href="{{route('shooting.index')}}">Shooting</a>
                <a class="nav-link op" href="{{route('cadeaux.index')}}">Idée Cadeau</a>
                <a class="nav-link op" href="{{route('mariage.index')}}">Mariage</a>
                <a class="nav-link op" href="{{route('event.index')}}">Events</a>
                <a class="nav-link op" href="{{route('labo.index')}}">Labo Nassro</a>
                <a class="nav-link op" href="{{route('gallery.index')}}">Gallery</a>
                <a class="nav-link op" href="{{route('contact.index')}}">Contact</a>
            </div>
  
            <div class="container">

                <a class="navbar-brand py-3" href="/">
                    <img src="/internalimg/logo.png" width="90" height="20" class="d-inline-block align-top" alt="" loading="lazy">
                </a>

                <div class="collapse navbar-collapse" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto text-center">
                    
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Acceuil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('studio.index')}}">Studio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('shooting.index')}}">Shooting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('cadeaux.index')}}">Idée Cadeau</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('mariage.index')}}">Mariage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('event.index')}}">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('labo.index')}}">Labo Nassro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('gallery.index')}}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('contact.index')}}">Contact</a>
                        </li>
                    </ul>
                </div>
                        <a href="{{route('cart.index')}}" class="mx-3">
                            <i class="fab fas text-white fa-shopping-bag"></i>
                            @if (Cart::instance('default')->count() > 0)
                            <span class="badge bag-bdage badge-pill badge-success">{{Cart::count()}}</span>
                            @endif
                        </a>
                    <!-- Right Side Of Navbar -->
                                @guest
                                @if (Route::has('register'))
                                <div class="btn-group mx-4">
                                    <a type="button" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fab fas text-white fa-user-circle"></i>
                                    </a>
                                    <div class="dropdown-menu bg-dark-secondary text-white">
                                     
                                        <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>


                                        <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </div>
                                </div>
                                @endif
                                @else
                                <div class="dropdown">
                                    <button class="dropdown-toggle logged-shortcute" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Illuminate\Support\Str::limit(Auth::user()->name,8) }}
                                    </button>
                                    <div class="dropdown-menu bg-dark-secondary" aria-labelledby="dropdownMenuButton">
                                        <a href="{{ route('users.edit') }}" class="dropdown-item">Mon Profile</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                         
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                     
                                    </div>
                                  </div>


                             @endguest
                   
                  
                    <button class="navbar-toggler" onclick="sideNav()" >
                        <i class="fas fa-bars"></i>
                    </button>
            </div>
        </nav>
        <main class="py-4 mt-5 bg-dark-primary">
            @yield('content')
        </main>
    </div>

    <footer>
        <div class="container">    
            <hr>
            <div class="row">
                <div class="col-md-4 text-white">
                    <a class="navbar-brand py-3" href="/">
                        <img src="/internalimg/logo.png" width="90" height="20" class="d-inline-block align-top" alt="" loading="lazy">
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique cum ad, at quod quidem aut rem repellendus odit repellat voluptatibus dolor assumenda ab qui error! Porro tempora repellat quis? Doloremque.</p>
                    <ul class="list-inline my-2">
                        <li class="d-inline"><img src="{{asset("internalimg/payement/western-union.png")}}" alt="payment methode icon" class="d-inline" width="50"></li>
                        <li class="d-inline"><img src="{{asset("internalimg/payement/moneygram.png")}}" alt="payment methode icon" class="d-inline" width="50"></li>
                        <li class="d-inline"><img src="{{asset("internalimg/payement/paypal.png")}}" alt="payment methode icon" class="d-inline" width="50"></li>                 
                      </ul>
                </div>
                <div class="col-md-4 text-white text-left">
                        <ul class="navbar-nav py-3 text-left">
                            <li class="nav-item">
                                <h5>Services</h5>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('studio.index')}}">Studio</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('shooting.index')}}">Shooting</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('cadeaux.index')}}">Idée Cadeau</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('mariage.index')}}">Mariage</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('event.index')}}">Events</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('labo.index')}}">Labo Nassro</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('gallery.index')}}">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('contact.index')}}">Contact</a>
                            </li>
                        </ul>
                </div>
                <div class="col-md-4 py-3 text-white">
                    <h5 class="text-center">Réseau Socieaux</h5>
                    <ul class="list-inline my-2 text-center">
                        <li class="d-inline mx-3">
                           <a href="#"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li class="d-inline mx-3">
                          <a href="#"> <i class="fab fa-facebook-f"></i></a>  
                        </li>
                        <li class="d-inline mx-3">
                           <a href="#"><i class="fab fa-instagram"></i></a> 
                        </li>
                        <li class="d-inline mx-3">
                          <a href="#"><i class="fab fa-tiktok"></i></a> 
                        </li>
                      </ul>
                </div>
              
                <div class="col-md-12">
                    <p class="text-center text-white">&copy; NassroPhotographe 2020</p>
                </div>
            </div>
        </div>
    </footer>
    <script>
        function sideNav()
        {
            if(document.getElementById("mySidenav").style.width == "250px")
            {
                document.getElementById("mySidenav").style.width = "0";
            }
            else{
                document.getElementById("mySidenav").style.width = "250px";
            }
        }
    </script>
    @yield('gallery-js')
    @yield('extra-js')
</body>
</html>


