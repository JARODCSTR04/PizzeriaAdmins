<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\LoginAdminsController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductosController;
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

//Rutas protegidas
Route::middleware(['auth.custom'])->group(function () {
    Route::get('/productos/index',[ProductosController::class, 'index'])->name('producto');
    Route::resource('productos', ProductosController::class);
    Route::get('/empleados/index',[EmpleadosController::class, 'index'])->name('empleado');
    Route::resource('empleados', EmpleadosController::class);
    Route::get('/categorias/index',[CategoriasController::class, 'index'])->name('categoria');
    Route::resource('categorias', CategoriasController::class);
    Route::get('/materias/index',[MateriasController::class, 'index'])->name('materia');
    Route::resource('materias', MateriasController::class);
    Route::get('/pedidos/index',[PedidosController::class, 'index'])->name('pedido');
    Route::resource('pedidos', PedidosController::class);
});

//Inicio de Sesión
Route::post('/iniciar/login', [LoginAdminsController::class, 'login'])->name('login');
Route::post('logout', [LoginAdminsController::class, 'logout'])->name('logout');

//Mis plantillas
Route::view('/recursos/navbar', '/recursos/navbar');
Route::view('/recursos/footer', '/recursos/footer');