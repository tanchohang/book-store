
<nav id="header" class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
        <a class="navbar-brand text-white" href="/">Book Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i>Shopping Cart
                    <span class="badge badge-warning text-white">{{Session::has('cart')?Cart::count():""}}</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @guest

                            <a class="dropdown-item" href="{{route('login')}}" >Sign In</a>
                            <a class="dropdown-item" href="{{route('register')}}" >Sign Up</a>
                            @endguest
                                @if(Auth::guard('admin')->check())
                                    <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>

                                @elseif(Auth::guard('web')->check())
                                    <a class="dropdown-item" href="{{route('home')}}">Profile</a>
                                @endif



                                @if(Auth::check())

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @endif
                    </div>
                </li>

            </ul>
            <form  action="{{route('search')}}" method="get" class="form-inline my-2 my-lg-0">
                <input class="form-control" id="searchItem" name="search" type="search" placeholder="Search" aria-label="Search">

            </form>


        </div>
    </nav>
