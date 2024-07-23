<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Factura;
use App\Models\FacturaEvento;
use App\Models\FacturaRelation;
use App\Models\JsonData;
use App\Models\MultipleProduct;
use App\Models\Notificacion;
use App\Models\Permiso;
use App\Models\Product;
use App\Models\RelationProduct;
use App\Models\Role;
use App\Models\RolePermiso;
use App\Models\RoleUser;
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

    /*------------------------------------*
     *     Notifiacion                    *
     *------------------------------------*/

    public function markAsRead(Request $request)
    {
        Notificacion::whereNull('read_at')->update(['read_at' => now()]);

        return response()->json(['success' => true]);
    }

     /*------------------------------------*
     *     Roles y permisos                *
     *-------------------------------------*/

     public function perfiles_index()
    {
        $current_roles = RoleUser::where('idUsuario', Auth::user()->id)->pluck('idRole')->all();

        $perfiles = Role::paginate(10);

        // if (!in_array(1, $current_roles)) {
        //     $perfiles = $perfiles->where('id_role', '!=', 1);
        // }

        $permisos = [];
        $grupos = Permiso::orderBy('grupo', 'DESC')->orderBy('permiso', 'ASC')->get();
        if ($grupos) {
            foreach ($grupos as $grupo) {
                if (empty($permisos[$grupo->grupo])) {
                    $permisos[$grupo->grupo] = [];
                }

                $permisos[$grupo->grupo][$grupo->idPermiso] = $grupo->permiso;
            }
        }

        return view('roles.perfiles', compact('perfiles', 'permisos'));
    }

    public function perfiles_store(Request $request)
    {
        Role::create($request->all());
        return redirect()->back()->with('success', 'Perfil registrado exitosamente');
    }

    public function perfiles_update(Request $request, $id_role)
    {
        $data = $request->all();

        $perfil = Role::findOrFail($id_role);

        $perfil->update($data);

        if (isset($data['permisos']) && count($data['permisos']) > 0) {
            RolePermiso::where('idRole', $perfil->id_role)->delete();

            foreach ($data['permisos'] as $permiso_id) {
                RolePermiso::create([
                    'idPermiso' => $permiso_id,
                    'idRole' => $perfil->id_role
                ]);
            }
        }

        return redirect()->back()->with('success', 'Perfil actualizado exitosamente');
    }

    public function permisos_index()
    {
        $permisos = Permiso::paginate(5);
        return view('roles.permisos', compact('permisos'));
    }

    public function permisos_store(Request $request)
    {
        Permiso::create($request->all());
        return redirect()->back()->with('success', 'Permiso registrado exitosamente');
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

            $relativeUrl = 'storage/imagenes/' . $fileName;

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

     /*------------------------------------*
     *     Ordenes                        *
     *------------------------------------*/

     public function ordenes_index()
     {
         // Obtener todos los registros con estado 1 dentro del JSON
         $jsonData = JsonData::all()->filter(function ($data) {
             $products = json_decode($data->json_data);
             foreach ($products as $product) {
                 if ($product->estado == 1) {
                     return true;
                 }
             }
             return false;
         });

         return view('ordenes.delivery', ['jsonData' => $jsonData]);
     }


    public function ordenes_desactivados()
    {
        $jsonData = JsonData::all()->filter(function($item) {
            $data = is_string($item->json_data) ? json_decode($item->json_data, true) : $item->json_data;
            foreach ($data as $product) {
                if ($product['estado'] == 0) {
                    return true;
                }
            }
            return false;
        });

        return view('ordenes.delivery_cancelados', ['jsonData' => $jsonData]);
    }

    public function updateStatus($id, $status)
    {
        $jsonData = JsonData::findOrFail($id);
        $data = is_string($jsonData->json_data) ? json_decode($jsonData->json_data, true) : $jsonData->json_data;

        foreach ($data as &$item) {
            if ($item['estado'] != $status) {
                $item['estado'] = $status;
            }
        }

        $jsonData->json_data = json_encode($data);
        $jsonData->save();

        return redirect()->back()->with('success', 'Estado cambiado correctamente');
    }


     /*------------------------------------*
     *     contact                        *
     *------------------------------------*/


    /*------------------------------------*
     *     Horarios                        *
     *------------------------------------*/

}
