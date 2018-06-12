{{--<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    @if (Auth::guard('web')->check())

        <a class="navbar-brand" href="{{route('user.dashboard')}}"> Wakanda Mobile </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    @elseif (Auth::guard('division')->check())

        <a class="navbar-brand" href="{{route('division.dashboard')}}"> Wakanda Mobile </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    @else

        <a class="navbar-brand" href="{{url('/')}}"> Wakanda Mobile </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    @endif

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            @if(Auth::guard('web')->check())
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('user.portability')}}"> Port <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('user.logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout <span class="sr-only">(current)</span>
                    </a>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            @elseif(Auth::guard('division')->check())

                <li class="nav-item active">
                    <a class="nav-link" href="{{route('user.register')}}"> Register User <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{route('division.usersList')}}"> List of Users <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('user.logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout <span class="sr-only">(current)</span>
                    </a>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('user.login')}}"> User Login <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{route('division.login')}}"> Division Login <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{route('division.register')}}"> Division Register <span class="sr-only">(current)</span></a>
                </li>
            @endif
        </ul>
    </div>
</nav>--}}

<div class="nav-menu fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-dark navbar-expand-lg">
                    <a class="navbar-brand" href="#"><img src="error" onerror="arguments[0].currentTarget.style.display='none'" class="img-fluid" alt="Wakanda Mobile"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            @yield('navbar.content')
                            @if(Auth::guest() == false)
                                <li class="nav-item"><form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                                        <button class="btn btn-outline-light my-3 my-sm-0 ml-lg-3"> Salir</button>
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>