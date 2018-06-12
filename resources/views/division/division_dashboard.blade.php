@extends('layouts.app')

@section('navbar.content')

    <li class="nav-item"> <a class="nav-link" href="#statistics"> Estadisticas </a> </li>
    <li class="nav-item"> <a class="nav-link" href="#users_list"> Usuarios</a> </li>
    <li class="nav-item"> <a class="nav-link" href="#portabilities"> Portabilidades </a> </li>

@endsection

@section('header.name')
    <h1> Hola {{ Auth::user()->name }} recuerda que manejas la division {{ Auth::user()->division_name }} </h1>
@endsection

@section('content')

    <div class="section light-bg" id="statistics">
        <div class="container">
            <div class="section-title">
                <h3> Estadisticas de tus usuarios </h3>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="card-title"> Total de usuarios: </h4>
                                    <p class="card-text"> {{ $totalUsers }} </p>
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
                                    <h4 class="card-title">Total de numeros: </h4>
                                    <p class="card-text"> {{ $totalNumbers }} </p>
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
                                    <h4 class="card-title"> Total de numeros activados: </h4>
                                    <p class="card-text"> {{ $activatedNumbers }} </p>
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
                                    <h4 class="card-title"> Total de numeros desactivados: </h4>
                                    <p class="card-text"> {{ $totalNumbers - $activatedNumbers }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section" id="users_list">
        <div class="container">
            <div class="section-title">
                <h3> Lista de usuarios </h3>
            </div>

            <div style="overflow-x:auto;">

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> Nombre </th>
                    <th scope="col"> RUT </th>
                    <th scope="col"> Email </th>
                    <th scope="col"> Detalles </th>
                </tr>
                </thead>

                <tbody>
                @php($count = 1)
                @foreach( Auth::user()->users as $user)
                    <tr>
                        <th scope="row">{{ $count }} </th>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->rut }} </td>
                        <td> {{ $user->email }} </td>
                        <td> <a href="{{ route('division.userInfo', $user->id) }}">
                                <button type="submit" class="btn btn-primary"> Detalles </button> </a>
                        </td>
                    </tr>
                    @php($count++)
                @endforeach
                </tbody>
            </table>
    </div>
        </div>
    </div>

    <div class="section light-bg" id="portabilities">
        <div class="container">
            <div class="section-title">
                <h3> Portabilidades </h3>
            </div>

        @if(count(Auth::user()->from_portabilities))
            <div style="overflow-x:auto;">
                <blockquote class="blockquote text-left">
                    <h3> Ususarios que quieren salir de {{Auth::user()->division_name }}: </h3>
                </blockquote>

                <table class="table table-hover table-bordered">

                    <thead>
                    <tr>
                        <th scope="col"> # </th>
                        <th scope="col"> User </th>
                        <th scope="col">Old Division</th>
                        <th scope="col">New Division</th>
                        <th scope="col">Approve</th>
                        <th scope="col">Decline</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($count = 1)
                    @foreach( Auth::user()->from_portabilities as $port)

                        <tr>
                            <th scope="row">{{$count}} </th>
                            <td> {{ $port->user->name }} </td>
                            <td> {{ $port->old_division->division_name }} </td>
                            <td> {{ $port->new_division->division_name }} </td>
                            <td> <form class="form-horizontal" method="POST"
                                       action="{{ route('division.portability.approve',
                                          ['port' => $port->id, 'division' => Auth::id()]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

                                    @if($port->old_division_approval)
                                        <button class="btn btn-primary" type="submit" title="You have already approved this request."
                                                disabled> Approve </button>
                                    @else
                                        <button class="btn btn-primary" type="submit"> Approve </button>
                                    @endif
                                </form>
                            </td>
                            <td>
                                <form class="form-horizontal" method="POST"
                                       action="{{ route('division.portability.decline', $port->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button class="btn btn-primary" type="submit"> Decline </button>
                                </form>
                            </td>
                        </tr>
                        @php($count++)
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h4> Actualmente no hay usuarios que quieran dejar a {{Auth::user()->division_name}} </h4>
        @endif

    @if(count(Auth::user()->to_portabilities))
        <div style="overflow-x:auto;">
            <blockquote class="blockquote text-left">
                <h3> Ususarios que quieren pertenecer a {{Auth::user()->division_name }}: </h3>
            </blockquote>

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> User </th>
                    <th scope="col">Old Division</th>
                    <th scope="col">New Division</th>
                    <th scope="col">Approve</th>
                    <th scope="col">Decline</th>
                </tr>
                </thead>

                <tbody>
                @php($count = 1)
                @foreach( Auth::user()->to_portabilities as $port)
                    <tr>
                        <th scope="row">{{$count}} </th>
                        <td> {{ $port->user->name }} </td>
                        <td> {{ $port->old_division->division_name }} </td>
                        <td> {{ $port->new_division->division_name }} </td>
                        <td>
                            <form class="form-horizontal" method="POST"
                                   action="{{ route('division.portability.approve',
                                      ['port' => $port->id, 'division' => Auth::id()]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                @if($port->new_division_approval)
                                        <button class="btn" type="submit"
                                                title="You have already approved this request."
                                                disabled> Approve </button>
                                @else
                                    <button class="btn" type="submit"> Approve </button>
                                @endif
                            </form>
                        </td>
                        <td> <form class="form-horizontal" method="POST"
                                   action="{{ route('division.portability.decline', $port->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn" type="submit"> Decline </button>
                            </form>
                        </td>
                    </tr>
                    @php($count++)
                @endforeach
                </tbody>
            </table>
        </div>

    @else
        <h4> Actualmente no hay usuarios que quieran pertencer a {{Auth::user()->division_name}} </h4>
    @endif
        </div>
    </div>
@endsection
