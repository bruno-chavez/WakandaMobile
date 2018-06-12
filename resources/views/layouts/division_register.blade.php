<blockquote class="blockquote text-center">
    <h2> Registro de Division: </h2>
</blockquote>

<form class="form-signin" method="POST" action="{{route('division.register.submit')}}">
    {{ csrf_field() }}

    <div class="form-label-group">
        <input id="name" type="text" class="form-control" name="name" placeholder="Name"
               value="{{ old('name') }}" required>
        <label for="name"> Nombre </label>
    </div>

    <div class="form-label-group">
        <input id="email_division_register" type="email" class="form-control" name="email" placeholder="Email address"
               value="{{ old('email') }}" required>
        <label for="email_division_register"> Email </label>
    </div>

    <div class="form-label-group">
        <input id="prefix" type="text" class="form-control" name="prefix" placeholder="Prefix"
               value="{{ old('prefix') }}" required>
        <label for="prefix"> Prefijo </label>
    </div>

    <div class="form-label-group">
        <input id="division_name" type="text" class="form-control" name="division_name" placeholder="Division Name"
               value="{{ old('division_name') }}" required>
        <label for="division_name"> Nombre Division </label>
    </div>

    <div class="form-label-group">
        <input id="password_division_register" type="password" class="form-control" name="password" placeholder="Password" required>
        <label for="password_division_register"> Contraseña</label>
    </div>

    <div class="form-label-group">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
               placeholder="Confirm Password" required>
        <label for="password-confirm"> Confirma Contraseña</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit"> Registrate </button>
</form>