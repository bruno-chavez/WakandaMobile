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
                        {{$user->name}}
                        {{$user->email}}
                    </article>
                @endforeach
</body>
</html>
@endsection