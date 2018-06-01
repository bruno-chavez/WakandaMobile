@extends('layouts.app')

@section('styles')
    <link href="/css/form.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
@endsection

@section('content')
    @if($number->deactivated)
        <blockquote class="blockquote text-left">
            <h4> To activate this number, click on the button below </h4>
        </blockquote>

        <form class="form-horizontal" method="POST"
              action="{{ route('division.number.changeStatus',
                                        ['user' => $user->id, 'number' => $number->id]) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <button class="btn" type="submit"> Activate </button>
        </form>
    @else
        <form class="form-signin" method="POST" action="{{ route('division.number.changeStatus',
                                            ['user' => $user->id, 'number' => $number->id]) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <blockquote class="blockquote text-left">
                <h4> To deactivate this number you must enter a reason for it. </h4>
            </blockquote>

            <div class="form-label-group">
                <input id="note" type="text" class="form-control" name="note" placeholder="Note" required autofocus>
                <label for="note"> Note </label>
            </div>

            <button class="btn" type="submit"> Deactivate </button>
        </form>
    @endif
@endsection