<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pacientes;

class PacientesController extends Controller
{
    public function getPacientes(){
        return response()->json(Pacientes::all(),200);

    }

    public function getPacientesid($id){
        $pacientes = Pacientes::find($id);
        if(is_null($pacientes)){
            return response()->json(["message"=>"Registro no encontrado"],404);
        }
        return response()->json($pacientes,200);

    }

    public function insertPacientes(Request $request){
        $pacientes = Pacientes::create($request->all());
        if(is_null($pacientes)){
            return response()->json(["message"=>"Hubo problemas con el registro"],404);
        }
        return response()->json($pacientes,200);

    }

    public function updatePacientes(Request $request, $id){
        $pacientes = Pacientes :: find($id);
        if(is_null($pacientes)){
            return response()->json(["message"=>"Registro no encontrado"],404);
        }
        $pacientes -> update($request->all());
        return response()->json ($pacientes, 200);
    }

    public function deletePaciente($id){
        $pacientes = Pacientes :: find($id);
        if(is_null($pacientes)){
            return response()->json(["message"=>"Registro no encontrado"],404);
        }
        $pacientes->delete();
        return response()->json(["message"=>"Registro eliminado"],200);
    }
}
