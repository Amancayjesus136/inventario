<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Factura;
use App\Models\FacturaRelation;
use App\Models\JsonData;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LandingController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();
        return view('welcome.landing', compact('categories'));
    }

    public function details_category()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('welcome.details_category', compact('products', 'categories'));
    }

    public function details_bebidas()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('welcome.list_bebidas', compact('products', 'categories'));
    }

    public function details_cocteles()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('welcome.list_tragos', compact('products', 'categories'));
    }

    public function direccion()
    {
        return view('welcome.direccion');
    }

    public function sobre_mi()
    {
        return view('welcome.sobre');
    }

}
