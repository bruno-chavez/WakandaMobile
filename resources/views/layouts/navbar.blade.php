<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

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
            @if(Auth::guest())

                <li class="nav-item active">
                    <a class="nav-link" href="{{route('user.login')}}"> User Login <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{route('division.register')}}"> Division Register <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{route('division.login')}}"> Division Login <span class="sr-only">(current)</span></a>
                </li>

            @elseif(Auth::guard('web')->check())

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

            @endif
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>

                </div>
            </li>
        </ul>
    </div>
</nav>
