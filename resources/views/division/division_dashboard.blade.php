@extends('layouts.app')

@section('content')
        <!doctype html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                </head>

                <body>
                    <p> <a href="{{ route('user.register') }}">Create Users</a> </p>
                    <p> <a href="{{ route('division.usersList') }}">Users List</a> </p>


                    <p> Total users: {{ $totalUsers }} </p>
                    <p> Total numbers: {{ $totalNumbers }} </p>
                    <p> Total activated numbers: {{ $activatedNumbers }} </p>
                    <p> Total deactivated numbers: {{  $totalNumbers - $activatedNumbers }} </p>

                    <table style="width:50%">
                        <tr>
                            <th> User </th>
                            <th> Old Division </th>
                            <th> New Division </th>
                        </tr>

                        @foreach( \App\Portability::all() as $port)
                            @if($port->old_division->division_name == Auth::user()->division_name or
                            $port->new_division->division_name == Auth::user()->division_name)
                                <tr>
                                    <td> {{ $port->user->name }} </td>
                                    <td> {{ $port->old_division->division_name }} </td>
                                    <td> {{ $port->new_division->division_name }} </td>
                                    <td>
                                        <form class="form-horizontal" method="POST"
                                          action="{{ url('division/' . $port->id . '/' . Auth::id() . '/' . 'approve') }}">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <button type="submit"> Approve </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form class="form-horizontal" method="POST"
                                          action="{{ url('division/' . $port->id . '/' . Auth::id() . '/' . 'decline') }}">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <button type="submit"> Decline </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </body>
            </html>
@endsection
