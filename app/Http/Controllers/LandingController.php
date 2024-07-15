<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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

}
