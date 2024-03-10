<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CestasController;
use App\Http\Controllers\CestasPersonalController;
use App\Http\Controllers\PedidosController;
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
    return view('welcome');
});

Route::get('/dashboard', 
    [CestasController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/crearcestacatalogo', [CestasController::class, 'crearcatalogo'])
    ->middleware(['auth', 'verified'])
    ->name('crearcestacatalogo');
Route::post('/guardarCestaCatalogo', [CestasController::class, 'guardarCestaCatalogo'])->name('guardarCestaCatalogo');
Route::delete('/borrarcestaadmin/{id}', [CestasController::class, 'borrarcestaadmin'])->name('borrarcestaadmin');
Route::get('/cestas/editar/{cestaId}', [CestasController::class, 'editar'])->name('cestas.editar');
Route::put('/cestas/{id}', [CestasController::class, 'actualizar'])->name('cestas.actualizar');


Route::get('/miscestas', 
    [CestasPersonalController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('miscestas');

Route::get('/crearcesta', [CestasPersonalController::class, 'crear'])
    ->middleware(['auth', 'verified'])
    ->name('crearcesta');

Route::get('/cestas_personal/editar/{cestaId}', [CestasPersonalController::class, 'editar'])->name('cestas_personal.editar');
Route::get('/guardarcestaeditada', [CestasPersonalController::class, 'guardaredicion'])
    ->middleware(['auth', 'verified'])
    ->name('guardaredicion');

Route::post('/guardarCesta', [CestasPersonalController::class, 'guardarCesta'])->name('guardarCesta');
Route::delete('/borrarcesta/{id}', [CestasPersonalController::class, 'borrarCesta'])->name('borrarcesta');
Route::put('/cestas_personal/{id}', [CestasPersonalController::class, 'actualizar'])->name('cestas_personal.actualizar');

Route::get('/mispedidos', 
    [PedidosController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('mispedidos');

Route::get('/pedidos/crear/{cestaId}', [PedidosController::class, 'create'])->name('pedidos.create');
Route::post('/pedidos', [PedidosController::class, 'crear'])->name('pedidos.crear');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
