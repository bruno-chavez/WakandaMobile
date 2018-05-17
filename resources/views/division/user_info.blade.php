@extends('layouts.app')

@section('content')
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
            @component('components.who')
            @endcomponent
            {{ $user->name }}
            {{ $user->email }}
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
                <input id="email" type="text" class="form-control" name="email" value="{{ old('name') }}">
                <button type="submit">
                    Update
                </button>
            </form>
        </body>
        </html>
@endsection