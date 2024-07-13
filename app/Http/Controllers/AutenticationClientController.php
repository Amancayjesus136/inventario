<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutenticationClientController extends Controller
{
    public function login_user(){
        return view('auth.client.login');
    }

    public function register_user(){
        return view('auth.client.register');
    }

}
