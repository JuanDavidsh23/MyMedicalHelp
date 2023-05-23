<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    public function getUsuarios(){
        return response()->json(Usuarios::all(),200);
    }

    public function getUsuariosid($id){
        $Usuarios = Usuarios::find($id);
        if(is_null($Usuarios)){
            return response()->json(["message"=>"Registro no encontrado"],400);
        }
        return response()->json($Usuarios,200);
    }

    public function insertUsuarios(Request $request){
        $Usuarios = Usuarios::create($request->all());
        if(is_null($Usuarios)){
            return response()->json(["message"=>"Hubo un error con el registro"]);

        }
        return response()->json($Usuarios,200);
    }
    public function updateUsuarios(Request $request, $id){
        $Usuarios = Usuarios::find($id);
        if(is_null($Usuarios)){
            return response()->json(["message"=>"El registro no se encontro"],400);
        }
        $Usuarios -> update($request->all());
        return response()->json($Usuarios,200);
    }
   
    public function deleteUsuarios($id){
        $Usuarios = Usuarios :: find($id);
        if(is_null($Usuarios)){
            return response()->json(["message"=>"Registro no encontrado"],404);
        }
        $Usuarios->delete();
        return response()->json(["message"=>"Registro eliminado"],200);
    }

}
