<?php

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\LoginAdminsController;
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
});

//Inicio de Sesión
Route::post('/iniciar/login', [LoginAdminsController::class, 'login'])->name('login');

//Mis plantillas
Route::view('/recursos/navbar', '/recursos/navbar');
Route::view('/recursos/footer', '/recursos/footer');