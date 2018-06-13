<div class="nav-menu fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-dark navbar-expand-lg">
                    <a class="navbar-brand" href="#"><img src="error" onerror="arguments[0].currentTarget.style.display='none'" class="img-fluid" alt="Wakanda Mobile"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item"> <a class="nav-link active" href="{{url('/')}}"> Wakanda Mobile
                                    <span class="sr-only">(current)</span></a> </li>

                            @yield('navbar.content')

                            @if(Auth::guard('web')->check())

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" > Usuario </a>
                                    <div class="dropdown-menu" style="background: #D33591">
                                        <a class="nav-link" href="{{route('user.dashboard')}}"> Inicio Usuario
                                            <span class="sr-only">(current)</span></a>

                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                                            <button class="btn btn-outline-light my-3 my-sm-0 ml-lg-3"> Salir</button>
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>

                            @elseif(Auth::guard('division')->check())

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" > Division </a>
                                    <div class="dropdown-menu" style="background: #D33591">
                                        <a class="nav-link active" href="{{route('division.dashboard')}}"> Inicio Division
                                            <span class="sr-only">(current)</span></a>

                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                                            <button class="btn btn-outline-light my-3 my-sm-0 ml-lg-3"> Salir</button>
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>