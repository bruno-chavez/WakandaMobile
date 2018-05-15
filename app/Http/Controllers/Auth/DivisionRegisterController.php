<?php

namespace App\Http\Controllers\Auth;

use App\Division;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class DivisionRegisterController extends Controller
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

    public function showRegistrationForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('home');
        }

        if (Auth::guard('division')->check()) {
            return redirect()->route('division.dashboard');
        }
        return view('division.division_register');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'division.dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     */
    public function create()
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:divisions',
            'prefix' => 'required|numeric|max:6|unique:divisions',
            'division_name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $queryFields = request(['name', 'email', 'prefix', 'division_name']);
        $queryFields = array_add($queryFields, 'password', Hash::make(request('password')));

        Division::create($queryFields);
        return redirect(route('division.login'));
    }
}
