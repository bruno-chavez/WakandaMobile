@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p> You are porting from: {{ Auth::user()->division->division_name }} </p>
                        <p> All of your numbers will change of prefix once the portability is approved </p>

                            <form name="division" class="form-horizontal" method="POST" action="{{ route('user.portability.submit') }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <select name="division">
                                    @foreach (\App\Division::all() as $division)
                                        @if(Auth::user()->division->division_name == $division->division_name)
                                            @continue
                                        @endif
                                    <option value="{{ $division->division_name }}"> {{ $division->division_name }} </option>
                                    @endforeach
                                </select>

                                <div class="form-horizontal">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Port
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
