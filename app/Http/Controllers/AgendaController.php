<?php

namespace App\Http\Controllers;
use App\Models\Agenda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public  function getAgenda(){
        return response()->json(Agenda::all(),200);
    }

    public function getAgendaid($id){
        $agenda = Agenda::find($id);
        if(is_null($agenda)){
            return response()->json(["message"=>"Registro no encontrado"],400);
        }

        return response ()->json($agenda,200);
    }

    public function insertAgenda(Request $request){
        $agenda = Agenda::create($request->all());
        if(is_null($agenda)){
            return response()->json(["message"=>"Hubo un problema con el registro"],400);
        }
        return response()->json($agenda,200);
    }
    public function updateAgenda(Request $request, $id){
        $agenda = Agenda::find($id);
        if(is_null($agenda)){
            return response()->json(["message"=>"Hubo un problema con el registro"],400);
            
        }
        $agenda -> update($request->all());
        return response()->json($agenda,200);
    }

    public function deleteAgenda($id){
        $agenda = Agenda :: find($id);
        if(is_null($agenda)){
            return response()->json(["message"=>"Registro no encontrado"],404);
        }
        $agenda->delete();
        return response()->json(["message"=>"Registro eliminado"],200);
    }
}
