<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriaGastoController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\CargoController;
// Rutas públicas
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==================== RUTAS PROTEGIDAS ====================
Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // CRUD categorias gastos
    Route::resource('categorias-gastos', CategoriaGastoController::class)
        ->parameters([
            'categorias-gastos' => 'categoria'
        ]);

    // CRUD trabajadores
    Route::resource('trabajadores', TrabajadorController::class)
        ->parameters([
            'trabajadores' => 'trabajador'
        ]);
    // ==================== NUEVO: CRUD CARGOS ====================
    Route::resource('cargos', CargoController::class);
});