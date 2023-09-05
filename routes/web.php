<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UserController;
use App\Http\Controllers\rolController;
use App\Http\Controllers\pacienteController;
use App\Http\Controllers\PermisosController;



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
    return view('Auth.login');
});    



Route::middleware(['auth'])->group(function () {

    Route::get('/inicio', 'App\Http\Controllers\InicioController@index')->name('inicio');
    Route::resource('User', App\Http\Controllers\UserController::class);
    Route::resource('Agenda', App\Http\Controllers\AgendaController::class);
    Route::resource('Contrato', App\Http\Controllers\ContratoController::class);
    Route::resource('Historia', App\Http\Controllers\HistoriaController::class);
    Route::resource('Paciente', App\Http\Controllers\PacienteController::class);
    Route::resource('Permiso', App\Http\Controllers\PermisoController::class);
    Route::resource('Rol', App\Http\Controllers\RolController::class);
    Route::resource('Ep', App\Http\Controllers\EpController::class);
    Route::resource('rolespermisos', App\Http\Controllers\RolesPermisoController::class);
});


Route::put('/contrato/toggleEstado/{id}', 'App\Http\Controllers\ContratoController@toggleEstado')->name('Contrato.toggleEstado');



Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
