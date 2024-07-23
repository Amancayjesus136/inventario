<?php

use App\Http\Controllers\AutenticationClientController;
use App\Http\Controllers\client\LoginClientController as ClientLoginClientController;
use App\Http\Controllers\client\RegisterClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Home system
|--------------------------------------------------------------------------
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'welcome'])->name('welcome.landing');
Route::get('/create-symlink', [ProductionController::class, 'createSymlink']);
Route::get('/detalles/categoria', [LandingController::class, 'details_category'])->name('details.category');
Route::get('/listado/bebidas', [LandingController::class, 'details_bebidas'])->name('listado.bebidas');
Route::get('/listado/cocteles', [LandingController::class, 'details_cocteles'])->name('listado.cocteles');
Route::get('/direccion', [LandingController::class, 'direccion'])->name('welcome.direcion');
Route::get('/sobre-mi', [LandingController::class, 'sobre_mi'])->name('welcome.sobre-mi');
Route::get('/terminos/condiciones', [LandingController::class, 'terminos'])->name('welcome.terminos');

/*
|--------------------------------------------------------------------------
| Autenticación de cliente
|--------------------------------------------------------------------------
|
*/
Route::get('/login/usuario', [AutenticationClientController::class, 'login_user'])->name('login.usuario');
Route::post('/usuario/autenticado/login', [ClientLoginClientController::class, 'iniciar_usuario'])->name('login.store');

Route::get('/register/usuario', [AutenticationClientController::class, 'register_user'])->name('register.usuario');
Route::post('/usuario/autenticado', [RegisterClientController::class, 'store_registrar'])->name('register.store');

/*
|--------------------------------------------------------------------------
| Dashboard en general
|--------------------------------------------------------------------------
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/exportProductToExcel', [DashboardController::class, 'exportProductToExcel'])->name('exportProductToExcel');
Route::get('/exportFacturaToExcel', [DashboardController::class, 'exportFacturaToExcel'])->name('exportFacturaToExcel');
Route::get('/exportToExcel', [DashboardController::class, 'exportToExcel'])->name('exportToExcel');


Route::get('/dashboardCliente', [DashboardController::class, 'dashboard_administrador'])->name('dashboardCliente');
Route::get('/menu', [DashboardController::class, 'dashboard_menu'])->name('dashboard_menu');
Route::get('/menu/bebidas', [DashboardController::class, 'dashboard_menu_bebidas'])->name('dashboard_menu_bebidas');

/*
|--------------------------------------------------------------------------
| Perfil predeterminado de breeze
|--------------------------------------------------------------------------
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/notifications/markAsRead', [ProductionController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/facturas/list', [ProductionController::class, 'facturas_index'])->name('facturas.index');
Route::post('/facturas/store', [ProductionController::class, 'facturas_store'])->name('facturas.store');
Route::get('/facturas/busquedas', [ProductionController::class, 'facturas_busqueda'])->name('facturas.busquedas');

/*
|--------------------------------------------------------------------------
| Ordenes
|--------------------------------------------------------------------------
|
*/
Route::get('/roles/perfiles', [ProductionController::class, 'perfiles_index'])->name('perfiles.index');
Route::post('/perfiles/registrar', [ProductionController::class, 'perfiles_store'])->name('registrar.permisos');
Route::put('/perfiles/{id_role}', [ProductionController::class, 'perfiles_update'])->name('actualizar.permisos');

Route::get('/roles/permisos', [ProductionController::class, 'permisos'])->name('permisos.index');



/*
|--------------------------------------------------------------------------
| Categorias
|--------------------------------------------------------------------------
|
*/

Route::get('/categories/list', [ProductionController::class, 'categories_index'])->name('categories.index');
Route::post('/categories/store', [ProductionController::class, 'categories_store'])->name('categories.store');

/*
|--------------------------------------------------------------------------
| Productos
|--------------------------------------------------------------------------
|
*/
Route::get('/products/list', [ProductionController::class, 'products_index'])->name('products.index');
Route::post('/products/store', [ProductionController::class, 'products_store'])->name('products.store');

/*
|--------------------------------------------------------------------------
| Ordenes
|--------------------------------------------------------------------------
|
*/
Route::get('/ordenes/list', [ProductionController::class, 'ordenes_index'])->name('ordenes.index');
Route::get('/ordenes/cancelados', [ProductionController::class, 'ordenes_desactivados'])->name('ordenes.ordenes_desactivados');
Route::patch('/json-data/update-status/{id}/{status}', [ProductionController::class, 'updateStatus'])->name('jsonData.updateStatus');

/*
|--------------------------------------------------------------------------
| Clientes
|--------------------------------------------------------------------------
|
*/
Route::get('/clientes/list', [ProductionController::class, 'clientes_listado'])->name('clientes.clientes_listado');
Route::get('/empleados/list', [ProductionController::class, 'empleados_listado'])->name('empleados.empleados_listado');




require __DIR__.'/auth.php';
