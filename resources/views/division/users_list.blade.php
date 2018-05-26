@extends('layouts.app')

@section('content')
        <!doctype html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                </head>
                <body>
                @foreach($users as $user)
                    <article>
                        <a href="{{ route('division.userInfo', $user->id) }}"> {{ $user->name }} </a>
                        {{$user->email}}
                    </article>
                @endforeach
</body>
</html>
@endsection