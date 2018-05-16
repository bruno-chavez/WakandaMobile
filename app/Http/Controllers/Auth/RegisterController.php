<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
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

    public function showRegistrationForm()
    {
        // Verifica el tipo de guard al que corresponda el request y redirige acordemente.
        if (Auth::guard('web')->check()) {
            return redirect()->route('home');
        }

        return view('auth.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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

        User::create($queryFields);
        return redirect(route('division.dashboard'));
    }
}
