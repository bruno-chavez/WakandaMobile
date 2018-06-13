@extends('layouts.app')

@section('navbar.content')
    <li class="nav-item"> <a class="nav-link" href="#details"> Detalles </a> </li>
    <li class="nav-item"> <a class="nav-link" href="#numbers"> Numeros</a> </li>
    <li class="nav-item"> <a class="nav-link" href="#create_number"> Crear </a> </li>
    <li class="nav-item"> <a class="nav-link" href="#delete"> Borrar </a> </li>
    <li class="nav-item"> <a class="nav-link" href="#delete"> Actualizar </a> </li>
@endsection

@section('header.name')
    <h1> Hola {{ Auth::user()->name }} recuerda que manejas la division {{ Auth::user()->division_name }} </h1>
@endsection

@section('content')
    <div class="container">
        @include('layouts.error')
    </div>

    <div class="section light-bg" id="details">
        <div class="container">
            <div class="section-title">
                <h3> Detalles</h3>
            </div>
            <div class="row">

                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="card-title"> Nombre: </h4>
                                    <p class="card-text"> {{ $user->name }} </p>
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
                                    <h4 class="card-title"> Email: </h4>
                                    <p class="card-text"> {{ $user->email }} </p>
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
                                    <h4 class="card-title"> RUT: </h4>
                                    <p class="card-text"> {{ $user->rut }} </p>
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
                <h3> Numeros</h3>
            </div>

            @if(count($user->number))
                <div style="overflow-x:auto;">

                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col"> # </th>
                            <th scope="col"> Numero </th>
                            <th scope="col"> Estado </th>
                            <th scope="col"> Motivo de Desactivacion </th>
                            <th scope="col"> Cambiar Estado </th>

                        </tr>
                        </thead>

                        <tbody>

                        @php($count = 1)
                        @foreach( $user->number as $number)
                            <tr>
                                <th scope="row">{{$count}} </th>

                                <td> {{ Auth::user()->prefix . '-' . $number->number }} </td>

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

                                <td>
                                    <a href="{{ route('division.number.status',
                                ['user' => $user->id, 'number' => $number->id]) }}">
                                        <button type="submit" class="btn btn-primary"> Cambiar </button> </a>
                                </td>
                            </tr>
                            @php($count++)
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h5> Este usuario todavia no tiene numeros </h5>
            @endif
        </div>
    </div>

    <div class="section light-bg" id="create_number">
        <div class="container">

            <div class="section-title">
                <h3> Crea un numero</h3>
            </div>

            <form class="form-signin" method="POST" action="{{ route('division.number.create', $user->id) }}">
                {{ csrf_field() }}

                <blockquote class="blockquote text-left">
                    El numero debe ser de 7 digitos y unico.
                </blockquote>

                <div class="form-label-group">
                    <input id="number" type="text" class="form-control" name="number" placeholder="Number"
                           value="{{ old('number') }}" required>
                    <label for="number">Numero</label>
                </div>

                <button class="btn btn-primary" type="submit"> Crear </button>
            </form>

        </div>
    </div>

    <div class="section" id="delete">
        <div class="container">

            <div class="section-title">
                <h3> Borra a este usuario</h3>
            </div>

            <form method="POST" action="{{ route('division.userInfo.delete', $user->id ) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <h5> Recuerda que borrar un usuario es de forma permanente</h5>
                <button type="submit" class="btn btn-primary"> Borrar </button>
            </form>
        </div>
    </div>

    <div class="section light-bg" id="update">
        <div class="container">

            <div class="section-title">
                <h3> Actualiza informacion</h3>
            </div>

            <form class="form-label-group" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-label-group">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                           value="{{ old('name') }}" required>
                    <label for="name"> Nombre </label>
                </div>

                <input type="hidden" name="column" value="name">
                <button class="btn btn-primary" type="submit"> Actualizar </button>
            </form>

            <form class="form-label-group" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}


                <div class="form-label-group">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email address"
                           value="{{ old('email') }}" required>
                    <label for="email"> Email </label>
                </div>

                <input type="hidden" name="column" value="email">
                <button class="btn btn-primary" type="submit"> Actualizar </button>
            </form>

            <form class="form-label-group" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}


                <div class="form-label-group">
                    <input id="rut" type="text" class="form-control" name="rut" placeholder="RUT"
                           value="{{ old('rut') }}" required>
                    <label for="rut"> RUT </label>
                </div>

                <input type="hidden" name="column" value="rut">
                <button class="btn btn-primary" type="submit"> Actualizar </button>
            </form>

        </div>
    </div>

@endsection
