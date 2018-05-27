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

    public function showCreationForm(User $user) {

        return view('division.number_create', compact('user'));
    }

    public function create(User $user) {

        // El prefijo es añadido antes de validar ya que todos los numeros en la tabla numeros estan con prefijo.
        $number = request('number');
        $prefix = strval(Auth::user()->prefix);
        $number = $prefix . $number;
        request()['number'] = $number;

        $this->validate(request(), [
            'number' => 'required|string|size:10|unique:numbers',
        ]);

        $queryFields = [];
        $queryFields = array_add($queryFields, 'number', $number);
        $queryFields = array_add($queryFields, 'note', '');
        $queryFields = array_add($queryFields,'user_id', $user->id);
        Number::create($queryFields);

        session()->flash('message', 'Number created correctly.');

        return redirect(route('division.userInfo', $user->id));
    }

    public function showStatusForm (User $user, Number $number) {

        return view('division.number_status', compact('user', 'number'));
    }

    public function changeStatus (User $user, Number $number) {

        if ($number->deactivated) {
            $number->note = '';
            $number->deactivated = 0;
            $number->save();

        }
        else {
            $this->validate(request(), [
                'note' => 'required|string|max:255',
            ]);

            $number->note = request('note');
            $number->deactivated = 1;
            $number->save();
        }

        return redirect()->route('division.userInfo', $user->id);

    }
}
