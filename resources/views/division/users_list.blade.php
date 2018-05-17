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
                @foreach($users as $user)
                    <article>
                        <a href="{{ url('division/userslist/' . $user->id) }}">{{$user->name}}</a>
                        {{$user->email}}
                    </article>
                @endforeach
</body>
</html>
@endsection