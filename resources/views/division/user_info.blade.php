@extends('layouts.app')

@section('content')
    <p> Name: {{ $user->name }} </p>
    <p> Email: {{ $user->email }} </p>
    <p> RUT: {{ $user->rut }} </p>

    @foreach($user->number as $number)
        @if ($number->deactivated)
            <article>
                <p> {{ $number->number }}<a href="{{ route('division.number.status',
                ['user' => $user->id, 'number' => $number->id]) }}"> Deactivated </a>
                </p>
            </article>

        @else
            <article>
                <p> {{ $number->number }} <a href="{{ route('division.number.status',
                ['user' => $user->id, 'number' => $number->id]) }}"> Activated </a>
                </p>
            </article>
        @endif
    @endforeach

    <a href="{{ route('division.number', $user->id) }}">
        <button> Create New Number </button>
    </a>

    <form method="POST" action="{{ route('division.userInfo.delete', $user->id ) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button type="submit" class="btn btn-primary"> Delete User </button>
    </form>

    <form class="form-horizontal" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <label for="name" class="col-md-offset-4 control-label"> Update Name </label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
        <input type="hidden" name="column" value="name">
        <button type="submit"> Update </button>
    </form>

    <form class="form-horizontal" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <label for="email" class="col-md-offset-4 control-label">Update Email</label>
        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
        <input type="hidden" name="column" value="email">
        <button type="submit"> Update </button>
    </form>

    <form class="form-horizontal" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        @if ($errors->has('rut'))
            <span class="help-block">
                <strong>{{ $errors->first('rut') }}</strong>
            </span>
        @endif

        <label for="rut" class="col-md-offset-4 control-label">Update RUT</label>
        <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}">
        <input type="hidden" name="column" value="rut">
        <button type="submit"> Update </button>
    </form>
@endsection
