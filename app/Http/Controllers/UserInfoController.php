<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;

class UserInfoController extends Controller
{
    public function __construct() {

        $this->middleware('auth:division');
    }

    public function index(User $user) {

        return view('division.user_info', compact('user'));
    }

    public function delete($id) {

        $id = intval($id);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('division.usersList');
    }
    public function update($id){

        $this->validate(request(), [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:divisions|unique:users',
            'rut' => 'integer|unique:users'
        ]);


        $column = Input::get('column');
        $input = Input::get($column);
        #dd(Input::all());
        $user = User::find($id);

        $user->$column = $input;
        $user->save();
        return redirect()->route('division.userInfo', $user->id);
    }
}
