<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\HospedajeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuiaController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\Tipo_hController;
use App\Http\Controllers\HabilidadController;
use App\Http\Controllers\Asignar_HabilidadController;


use Illuminate\Support\Facades\Auth;



Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login'); // Redirige a la página de inicio de sesión
})->name('logout');



Route::resource('persona', PersonaController::class);
Route::resource('cotizaciones', CotizacionController::class);
Route::get('/cotizaciones/create', [CotizacionController::class, 'create'])->name('cotizaciones.create');

// Rutas para empresas
Route::resource('empresas', EmpresaController::class);

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
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('persona', PersonaController::class);
Route::resource('guias', GuiaController::class);
Route::resource('areas', AreaController::class);
Route::resource('encargados', EncargadoController::class);
Route::resource('supervisores', SupervisorController::class);
Route::resource('tipo_hs', Tipo_hController::class);
Route::resource('habilidades', HabilidadController::class);
Route::resource('asignar_habilidades', Asignar_HabilidadController::class);





// routes/web.php
Route::get('/auth/passwords/loging', function () {
    return view('auth.passwords.login'); // Asegúrate de usar 'login' en singular aquí
})->name('auth.passwords.loging');




