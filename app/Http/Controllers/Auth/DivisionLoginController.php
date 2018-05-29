<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DivisionLoginController extends Controller
{
    public function __construct() {

        $this->middleware('guest');
    }

    public function showLoginForm() {
        // Verifica el tipo de guard al que corresponda el request y redirige acordemente.
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.dashboard');
        }

        if (Auth::guard('division')->check()) {
            return redirect()->route('division.dashboard');
        }
        return view('division.division_login');
    }

    public function login(Request $request)
    {
        // Valida los campos del loguin antes de tratar de loguear.
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Intenta loguear.
        if (Auth::guard('division')->attempt(['email' => $request->email, 'password' => $request->password],
            $request->remember)) {
            return redirect()->intended(route('division.dashboard'));
        }

        session()->flash('wrong', 'These credentials do not match our records.');
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
