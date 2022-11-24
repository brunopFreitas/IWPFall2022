<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiveUsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('check.user.active');
//            ->except('welcome'); //calling except for one method
//            ->only('welcome'); //calling for only 1 method

    }
    //
    function welcome(){
        return view('activeusers.welcome');
    }
}
