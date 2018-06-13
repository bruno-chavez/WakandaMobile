<?php

namespace App\Http\Controllers\Auth;

use App\Division;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

class DivisionRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        // Verifica el tipo de guard al que corresponda el request y redirige acordemente.
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.dashboard');
        }

        if (Auth::guard('division')->check()) {
            return redirect()->route('division.dashboard');
        }
        return view('division.division_register');
    }

    /**
     * Where to redirect divisions after registration.
     *
     * @var string
     */
    protected $redirectTo = 'division/login';

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
     * Create a new division instance after a valid registration.
     */
    public function create()
    {
        // Valida los campos del registro antes de hacer una query.
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:divisions|unique:users',
            'prefix' => 'required|integer|digits:3|unique:divisions',
            'division_name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Es necesario hashear la contraseña antes de hacer un query.
        $queryFields = request(['name', 'email', 'prefix', 'division_name']);
        $queryFields = array_add($queryFields, 'password', Hash::make(request('password')));

        Division::create($queryFields);

        session()->flash('message', 'Division creada exitosamente');

        return redirect()->back();
    }
}
