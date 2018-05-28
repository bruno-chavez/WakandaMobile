@extends('layouts.app')

@section('content')
    @foreach($users as $user)
        <article>
            <a href="{{ route('division.userInfo', $user->id) }}"> {{ $user->name }} </a>
            {{$user->email}}
        </article>
    @endforeach
@endsection