<?php

namespace App\Http\Controllers;

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

        $this->validate(request(), [
            'number' => 'required|integer|digits:7|unique:numbers',
        ]);

        $queryFields = ['number' => request('number')];
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
            session()->flash('message', 'Número activado exitosamente.');

        }
        else {
            $this->validate(request(), [
                'note' => 'required|string|max:255',
            ]);

            $number->note = request('note');
            $number->deactivated = 1;
            $number->save();
            session()->flash('message', 'Número desactivado exitosamente.');
        }

        return redirect()->route('division.userInfo', $user->id);

    }
}
