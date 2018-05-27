<?php

namespace App\Http\Controllers;

use App\Portability;
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

    public function delete(User $user) {

        //Elimina los numeros y a portabilidad, asociados al usuario antes de eliminar al usuario.
        foreach ($user->number as $number) {
            $number->delete();
        }
        $port = Portability::where('user_id', $user->id)->first();
        $port->delete();
        $user->delete();

        session()->flash('message', 'User deleted succesfuly');

        return redirect()->route('division.usersList');
    }
    public function update(User $user){

        $this->validate(request(), [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:divisions|unique:users',
            'rut' => 'integer|unique:users'
        ]);

        // column es el dato que se quiere cambiar del usuario
        // input es el nuevo valor de ese dato.
        $column = Input::get('column');
        $input = Input::get($column);

        $user->$column = $input;
        $user->save();

        // Envia una laerta si se actualiza un dato correctamente.
        // Formatea el mensaje para que empieze con mauyscula.
        $message = $column . ' successfully updated.';
        $message = ucfirst($message);
        session()->flash('message', $message);

        return redirect()->route('division.userInfo', $user->id);
    }
}
