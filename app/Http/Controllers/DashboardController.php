<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard_administrador(){
        return view('dashboardCliente');
    }
}
