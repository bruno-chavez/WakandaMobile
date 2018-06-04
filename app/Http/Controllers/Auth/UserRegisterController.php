<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use App\User;
use App\Http\Controllers\Controller;

class UserRegisterController extends Controller
{

    protected $redirectTo = 'division';


    public function __construct()
    {
        $this->middleware('auth:division');
    }


    // Muestra la view de registro.
    public function showRegistrationForm()
    {

        return view('auth.user_register');
    }


    public function create()
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'rut' => 'required|integer|digits_between:8,9|unique:users',
            'email' => 'required|string|email|max:255|unique:users|unique:divisions',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Es necesario hashear la contraseña antes de hacer un query.
        $queryFields = request(['name', 'rut', 'email']);
        $queryFields = array_add($queryFields, 'password', Hash::make(request('password')));
        $queryFields = array_add($queryFields,'division_id', Auth::id());
        User::create($queryFields);

        session()->flash('message', 'User successfully created.');

        return redirect()->route('division.dashboard');
    }
}
