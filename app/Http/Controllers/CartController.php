<?php

namespace App\Http\Controllers;

use App\Models\JsonData;
use App\Models\Notificacion; // Asegúrate de importar el modelo Notificacion
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $cartItems = $request->input('cartItems');
        Cache::put('cartItems', $cartItems, now()->addSeconds(20));
        JsonData::create([
            'json_data' => json_encode($cartItems),
            'status_orden' => 1,
        ]);

        Notificacion::create([
            'type' => 'delivery',
            'data' => json_encode(['message' => 'Un cliente solicitó un pedido por delivery']),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['message' => 'Carrito guardado con éxito y notificación creada'], 200);
    }

    public function index()
    {
        $cartItems = Cache::get('cartItems', []);
        return response()->json($cartItems, 200);
    }
}

