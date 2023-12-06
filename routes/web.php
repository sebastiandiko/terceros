<?php

use App\Http\Controllers\TipoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', [TipoController::class, 'type'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboardGerente', [TipoController::class, 'type'])->middleware(['auth', 'verified'])->name('dashboardGerente');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [TipoController::class, 'type'])->name('home');

Route::get('dashboard/presupuesto', [ProductController::class, 'obtenerProductos'])->name('presupuesto');

Route::get('dashboard/edit/{id}', [ProductController::class, 'showEdit'])->name('cotizacion');

Route::post('/edit', [ProductController::class, 'update']);

Route::get('dashboard/historial', [ProductController::class, 'obtenerHistorial'])->name('historial');

Route::get('dashboard/presupuestoGerente', [ProductController::class, 'obtenerProductosGerente'])->name('presupuestoGerente');

Route::get('/productos/{idLaboratorio}', [ProductController::class, 'getProductosPorLaboratorio'])->name('productos.laboratorio');

Route::put('/productos/aprobar/{id}', [ProductController::class, 'aprobar'])->name('productos.aprobar');

Route::put('/productos/desaprobar/{id}', [ProductController::class, 'desaprobar'])->name('productos.desaprobar');
