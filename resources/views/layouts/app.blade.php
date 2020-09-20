<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rentdata</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Rent Data
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      @auth
                        @if(Auth::user() -> role == 2)

                          @if(App\Product::where('product_id',Auth::user()->id)->first())
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('product/view/data') }}/{{ Auth::user()->id }}">Landlord Information View/Edit/Delete</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('add/house/view') }}/{{ Auth::user()->id }}">Add House</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('house/view/data') }}/{{ Auth::user()->id }}">House View/Edit/Delete</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('add/tenant/view') }}/{{ Auth::user()->id }}">Add Tenant</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('tenant/view/data') }}/{{ Auth::user()->id }}">Tenant Information View/Edit/Delete</a>
                          </li>
                          @else
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('add/product/landlordview') }}/{{ Auth::user()->id }}">Landlord SignUp Form</a>
                          </li>


                          @endif
                        @else
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/tenant/view/data') }}">Tenant Information View</a>
                          </li>
                          @endif

                        @endauth

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
