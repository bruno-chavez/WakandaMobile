<?php

namespace App\Http\Controllers;

use App\Division;
use Illuminate\Http\Request;
use Auth;

class UsersListController extends Controller
{
    public function __construct() {
        $this->middleware('auth:division');

    }

    public function index() {
        $users = Auth::user()->users;

        return view('division.users_list', compact('users'));
    }
}
