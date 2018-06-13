@extends('layouts.app')

@section('navbar.content')
    <li class="nav-item"> <a class="nav-link" href="#details"> Detalles </a> </li>
    <li class="nav-item"> <a class="nav-link" href="#numbers"> Numeros</a> </li>
    <li class="nav-item"> <a class="nav-link" href="#portability"> Portabilidad </a> </li>

@endsection

@section('header.name')
    <h1>Hola {{ Auth::user()->name }}!</h1>
@endsection

@section('content')

    <div class="container">
        @include('layouts.error')
    </div>

    <div class="section light-bg" id="details">
        <div class="container">
            <div class="section-title">
                <h3> Tus Detalles</h3>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="card-title">Tu Email:</h4>
                                    <p class="card-text"> {{ Auth::user()->email }} </p>
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
                                    <h4 class="card-title">Tu RUT:</h4>
                                    <p class="card-text"> {{ Auth::user()->rut }} </p>
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
                                    <h4 class="card-title"> Tu division: </h4>
                                    <p class="card-text"> {{ Auth::user()->division->division_name }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section" id="numbers">
        <div class="container">

            <div class="section-title">
                <h3> Tus Numeros</h3>
            </div>

            @if(count(Auth::user()->number))
                <div style="overflow-x:auto;">

                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col"> # </th>
                            <th scope="col"> Numero </th>
                            <th scope="col"> Estado </th>
                            <th scope="col"> Motivo de Desactivacion </th>
                        </tr>
                        </thead>

                        <tbody>
                        @php($count = 1)
                        @foreach( Auth::user()->number as $number)
                            <tr>
                                <th scope="row">{{$count}} </th>
                                <td> {{ Auth::user()->division->prefix . '-' . $number->number }} </td>
                                <td>
                                    @if ($number->deactivated)
                                        Desactivado
                                    @else
                                        Activado
                                    @endif
                                </td>
                                <td>
                                    @if ($number->deactivated)
                                        {{$number->note}}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            @php($count++)
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h3> Todavia no tienes numeros </h3>
            @endif
        </div>
    </div>

    <div class="section light-bg" id="portability">
        <div class="container">

            <div class="section-title">
                <h3> Tu Portabilidad</h3>
            </div>

            @if(\App\Portability::where('user_id', Auth::id())->first() != null)
                @php($port = \App\Portability::where('user_id', Auth::id())->first())
                <ul>
                    @if ($port->old_division_approval)
                        <li> {{ $port->old_division->division_name }} acepto tu cambio de division. </li>
                    @else
                        <li> {{ $port->old_division->division_name }} todavia no acepta tu cambio de division. </li>
                    @endif

                    @if ($port->new_division_approval)
                        <li> {{ $port->new_division->division_name }} acepto tu cambio de division. </li>
                    @else
                        <li> {{ $port->new_division->division_name }} todavia no acepta tu cambio de division. </li>
                    @endif
                </ul>

            @else
                <p> Te estas portando de: {{ Auth::user()->division->division_name }}</p>
                <p> Si la portabilidad se realiza todos tus numeros cambiaran de prefijo </p>
                <p> Recuerda que solo puedes tener una solicitud de portabilidad activa a la vez </p>
                <a href="{{ route('user.portability') }}"> <button class="btn btn-primary"> Portate </button> </a>
            @endif
        </div>
    </div>

@endsection
