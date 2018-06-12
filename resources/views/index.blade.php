@extends('layouts.app')

@section('navbar.content')
    <li class="nav-item"> <a class="nav-link active" href="#home">Inicio <span class="sr-only">(current)</span></a> </li>
    <li class="nav-item"> <a class="nav-link" href="#platform">Entra a la plataforma </a> </li>
    <li class="nav-item"> <a class="nav-link" href="#features">Caracteristicas Principales</a> </li>
    <li class="nav-item"> <a class="nav-link" href="#pricing">Precios</a> </li>
    <li class="nav-item"> <a class="nav-link" href="#fqa">Preguntas Frecuentes</a> </li>
@endsection

@section('content')

    <header class="bg-gradient" id="home">
        <div class="container mt-5">
            <h1>Wakanda Mobile</h1>
            <h1>La manera mas facil de organizar usuarios y numeros para tu division</h1>
        </div>
    </header>

    <div class="section light-bg" id="platform">
        <div class="section light-bg">
            <div class="container">
                <div class="section-title">
                    <h3>Entra a la plataforma</h3>
                </div>

                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#user_login">Login Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#division_login">Login Division</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#division_register">Registro Division</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="user_login">
                        <div class="d-flex flex-column flex-lg-row">
                            <div>
                                @if(Auth::guard('division')->check())
                                    <h2>Ya estas logueado!</h2>
                                    <p>Clickea el siguiente boton para llevarte a tu homepage</p>
                                    <a href="{{ route('division.dashboard')}}">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block"> Homepage </button> </a>

                                @elseif(Auth::guard('web')->check())
                                    <h2>Ya estas logueado!</h2>
                                    <p>Clickea el siguiente boton para llevarte a tu homepage</p>
                                    <a href="{{ route('user.dashboard')}}">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block"> Homepage </button> </a>

                                @else
                                    @include('layouts.user_login')
                                    @include('layouts.error')
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="division_login">
                        <div class="d-flex flex-column flex-lg-row">
                            <div>
                                @if(Auth::guard('division')->check())
                                    <h2>Ya estas logueado!</h2>
                                    <p>Clickea el siguiente boton para llevarte a tu homepage</p>
                                    <a href="{{ route('division.dashboard')}}">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block"> Homepage </button> </a>

                                @elseif(Auth::guard('web')->check())
                                    <h2>Ya estas logueado!</h2>
                                    <p>Clickea el siguiente boton para llevarte a tu homepage</p>
                                    <a href="{{ route('user.dashboard')}}">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block"> Homepage </button> </a>

                                @else
                                    @include('layouts.division_login')
                                    @include('layouts.error')
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="division_register">
                        <div class="d-flex flex-column flex-lg-row">
                           <div>
                               @include('layouts.division_register')
                               @include('layouts.error')
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section" id="features">
        <div class="container">
            <div class="section-title">
                <small>Datos importantes</small>
                <h3> Caracteristicas que amas</h3>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="card-title">Simple</h4>
                                    <p class="card-text"> Manejo de usuarios y sus numeros de manera simple y directa,
                                        con una interfaz facil de usar y entender. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="card-title">Detallado</h4>
                                    <p class="card-text"> La plataforma te muestra toda la informacion de
                                        tus usuarios y sus numeros de manera limpia y concisa. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="card-title">Portable</h4>
                                    <p class="card-text"> Al usar Wakanda Mobile tienes la posibilidad de aumentar
                                        tus usuarios, ya que estos son portables entre divisiones. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="section light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h2>Descubre la facilidad de Wakanda Mobile</h2>
                    <ul class="list-unstyled ui-steps">
                        <li class="media">
                            <div class="circle-icon mr-4">1</div>
                            <div class="media-body">
                                <h5>Registra a tu division</h5>
                            </div>
                        </li>
                        <li class="media">
                            <div class="circle-icon mr-4">2</div>
                            <div class="media-body">
                                <h5>Registra a tus usuarios</h5>
                            </div>
                        </li>
                        <li class="media">
                            <div class="circle-icon mr-4">3</div>
                            <div class="media-body">
                                <h5>Añade numeros a tus usuarios</h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="section" id="pricing">
        <div class="container">
            <div class="section-title">
                <small>Precios</small>
                <h3>Wakanda Mobile es gratis para todos</h3>
            </div>

            <div class="card-deck">
                <div class="card pricing">
                    <div class="card-head">
                        <small class="text-primary">Global</small>
                        <span class="price">Gratis </span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <div class="list-group-item"> Ilimitados usuarios</div>
                        <div class="list-group-item"> Ilimitados Numeros</div>
                        <div class="list-group-item"> Ilimitadas Portabilidades</div>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="section light-bg" id="fqa" >
        <div class="container">
            <div class="section-title">
                <small>FAQ</small>
                <h3>Preguntas</h3>
            </div>

            <div class="row pt-4">
                <div class="col-md-6">
                    <h4 class="mb-3"> La plataforma esta apoyada y reconocida por el gobieron de Wakanda y el rey T'Challa?</h4>
                    <p class="light-font mb-5"> Nope. </p>
                    <h4 class="mb-3"> Si la plataforma es gratis, como es que esta obtiene ganancias?</h4>
                    <p class="light-font mb-5"> Vendemos tus datos :D </p>

                </div>
                <div class="col-md-6">
                    <h4 class="mb-3"> Hay manera de cambiar algunos de mis datos una vez registrata mi division?</h4>
                    <p class="light-font mb-5"> Nope. </p>
                    <h4 class="mb-3"> Hay manera de recuperar mi contraseña?</h4>
                    <p class="light-font mb-5"> Rip in Contraseñas.</p>

                </div>
            </div>
        </div>
    </div>

    <div class="section bg-gradient">
        <div class="container">
            <div class="call-to-action">

                <h2> Usalo en todas partes</h2>
                <p class="tagline"> Disponible para las plataformas mas populares de escritorio y celular </p>
                <div class="my-4">
                    <img src="images/firefox-icon.png" alt="icon"> Firefox &nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="images/chrome-icon.png" alt="icon"> Chrome &nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="images/safari-icon.png" alt="icon"> Safari &nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="images/android-icon.png" alt="icon"> Android &nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="images/apple-icon.png" alt="icon"> IPhone/IPad &nbsp;&nbsp;&nbsp;&nbsp;
                </div>
            </div>
        </div>
    </div>

@endsection