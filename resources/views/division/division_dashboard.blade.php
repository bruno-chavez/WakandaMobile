@extends('layouts.app')

@section('content')
        <!doctype html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">

                </head>
                <body>
                <p> <a href="{{ url('user/register') }}">Create Users</a> </p>
                <p> <a href="{{ url('division/userslist') }}">Users List</a> </p>


                <p> Total de usuarios: {{ $totalUsers }} </p>
                <p> Total de numeros: {{ $totalNumbers }} </p>
                <p> Total de numeros activados: {{ $activatedNumbers }} </p>

                </body>
            </html>
@endsection