<blockquote class="blockquote text-center">
    <h2> Login de Division: </h2>
</blockquote>

<form class="form-signin" method="POST" action="{{route('division.login.submit')}}">
    {{ csrf_field() }}

    <div class="form-label-group">
        <input id="email_division_login" type="email" class="form-control" name="email" placeholder="Email address" required autofocus>
        <label for="email_division_login">Email</label>
    </div>

    <div class="form-label-group">
        <input id="password_division_login" type="password" class="form-control" name="password" placeholder="Password" required>
        <label for="password_division_login">Contraseña</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
</form>