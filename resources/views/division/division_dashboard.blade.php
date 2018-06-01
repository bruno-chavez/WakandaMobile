@extends('layouts.app')

@section('content')

    <h3>Hi {{ Auth::user()->name }} remember that you are managing {{ Auth::user()->division_name }}. </h3>
    <h3> Statistics: </h3>
    <ul>
        <li> Total users: {{ $totalUsers }} </li>
        <li> Total numbers: {{ $totalNumbers }} </li>
        <li> Total activated numbers: {{ $activatedNumbers }} </li>
        <li> Total deactivated numbers: {{  $totalNumbers - $activatedNumbers }} </li>
    </ul>

    @if(count(Auth::user()->from_portabilities))
        <div style="overflow-x:auto;">
            <blockquote class="blockquote text-left">
                <h3> Users wanting to leave the division: </h3>
            </blockquote>

            <table class="table table-hover table-bordered">

                <thead>
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> User </th>
                    <th scope="col">Old Division</th>
                    <th scope="col">New Division</th>
                    <th scope="col">Approve</th>
                    <th scope="col">Decline</th>
                </tr>
                </thead>

                <tbody>
                @php($count = 1)
                @foreach( Auth::user()->from_portabilities as $port)

                    <tr>
                        <th scope="row">{{$count}} </th>
                        <td> {{ $port->user->name }} </td>
                        <td> {{ $port->old_division->division_name }} </td>
                        <td> {{ $port->new_division->division_name }} </td>
                        <td> <form class="form-horizontal" method="POST"
                                   action="{{ route('division.portability.approve',
                                      ['port' => $port->id, 'division' => Auth::id()]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                @if($port->old_division_approval)
                                    <button class="btn" type="submit" disabled> Approve </button>
                                @else
                                    <button class="btn" type="submit"> Approve </button>
                                @endif
                            </form>
                        </td>
                        <td> <form class="form-horizontal" method="POST"
                                   action="{{ route('division.portability.decline', $port->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn" type="submit"> Decline </button>
                            </form>
                        </td>
                    </tr>
                    @php($count++)
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h3> There are no users that want to leave this division, great job!</h3>
    @endif

    @if(count(Auth::user()->to_portabilities))
        <div style="overflow-x:auto;">

            <blockquote class="blockquote text-left">
                <h3> Users wanting to enter the division: </h3>
            </blockquote>

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> User </th>
                    <th scope="col">Old Division</th>
                    <th scope="col">New Division</th>
                    <th scope="col">Approve</th>
                    <th scope="col">Decline</th>
                </tr>
                </thead>

                <tbody>
                @php($count = 1)
                @foreach( Auth::user()->to_portabilities as $port)
                    <tr>
                        <th scope="row">{{$count}} </th>
                        <td> {{ $port->user->name }} </td>
                        <td> {{ $port->old_division->division_name }} </td>
                        <td> {{ $port->new_division->division_name }} </td>
                        <td> <form class="form-horizontal" method="POST"
                                   action="{{ route('division.portability.approve',
                                      ['port' => $port->id, 'division' => Auth::id()]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                @if($port->new_division_approval)
                                        <button class="btn" type="submit" disabled> Approve </button>
                                @else
                                    <button class="btn" type="submit"> Approve </button>
                                @endif
                            </form>
                        </td>
                        <td> <form class="form-horizontal" method="POST"
                                   action="{{ route('division.portability.decline', $port->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn" type="submit"> Decline </button>
                            </form>
                        </td>
                    </tr>
                    @php($count++)
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h3> There are no users that want to enter this division, you can do better!</h3>
    @endif
@endsection
