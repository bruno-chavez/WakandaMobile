@extends('layouts.app')

@section('styles')
    <link href="/css/login.css" rel="stylesheet">
@endsection
@section('content')
    <blockquote class="blockquote text-left">
        <h3> Portability Form </h3>
    </blockquote>

    <p> You are porting from: {{ Auth::user()->division->division_name }} </p>
    <p> All of your numbers will change of prefix once the portability is approved by both divisions</p>

    <form name="division" class="form-horizontal" method="POST" action="{{ route('user.portability.submit') }}">
        {{ csrf_field() }}

        <select name="division">
            <label for="name"></label>
            @foreach (\App\Division::all() as $division)
                @if(Auth::user()->division->division_name === $division->division_name)
                    @continue
                @endif
                    <option value="{{ $division->division_name }}"> {{ $division->division_name }} </option>
            @endforeach
        </select>

        <button type="submit" class="btn"> Port </button>
    </form>
@endsection
