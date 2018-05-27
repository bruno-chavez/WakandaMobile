<?php

namespace App\Http\Controllers;

use App\Division;
use App\Portability;

class PortabilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:division');
    }

    public function changeStatus(Portability $port, Division $division, $status) {

        // Determina si la request es de la nueva o vieja division.
        if($division->id == $port->old_division_id) {

            // Determina si acepta o cancela la solicitud.
            if($status == 'approve') {
                $port->old_division_approval = '1';
            } else {
                $port->delete();
                session()->flash('message', 'Portability successfully declined.');
                return redirect()->route('division.dashboard');
            }
        }
        else {
            if($status == 'approve') {
                $port->new_division_approval = '1';
            }
            else {
                $port->delete();
                session()->flash('message', 'Portability successfully declined.');
                return redirect()->route('division.dashboard');
            }
        }

        // Determina si ambas divisiones aceptaron la solicitud.
        if($port->old_division_approval and $port->new_division_approval) {
            $port->user->division_id = $port->new_division->id;
            $port->user->save();

            foreach ($port->user->number as $number) {
                $number->number = substr($number->number, -7);
                $number->number = $port->   new_division->prefix . $number->number;
                $number->save();
            }

            $port->delete();
            session()->flash('message', 'Portability successfully approved by both divisions.');
            return redirect()->route('division.dashboard');
        }
        else {
            $port->save();
            session()->flash('message', 'Portability successfully approved.');
            return redirect()->route('division.dashboard');
        }
    }
}
