<?php

namespace App\Http\Controllers;


use App\Division;
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
        $users = Division::find(Auth::id())->users;
        $count = 0;
        foreach ($users as $user) {
                $count += 1;
            }

        return view('division.division_dashboard', compact('count'));
    }
}
