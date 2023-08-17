<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UserController;
use App\Http\Controllers\rolController;
use App\Http\Controllers\pacienteController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\Auth\LoginController;



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


//USUARIOS
/* Route::get('/',[UsuariosController::class,'index',])->name('usuarios.index');
Route::get('/usuario',[UsuariosController::class,'create']);
Route::post('/usuario',[UsuariosController::class,'store'])->name('usuarios.store');
Route::get('/usuario/delete/{id}',[UsuariosController::class,'delete'])->name('usuarios.delete');

//ROLES
Route::get('/roles',[rolController::class,'getroles',])->name('roles.index');
Route::get('/Regrol',[rolController::class,'create']);
Route::post('/Regrol',[rolController::class,'store'])->name('roles.store');
Route::get('/rol/delete/{id}',[rolController::class,'deleterol'])->name('roles.delete');

//PERMISOS
Route::get('/permisos',[PermisosController::class,'get_permisos',])->name('permisos.index');
Route::get('/Regpermiso',[PermisosController::class,'create']);
Route::post('/Regpermiso',[PermisosController::class,'store'])->name('permisos.store');
Route::get('/permisos/delete/{id}',[PermisosController::class,'delete'])->name('permisos.delete');

//PACIENTE
Route::get('/paciente',[pacienteController::class,'get_paciente',])->name('paciente.index');
Route::get('/Regpaciente',[pacienteController::class,'create']);
Route::post('/Regpaciente',[pacienteController::class,'store'])->name('paciente.store');
Route::get('/paciente/delete/{id}',[pacienteController::class,'delete'])->name('paciente.delete');
Auth::routes(); */



Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('login');
    });    
    Route::get('/inicio', function () {
        return view('inicio');
    });   
  
});
Route::resource('User', App\Http\Controllers\UserController::class);
Route::resource('Agenda', App\Http\Controllers\AgendaController::class);
Route::resource('Contrato', App\Http\Controllers\ContratoController::class);
Route::resource('Historia', App\Http\Controllers\HistoriaController::class);
Route::resource('Paciente', App\Http\Controllers\PacienteController::class);
Route::resource('Permiso', App\Http\Controllers\PermisoController::class);
Route::resource('Rol', App\Http\Controllers\RolController::class);
Route::resource('Ep', App\Http\Controllers\EpController::class);
Route::resource('rolespermisos', App\Http\Controllers\RolesPermisoController::class);
Route::put('/contrato/toggleEstado/{id}', 'App\Http\Controllers\ContratoController@toggleEstado')->name('Contrato.toggleEstado');

Route::post('/login', function () {
    $credentials = [
        'email' => request()->input('email'),
        'password' => request()->input('password')
    ];

    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        return redirect('inicio');
    }

    return redirect()->back()->withInput()->withErrors(['login' => __('Credenciales incorrectos.')]);
})->middleware('guest')->name('login');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
