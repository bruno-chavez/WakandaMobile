@extends('layouts.app')

@section('styles')
    <link href="/css/form.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
@endsection

@section('content')
    <form class="form-signin" method="POST" action="{{ route('division.number.create', $user->id) }}">
        {{ csrf_field() }}

        <blockquote class="blockquote text-left">
            The number must be 7 digits long and unique
        </blockquote>

        <div class="form-label-group">
            <input id="number" type="text" class="form-control" name="number" placeholder="Number"
                   value="{{ old('number') }}" required>
            <label for="number">Number</label>
        </div>

        <button class="btn" type="submit"> Create </button>
    </form>
@endsection