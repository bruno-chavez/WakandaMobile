<?php

namespace App\Http\Controllers;

use Auth;
use App\Number;
use App\User;

class NumberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:division');
    }

    public function showNumberForm(User $user) {

        // Verifica el tipo de guard al que corresponda el request y redirige acordemente.
        /*if (Auth::guard('web')->check()) {
            return redirect()->route('user.dashboard');
        }*/


        return view('division.number', compact('user'));

    }

    public function create(User $user) {
        $this->validate(request(), [
            'number' => 'required|string',
        ]);

        // Es necesario hashear la contraseña antes de hacer un query.
        $number = request('number');
        #dd(request('number'));
        #dd(Auth::user()->division->prefix);
        $prefix = strval(Auth::user()->prefix);
        #dd($prefix);
        $number = $prefix . $number;
        #dd($number);

        $queryFields = [];
        $queryFields = array_add($queryFields, 'number', $number);
        $queryFields = array_add($queryFields, 'note', '');
        $queryFields = array_add($queryFields,'user_id', $user->id);
        Number::create($queryFields);
        return redirect(route('division.userInfo', $user->id));
    }
}
