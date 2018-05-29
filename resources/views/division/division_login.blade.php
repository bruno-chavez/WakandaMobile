@extends('layouts.app')

@section('styles')
    <link href="/css/login.css" rel="stylesheet">
@endsection

@section('content')

    <div class="panel-heading"> Division Log In</div>

    <form class="form-signin" method="POST" action="{{route('division.login.submit')}}">
        {{ csrf_field() }}

        <div class="form-label-group">
            <input id="email" type="email" class="form-control" name="email" placeholder="Email address"
                   value="{{ old('email') }}" required autofocus>
            <label for="email">Email address</label>
        </div>

        <div class="form-label-group">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
    </form>

@endsection