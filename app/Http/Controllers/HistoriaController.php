<?php

namespace App\Http\Controllers;
use App\Models\Historia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    public function getHistorias(){
        return response()->json(Historia::all(),200);
    }

    public function getHistoriasid($id){
        $historia = Historia::find($id);
        if(is_null($historia)){
            return response()->json(["message"=>"Registro no encontrado"],400);
        }
        return response()->json($historia,200);
    }

    public function insertHistoria(Request $request){
        $historia = Historia::create($request->all());
        if(is_null($historia)){
            return response()->json(["message"=>"Hubo un error con el registro"]);

        }
        return response()->json($historia,200);
    }
    public function updateHistoria(Request $request, $id){
        $historia = Historia::find($id);
        if(is_null($historia)){
            return response()->json(["message"=>"El registro no se encontro"],400);
        }
        $historia -> update($request->all());
        return response()->json($historia,200);
    }
    public function deleteHistoria($id){
        $historia = Historia::find($id);
        if(is_null($historia)){
               return response()->json($historia,200); 
        }

        $historia -> delete();
        return response()->json(["message"=>"Registro eliminado"],200);

    }

}
