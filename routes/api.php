<?php
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\rolController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//PACIENTES 
Route::get('/Pacientes',[PacientesController::class,'getPacientes']);
Route::get('/Pacientes/{id}',[PacientesController::class,'getPacientesid']);
//POST
Route::post('/Pacientes/insert',[PacientesController::class,'insertPacientes']);
//PUT 
Route::put('/Pacientes/update/{id}',[PacientesController::class,'updatePacientes']);
//DELETE
Route::delete('/Pacientes/delete/{id}',[PacientesController::class,'deletePaciente']);


//HISTORIA
Route::get('/Historia',[HistoriaController::class,'getHistorias']);
Route::get('/Historia/{id}',[HistoriaController::class,'getHistoriasid']);
//POST
Route::post('/Historia/insert',[HistoriaController::class,'insertHistoria']);
//PUT
Route::put('/Historia/update/{id}',[HistoriaController::class,'updateHistoria']);
//DELETE
Route::delete('/Historia/delete/{id}',[HistoriaController::class,'deleteHistoria']);

//PERMISOS
Route::get('/permiso',[PermisosController::class,'getPermisos']);
Route::get('/permiso/{id}',[PermisosController::class,'getPermisosid']);
//POST
Route::post('/permisos/insert',[PermisosController::class,'insertPermisos']);
//PUT
Route::put('/permisos/update/{id}',[PermisosController::class,'updatePermisos']);
//DELETE
Route::delete('/permisos/delete/{id}',[PermisosController::class,'deletePermisos']);


//ROL
Route::get('/rol',[rolController::class,'getRol']);
Route::get('/rol/{id}',[rolController::class,'getRolid']);
//POST
Route::post('/rol/insert',[rolController::class,'insertRol']);
//PUT
Route::put('/rol/update/{id}',[rolController::class,'updateRol']);
//DELETE
Route::delete('/rol/delete/{id}',[rolController::class,'deleteRol']);


//AGENDA
Route::get('/Agenda',[AgendaController::class,'getAgenda']);
Route::get('/Agenda/{id}',[AgendaController::class,'getAgendaid']);
//POST
Route::post('/Agenda/insert',[AgendaController::class,'insertAgenda']);
//PUT
Route::put('/Agenda/update/{id}',[AgendaController::class,'updateAgenda']);
//DELETE
Route::delete('/Agenda/delete/{id}',[AgendaController::class,'deleteAgenda']);


//USUARIOS
Route::get('/usuarios',[UsuariosController::class,'getUsuarios']);
//GET_ID
Route::get('/usuarios/{id}',[UsuariosController::class,'getUsuariosid']);
//POST
Route::post('/usuarios/insert',[UsuariosController::class,'insertUsuarios']);
//PUT
Route::put('/usuarios/update/{id}',[UsuariosController::class,'updateUsuarios']);
//DELETE
Route::delete('/usuarios/delete/{id}',[UsuariosController::class,'deleteUsuarios']);





