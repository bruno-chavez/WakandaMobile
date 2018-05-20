<?php

namespace App\Http\Controllers;


use Auth;

class DivisionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:division');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busca todos los usuarios asociados a la division.
        $users = Auth::user()->users;

        $totalUsers = 0;
        $totalNumbers = 0;
        $activatedNumbers = 0;

        // Cuenta el total de usuarios, numeros y activos.
        foreach ($users as $user) {
                $totalUsers += 1;
                $numbers = $user->number;
                foreach ($numbers as $number) {
                    if ($number->deactivated == false) {
                        $activatedNumbers += 1;
                    }
                    $totalNumbers += 1;
                }
        }

        $statistics = [];
        $statistics = array_add($statistics, 'totalUsers', $totalUsers);
        $statistics = array_add($statistics, 'totalNumbers', $totalNumbers);
        $statistics = array_add($statistics, 'activatedNumbers', $activatedNumbers);

        return view('division.division_dashboard', $statistics);
    }
}
