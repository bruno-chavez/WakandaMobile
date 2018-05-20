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

        return view('division.number', compact('user'));
    }

    public function create(User $user) {

        // El prefijo es añadido antes de validar ya que todos los numeros en la tabla numeros estan con prefijo.
        $number = request('number');
        $prefix = strval(Auth::user()->prefix);
        $number = $prefix . $number;
        request()['number'] = $number;

        $this->validate(request(), [
            'number' => 'required|integer|unique:numbers',
        ]);

        $queryFields = [];
        $queryFields = array_add($queryFields, 'number', $number);
        $queryFields = array_add($queryFields, 'note', '');
        $queryFields = array_add($queryFields,'user_id', $user->id);
        Number::create($queryFields);

        return redirect(route('division.userInfo', $user->id));
    }
}
