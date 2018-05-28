@extends('layouts.app')

@section('content')

    <p> Total users: {{ $totalUsers }} </p>
    <p> Total numbers: {{ $totalNumbers }} </p>
    <p> Total activated numbers: {{ $activatedNumbers }} </p>
    <p> Total deactivated numbers: {{  $totalNumbers - $activatedNumbers }} </p>
    <b>Users wanting to leave the division:</b>
    <table style="width:50%">
        <tr>
            <th> User </th>
            <th> Old Division </th>
            <th> New Division </th>
        </tr>

        @foreach( Auth::user()->from_portabilities as $port)
            <tr>
                <td> {{ $port->user->name }} </td>
                <td> {{ $port->old_division->division_name }} </td>
                <td> {{ $port->new_division->division_name }} </td>
                <td>
                    <form class="form-horizontal" method="POST"
                          action="{{ route('division.portability.approve',
                                  ['port' => $port->id, 'division' => Auth::id()]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <button type="submit"> Approve </button>
                    </form>
                </td>
                <td>
                    <form class="form-horizontal" method="POST"
                          action="{{ route('division.portability.decline', $port->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit"> Decline </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <b>Users wanting to enter the division:</b>
    <table style="width:50%">
        <tr>
            <th> User </th>
            <th> Old Division </th>
            <th> New Division </th>
        </tr>
        @foreach( Auth::user()->to_portabilities as $port)
            <tr>
                <td> {{ $port->user->name }} </td>
                <td> {{ $port->old_division->division_name }} </td>
                <td> {{ $port->new_division->division_name }} </td>
                <td>
                    <form class="form-horizontal" method="POST"
                          action="{{ route('division.portability.approve',
                                  ['port' => $port->id, 'division' => Auth::id()]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <button type="submit"> Approve </button>
                    </form>
                </td>
                <td>
                    <form class="form-horizontal" method="POST"
                          action="{{ route('division.portability.decline', $port->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit"> Decline </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
