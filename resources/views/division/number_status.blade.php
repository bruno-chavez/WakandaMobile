@extends('layouts.app')

@section('header.name')
    <h1> Hola {{ Auth::user()->name }} recuerda que manejas la division {{ Auth::user()->division_name }} </h1>
@endsection

@section('content')

    <div class="section light-bg" id="details">
        <div class="container">
            <div class="section-title">
                <h3> Cambiar estado</h3>
            </div>

            @if($number->deactivated)
                <blockquote class="blockquote text-left">
                    <h4> Para activar este numero presiona el siguiente boton </h4>
                </blockquote>

                <form class="form-horizontal" method="POST"
                      action="{{ route('division.number.changeStatus',
                                                ['user' => $user->id, 'number' => $number->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <button class="btn btn-primary" type="submit"> Activar </button>
                </form>
            @else
                <form class="form-signin" method="POST" action="{{ route('division.number.changeStatus',
                                                    ['user' => $user->id, 'number' => $number->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <blockquote class="blockquote text-left">
                        <h4> Escribe la razon por la cual se desactiva este numero </h4>
                    </blockquote>

                    <div class="form-label-group">
                        <input id="note" type="text" class="form-control" name="note" placeholder="Note" required autofocus>
                        <label for="note"> Nota </label>
                    </div>

                    <button class="btn btn-primary" type="submit"> Desactivar </button>
                </form>
            @endif
        </div>
    </div>
@endsection