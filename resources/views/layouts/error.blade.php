@if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error)
                <li> {{ $error  }} </li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

@if(session('wrong'))
    <div class="alert alert-danger" role="alert">
        {{ session('wrong') }}
    </div>
@endif