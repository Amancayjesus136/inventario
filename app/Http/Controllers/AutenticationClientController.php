<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class AutenticationClientController extends Controller
{
    public function login_user(){
        return view('auth.client.login', ['roles' => Role::all()]);
    }

    public function register_user(){
        return view('auth.client.register', ['roles' => Role::all()]);
    }

}
