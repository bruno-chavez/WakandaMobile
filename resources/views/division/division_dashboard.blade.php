@extends('layouts.app')

@section('content')
        <!doctype html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">

                </head>
                <body>
                <a href="{{ url('user/register') }}">Create Users</a>
                <a href="{{ url('division/userslist') }}">Users List</a>

                @component('components.who')
                @endcomponent

                Cantidad de usuarios: {{$count}}

                </body>
            </html>
@endsection