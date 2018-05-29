@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($number->deactivated)

                            <blockquote class="blockquote text-left">
                                <h1> Activate number </h1>
                            </blockquote>

                            <form class="form-horizontal" method="POST"
                                  action="{{ route('division.number.changeStatus',
                                        ['user' => $user->id, 'number' => $number->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <button class="btn" type="submit"> Activate </button>
                            </form>

                            @else

                                <blockquote class="blockquote text-left">
                                    <h1> Deactivate Number </h1>
                                </blockquote>

                                <form class="form-horizontal" method="POST"
                                      action="{{ route('division.number.changeStatus',
                                            ['user' => $user->id, 'number' => $number->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

                                    <label for="note" class="col-md-offset-4 control-label"> Note </label>
                                    <input id="note" type="text" class="form-control" name="note" required>
                                    <button class="btn" type="submit"> Deactivate </button>
                                </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection