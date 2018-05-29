@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Dashboard
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST"
                              action="{{ route('division.number.create', $user->id) }}">
                            {{ csrf_field() }}

                            <label for="number" class="col-md-offset-4 control-label">Create Number</label>
                            <input id="number" type="text" class="form-control" name="number">
                            <button class="btn" type="submit"> Create </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection