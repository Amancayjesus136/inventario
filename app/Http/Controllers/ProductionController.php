<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notificacion;
use App\Models\Product;
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

        if ($request->hasFile('photo_category')) {
            $file = $request->file('photo_category');
            $fileName = $file->getClientOriginalName();

            $fotoPath = $file->storeAs('assets/imagenes/category', $fileName, 'public');
            $categories->photo_category = $fotoPath;
            $categories->save();
        }

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

     public function products_index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('product.principal_product', compact('products', 'categories'));
    }

    public function products_store(Request $request)
    {
        $data = $request->all();
        $data['status_product'] = $data['status_product'] ?? 1;

        $data['user_created_product'] = Auth::user()->name;
        $data['user_updated_product'] = Auth::user()->name;
        $data['date_created_product'] = now();
        $data['date_updated_product'] = now();

        $products = Product::create($data);

        if ($request->hasFile('photo_product')) {
            $file = $request->file('photo_product');
            $fileName = $file->getClientOriginalName();

            $fotoPath = $file->storeAs('assets/imagenes/product', $fileName, 'public');
            $products->photo_product = $fotoPath;
            $products->save();
        }

        if  ($products) {
            return redirect()->route('products.index')->with('success', 'Product creada correctamente');
        } else {
            return redirect()->back()->with('error', 'Hubo un error al crear el product');
        }
    }

    public function products_show(string $id)
    {
        //
    }

    public function products_update(Request $request, string $id)
    {
        //
    }

    public function products_desactivate(string $id)
    {
        //
    }
}
