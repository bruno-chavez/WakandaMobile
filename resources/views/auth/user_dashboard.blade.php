@extends('layouts.app')

@section('content')
    <h3> Welcome back {{ Auth::user()->name }}! </h3>
    <h3> Statistics: </h3>
    <ul>
        <li> User email: {{ Auth::user()->email }} </li>
        <li> User rut: {{ Auth::user()->rut }} </li>
        <li> User of division: {{ Auth::user()->division->division_name }} </li>
    </ul>

    @if(count(Auth::user()->number))
        <div style="overflow-x:auto;">
            <blockquote class="blockquote text-left">
                <h4> Numbers: </h4>
            </blockquote>

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> Number </th>
                    <th scope="col"> Status</th>
                    <th scope="col"> Reason of deactivation </th>
                </tr>
                </thead>

                <tbody>
                @php($count = 1)
                @foreach( Auth::user()->number as $number)
                    <tr>
                        <th scope="row">{{$count}} </th>
                        <td> {{ Auth::user()->division->prefix . $number->number }} </td>
                        <td>
                            @if ($number->deactivated)
                                Deactivated
                            @else
                                Activated
                            @endif
                        </td>
                        <td>
                            @if ($number->deactivated)
                                {{$number->note}}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    @php($count++)
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h3> This user does not have any numbers. </h3>
    @endif

    @if(\App\Portability::where('user_id', Auth::id())->first() != null)
        <h3> Details of current request:</h3>
        Remember that you can only request one change of company at a time.
        @php($port = \App\Portability::where('user_id', Auth::id())->first())
        <ul>
            @if ($port->old_division_approval)
                <li> {{ $port->old_division->division_name }} has accepted the change of division </li>
            @else
                <li> {{ $port->old_division->division_name }} has yet to accept or decline the change of division </li>
            @endif

            @if ($port->new_division_approval)
                <li> {{ $port->new_division->division_name }} has accepted the change of division </li>
            @else
                <li> {{ $port->new_division->division_name }} has yet to accept or decline the change of division </li>
            @endif
        </ul>
    @else

        <h3> Request a change of division: </h3>
        <a href="{{ route('user.portability') }}"> <button class="btn"> Port</button> </a>
    @endif
@endsection
