<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\HospedajeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\VendedorController;

Route::get('/agendas/create', [AgendaController::class, 'create'])->name('agendas.create');
Route::put('/agendas/{agenda}', [AgendaController::class, 'update'])->name('agendas.update');
Route::get('/agendas/{agenda}/edit', [AgendaController::class, 'edit'])->name('agendas.edit');
Route::get('/agendas/{agenda}', [AgendaController::class, 'show'])->name('agendas.show');
Route::delete('/agendas/{agenda}', [AgendaController::class, 'destroy'])->name('agendas.destroy');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/agenda', [AgendaController::class, 'index']);
Route::get('/agendas/create', [AgendaController::class, 'create'])->name('agendas.create');
Route::get('/agendas', [AgendaController::class, 'index'])->name('agendas.index');
Route::post('/agendas', [AgendaController::class, 'store'])->name('agendas.store');
Route::resource('clientes', ClienteController::class);
Route::resource('vendedores', VendedorController::class);
Route::get('vendedores/{vendedor}', 'VendedorController@show')->name('vendedores.show');
Route::delete('/vendedores/{vendedor}', 'VendedorController@destroy')->name('vendedores.destroy');
Route::resource('clientes', ClienteController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('hospedajes', HospedajeController::class);
Route::resource('actividades', DepartamentoController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('departamentos', 'DepartamentoController');
Route::resource('departamentos', 'App\Http\Controllers\DepartamentoController');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas para el controlador PersonaController
Route::resource('persona', PersonaController::class);
