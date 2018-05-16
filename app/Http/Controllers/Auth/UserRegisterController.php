<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use App\User;
use App\Http\Controllers\Controller;

class UserRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation.
    |
    */

    /**
     * Where to redirect after registration.
     *
     * @var string
     */
    protected $redirectTo = 'division';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:division');
    }

    // Muestra la view de registro si esta correctamente autentificado.
    public function showRegistrationForm()
    {
        // Verifica el tipo de guard al que corresponda el request y redirige acordemente.
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.dashboard');
        }
        return view('auth.user_register');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create()
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:divisions',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Es necesario hashear la contraseña antes de hacer un query.
        $queryFields = request(['name', 'email']);
        $queryFields = array_add($queryFields, 'password', Hash::make(request('password')));
        $queryFields = array_add($queryFields,'division_id', Auth::id());
        User::create($queryFields);
        return redirect()->route('division.dashboard');
    }
}
