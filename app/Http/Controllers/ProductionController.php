<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Factura;
use App\Models\FacturaEvento;
use App\Models\FacturaRelation;
use App\Models\MultipleProduct;
use App\Models\Notificacion;
use App\Models\Product;
use App\Models\RelationProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class ProductionController extends Controller
{
    /*-------------------------------------*
     * Link simbolico                      *
     *-------------------------------------*/
    public function createSymlink(): JsonResponse
    {
        if (file_exists(public_path('storage'))) {
            File::delete(public_path('storage'));
        }

        Artisan::call('storage:link');

        return response()->json(['message' => 'Symlink created successfully.']);
    }

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

        $category = Category::create($data);

        if ($request->hasFile('photo_category')) {
            $file = $request->file('photo_category');

            $request->validate([
                'photo_category' => 'required|image|max:2048'
            ]);

            $imagenPath = $file->store('public/imagenes');

            $fileName = basename($imagenPath);

            $relativeUrl = 'storage/public/imagenes/' . $fileName;

            $category->photo_category = $relativeUrl;
            $category->save();
        }

        if ($category) {
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

        $product = Product::create($data);

        if ($request->hasFile('photo_product')) {
            $file = $request->file('photo_product');

            $request->validate([
                'photo_product' => 'required|image|max:2048'
            ]);

            $imagenPath = $file->store('public/imagenes');
            $fileName = basename($imagenPath);
            $relativeUrl = 'storage/public/imagenes/' . $fileName;

            $product->photo_product = $relativeUrl;
            $product->save();
        }

        if ($product) {
            $sizes = $request->input('size_product_multiple', []);
            $prices = $request->input('price_product_multiple', []);
            $discounts = $request->input('discount_product_multiple', []);

            foreach ($sizes as $index => $size) {
                if (!empty($size) && !empty($prices[$index])) {
                    $multipleProduct = MultipleProduct::create([
                        'size_product_multiple' => $size,
                        'price_product_multiple' => $prices[$index],
                        'discount_product_multiple' => $discounts[$index] ?? 0,
                        'user_created_product_multiple' => Auth::user()->name,
                        'user_updated_product_multiple' => Auth::user()->name,
                        'date_created_product_multiple' => now(),
                        'date_updated_product_multiple' => now(),
                        'status_product_multiple' => 1,
                    ]);

                    RelationProduct::create([
                        'id_product' => $product->id_product,
                        'id_multiple_products' => $multipleProduct->id_multiple_products,
                    ]);
                }
            }

            return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
        } else {
            return redirect()->back()->with('error', 'Hubo un error al crear el producto');
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

     /*------------------------------------*
     *     Facturas                        *
     *------------------------------------*/

    public function facturas_index()
    {
        $facturas = Factura::all();
        $productos = Product::all();
        $sizes = MultipleProduct::select('size_product_multiple')->distinct()->get();
        $prices = MultipleProduct::select('price_product_multiple')->distinct()->get();
        return view('facturas.principal_facturas', compact('facturas', 'sizes', 'productos', 'prices'));
    }

    public function facturas_store(Request $request)
    {
        $data = $request->all();
        $data['status_factura'] = $data['status_factura'] ?? 1;
        $user_name = Auth::user()->name;
        $data['user_created_product'] = $user_name;
        $data['user_updated_product'] = $user_name;

        $now = \Carbon\Carbon::now('America/Lima');
        $data['date_created_product'] = $now;
        $data['date_updated_product'] = $now;
        $data['fecha_factura'] = $now;

        $factura = Factura::create($data);

        foreach ($request->name_product_factura as $index => $name_product) {
            FacturaRelation::create([
                'name_product_factura' => $name_product,
                'size_product_factura' => $request->size_product_factura[$index],
                'price_product_factura' => $request->price_product_factura[$index],
                'igv_incluido' => $request->igv_incluido[$index],
                'total_factura' => $request->total_factura,
                'id_factura' => $factura->id_factura,
            ]);
        }

        return redirect()->route('facturas.index')->with('success', 'Factura creada correctamente');
    }

    public function facturas_busqueda(Request $request)
    {
        $productos = Product::all();
        $query = Factura::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('fecha_factura', [$request->start_date, $request->end_date]);
        }

        if ($request->filled('nombres_clientes')) {
            $query->where('nombres_clientes', 'like', '%' . $request->nombres_clientes . '%');
        }

        if ($request->filled('metodo_pago')) {
            $query->where('metodo_pago', $request->metodo_pago);
        }

        if ($request->filled('status_factura')) {
            $query->where('status_factura', $request->status_factura);
        }

        $facturas = $query->with('relations')->get();

        return view('facturas.principal_facturas', compact('facturas', 'productos'));
    }

}
