@extends('layouts.app')

@section('styles')
    <link href="/css/form.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
@endsection
@section('content')
    <blockquote class="blockquote text-center">
        <h1> Register a new division </h1>
    </blockquote>

    <form class="form-signin" method="POST" action="{{route('division.register.submit')}}">
        {{ csrf_field() }}

        <div class="form-label-group">
            <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                   value="{{ old('name') }}" required>
            <label for="name"> Name </label>
        </div>

        <div class="form-label-group">
            <input id="email" type="email" class="form-control" name="email" placeholder="Email address"
                   value="{{ old('email') }}" required>
            <label for="email"> Email address </label>
        </div>

        <div class="form-label-group">
            <input id="prefix" type="text" class="form-control" name="prefix" placeholder="Prefix"
                   value="{{ old('prefix') }}" required>
            <label for="prefix"> Prefix </label>
        </div>

        <div class="form-label-group">
            <input id="division_name" type="text" class="form-control" name="division_name" placeholder="Division Name"
                   value="{{ old('division_name') }}" required>
            <label for="division_name"> Division Name</label>
        </div>

        <div class="form-label-group">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
            <label for="password"> Password</label>
        </div>
        <div class="form-label-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                   placeholder="Confirm Password" required>
            <label for="password-confirm"> Confirm Password</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit"> Register </button>
    </form>
@endsection
