<blockquote class="blockquote text-center">
    <h2> Login de Usuario: </h2>
</blockquote>

<form class="form-signin" method="POST" action="{{route('user.login')}}">
    {{ csrf_field() }}

    <div class="form-label-group">
        <input id="email_user" type="email" class="form-control" name="email" placeholder="Email address"
               value="{{ old('email') }}" required autofocus>
        <label for="email_user">Email</label>
    </div>

    <div class="form-label-group">
        <input id="password_user" type="password" class="form-control" name="password" placeholder="Password" required>
        <label for="password_user">Contraseña</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
</form>
