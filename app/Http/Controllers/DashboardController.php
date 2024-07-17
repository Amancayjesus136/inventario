<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $products = Product::paginate(5);
        $users = User::paginate(5);
        return view('dashboard', compact('products', 'users'));
    }

    public function dashboard_administrador(){
        return view('dashboardCliente');
    }
}
