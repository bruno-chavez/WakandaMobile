@extends('layouts.app')

@section('header.name')
    <h1> Portate de division! </h1>
@endsection

@section('content')

    <div class="section light-bg">
        <div class="container">
            <p> Te estas portando de: {{ Auth::user()->division->division_name }}. </p>
            <p> Si la portabilidad se realiza todos tus numeros cambiaran de prefijo. </p>
            <p> Recuerda que solo puedes tener una solicitud de portabilidad activa a la vez. </p>
            <p> Selecciona una de las siguientes divisiones para pedir portate: </p>

            <div>
                <form name="division" class="form-horizontal" method="POST" action="{{ route('user.portability.submit') }}">
                    {{ csrf_field() }}

                    <select name="division">
                        @foreach (\App\Division::all() as $division)
                            @if(Auth::user()->division->division_name === $division->division_name)
                                @continue
                            @endif
                            <option label="division" value="{{ $division->division_name }}"> {{ $division->division_name }} </option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary"> Portate </button>
                </form>
            </div>
        </div>
    </div>
@endsection
