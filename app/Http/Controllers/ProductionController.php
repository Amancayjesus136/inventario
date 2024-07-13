<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductionController extends Controller
{
    /*-------------------------------------*
     * functions for the categories module *
     *-------------------------------------*/
    public function categories_index()
    {
        $categories = Category::all();
        return view('categories.principal_category', compact('categories'));
    }

    public function categories_store(Request $request)
    {
        $data = $request->all();
        $data['status_category'] = $data['status_category'] ?? 1;

        $data['user_created_category'] = Auth::user()->name;
        $data['user_updated_category'] = Auth::user()->name;
        $data['date_created_category'] = now();
        $data['date_updated_category'] = now();

        $categories = Category::create($data);

        // if ($categories) {
        //     Notificacion::create([
        //         'type' => 'Consulta',
        //         'data' => json_encode(['message' => 'Nueva consulta registrada por ' . $data['user_created_category']]),
        //         'status' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        if  ($categories) {
            return redirect()->route('categories.index')->with('success', 'Categoría creada correctamente');
        } else {
            return redirect()->back()->with('error', 'Hubo un error al crear la categoría');
        }
    }

    public function categories_show(string $id)
    {
        //
    }

    public function categories_update(Request $request, string $id)
    {
        //
    }

    public function categories_desactivate(string $id)
    {
        //
    }

    /*------------------------------------*
     *     functions for product module   *
     *------------------------------------*/
}
