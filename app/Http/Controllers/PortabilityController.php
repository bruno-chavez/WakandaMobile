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

    protected function checkApproved(Portability $port) {

        if($port->old_division_approval and $port->new_division_approval) {
            $port->user->division_id = $port->new_division->id;
            $port->user->save();

            $port->delete();
            session()->flash('message', 'Portabilidad aceptada por ambas diviciones exitosamente.');
            return true;
        }
        else {
            return false;
        }
    }

    public function approve(Portability $port, Division $division) {

        // Determina si la request es de la nueva o vieja division.
        if($division->id === $port->old_division_id) {
            $port->old_division_approval = '1';
        }
        else {
            $port->new_division_approval = '1';
        }

        // Determina si ambas divisiones aceptaron la solicitud.
        if($this->checkApproved($port)) {
            return redirect()->route('division.dashboard');
        }
        else {
            $port->save();
            session()->flash('message', 'Aceptaste la solicitud de portabilidad de ' . $port->user->name);
            return redirect()->route('division.dashboard');
        }
    }

    public function decline(Portability $port) {
        $port->delete();
        session()->flash('message', 'Declinaste la solicitud de portabilidad de ' . $port->user->name);
        return redirect()->route('division.dashboard');
    }
}
