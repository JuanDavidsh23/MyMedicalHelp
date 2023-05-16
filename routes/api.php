<?php
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\HistoriaController;
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


//HISTORIAS
Route::get('/Historia',[HistoriaController::class,'getHistorias']);
Route::get('/Historia/{id}',[HistoriaController::class,'getHistoriasid']);
//POST
Route::post('/Historia/insert',[HistoriaController::class,'insertHistoria']);
//PUT
Route::put('/Historia/update/{id}',[HistoriaController::class,'updateHistoria']);
//DELETE
Route::delete('/Historia/delete/{id}',[HistoriaController::class,'deleteHistoria']);


