@extends('layouts.app')

@section('navbar.content')
    <li class="nav-item"> <a class="nav-link active" href="#home">Inicio <span class="sr-only">(current)</span></a> </li>
@endsection

@section('content')

    <header class="bg-gradient" id="home">
        <div class="container mt-5">
            <h1> Portate de division! </h1>
        </div>
    </header>

    <div class="section light-bg" id="details">
        <div class="container">
            <p> Te estas portando de: {{ Auth::user()->division->division_name }}</p>
            <p> Si la portabilidad se realiza todos tus numeros cambiaran de prefijo </p>
            <p> Recuerda que solo puedes tener una solicitud de portabilidad activa a la vez </p>

            <div>
                <form name="division" class="form-horizontal" method="POST" action="{{ route('user.portability.submit') }}">
                    {{ csrf_field() }}

                    <label for="division"></label>
                    <select name="division">
                        @foreach (\App\Division::all() as $division)
                            @if(Auth::user()->division->division_name === $division->division_name)
                                @continue
                            @endif
                            <option value="{{ $division->division_name }}"> {{ $division->division_name }} </option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary"> Portate </button>
                </form>
            </div>
        </div>
    </div>
@endsection
