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
        return view('division.division_login');
    }

    public function login(Request $request)
    {
        // Validates form
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempts to login
        if (Auth::guard('division')->attempt(['email' => $request->email, 'password' => $request->password],
            $request->remember)) {
            return redirect()->intended(route('division.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
