@extends('layouts.app2')

@section('content')
    <div style="overflow-x:auto;">

        <blockquote class="blockquote text-left">
            <h3> Users of this division: </h3>
        </blockquote>

        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col"> # </th>
                <th scope="col"> Name </th>
                <th scope="col"> RUT </th>
                <th scope="col"> Email </th>
                <th scope="col"> Details </th>
            </tr>
            </thead>

            <tbody>
            @php($count = 1)
            @foreach( $users as $user)
                <tr>
                    <th scope="row">{{ $count }} </th>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->rut }} </td>
                    <td> {{ $user->email }} </td>
                    <td> <a href="{{ route('division.userInfo', $user->id) }}">
                            <button type="submit" class="btn"> Details </button> </a>
                    </td>
                </tr>
                @php($count++)
            @endforeach
            </tbody>
        </table>
    </div>
@endsection