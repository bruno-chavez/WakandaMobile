@extends('layouts.app')

@section('content')
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>

            <p> Nombre: {{ $user->name }} </p>
            <p> Email: {{ $user->email }} </p>
            <p> RUT: {{ $user->rut }} </p>


            @foreach($user->number as $number)
                @if ($number->deactivated == false)
                    <article>
                        {{ $number->number }} Activado
                    </article>
                @else
                    <article>
                        {{ $number->number }} Desactivado
                    </article>
                @endif
            @endforeach

            <a href="{{ route('division.number', $user->id) }}">
                <button>Create New Number</button>
            </a>

            <form method="POST" action="{{ route('division.userInfo.delete', $user->id ) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-primary">
                    Delete User
                </button>
            </form>
            <form class="form-horizontal" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <label for="name" class="col-md-offset-4 control-label">Update Name</label>

                <input type="hidden" name="column" value="name">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                <button type="submit">
                    Update
                </button>
            </form>
            <form class="form-horizontal" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <label for="name" class="col-md-offset-4 control-label">Update Email</label>

                <input type="hidden" name="column" value="email">
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
                <button type="submit">
                    Update
                </button>
            </form>

            <form class="form-horizontal" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                @if ($errors->has('rut'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rut') }}</strong>
                    </span>
                @endif

                <label for="name" class="col-md-offset-4 control-label">Update RUT</label>

                <input type="hidden" name="column" value="rut">
                <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}">
                <button type="submit">
                    Update
                </button>
            </form>
        </body>
        </html>
@endsection