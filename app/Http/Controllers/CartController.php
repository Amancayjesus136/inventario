<?php

namespace App\Http\Controllers;

use App\Models\JsonData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $cartItems = $request->input('cartItems');
        Cache::put('cartItems', $cartItems, now()->addSeconds(20));
        JsonData::create([
            'json_data' => json_encode($cartItems),
        ]);

        return response()->json(['message' => 'Carrito guardado con éxito'], 200);
    }

    public function index()
    {
        $cartItems = Cache::get('cartItems', []);
        return response()->json($cartItems, 200);
    }
}
