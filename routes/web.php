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
Route::get('/detalles/categoria', [LandingController::class, 'details_category'])->name('details.category');
Route::get('/listado/bebidas', [LandingController::class, 'details_bebidas'])->name('listado.bebidas');
Route::get('/listado/cocteles', [LandingController::class, 'details_cocteles'])->name('listado.cocteles');

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

Route::get('/dashboardCliente', [DashboardController::class, 'dashboard_administrador'])->name('dashboardCliente');

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
| Categorias
|--------------------------------------------------------------------------
|
*/
Route::get('/products/list', [ProductionController::class, 'products_index'])->name('products.index');
Route::post('/products/store', [ProductionController::class, 'products_store'])->name('products.store');

require __DIR__.'/auth.php';
