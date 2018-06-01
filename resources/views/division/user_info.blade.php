@extends('layouts.app')

@section('styles')
    <link href="/css/form.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <blockquote class="blockquote text-left">
            <h4> Details: </h4>
        </blockquote>
        <ul>
            <li>Name: {{ $user->name }}</li>
            <li>Email: {{ $user->email }}</li>
            <li>RUT: {{ $user->rut }}</li>
        </ul>

        @if(count($user->number))
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
                        <th scope="col"> Change status </th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($count = 1)
                    @foreach( $user->number as $number)
                        <tr>
                            <th scope="row">{{$count}} </th>
                            <td> {{ Auth::user()->prefix . $number->number }} </td>
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
                            <td>
                                <a href="{{ route('division.number.status',
                                ['user' => $user->id, 'number' => $number->id]) }}">
                                    <button type="submit" class="btn"> Change </button> </a>
                            </td>
                        </tr>
                        @php($count++)
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h4> This user does not have any numbers. </h4>
        @endif

        <blockquote class="blockquote text-left">
            <h4> Create Numbers:  </h4>
        </blockquote>
        <a href="{{ route('division.number', $user->id) }}">
            <button type="submit" class="btn"> New Number </button> </a>
        <p> </p>

        <blockquote class="blockquote text-left">
            <h4> Delete User:  </h4>
        </blockquote>
        <form method="POST" action="{{ route('division.userInfo.delete', $user->id ) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="btn"> Delete </button>
        </form>
        <p> </p>

        <blockquote class="blockquote text-left">
            <h4> Update Information:  </h4>
        </blockquote>
        <form class="form-label-group" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-label-group">
                <input id="name" type="text" class="form-control" name="name" placeholder="Name" required>
                <label for="name"> Name </label>
            </div>

            <input type="hidden" name="column" value="name">
            <button class="btn" type="submit"> Update </button>
        </form>

        <form class="form-label-group" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}


            <div class="form-label-group">
                <input id="email" type="email" class="form-control" name="email" placeholder="Email address" required>
                <label for="email"> Email address </label>
            </div>

            <input type="hidden" name="column" value="email">
            <button class="btn" type="submit"> Update </button>
        </form>

        <form class="form-label-group" method="POST" action="{{ route('division.userInfo.update', $user->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}


            <div class="form-label-group">
                <input id="rut" type="text" class="form-control" name="rut" placeholder="RUT" required>
                <label for="rut"> RUT </label>
            </div>

            <input type="hidden" name="column" value="rut">
            <button class="btn" type="submit"> Update </button>
        </form>
    </div>
@endsection
