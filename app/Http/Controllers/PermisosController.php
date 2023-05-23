<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permisos;

class PermisosController extends Controller
{
    public function getPermisos(){
        return response()->json(Permisos::all(),200);

    }

    public function getPermisosid($id){
        $Permisos = Permisos::find($id);
        if(is_null($Permisos)){
            return response()->json(["message"=>"Registro no encontrado"],404);
        }
        return response()->json($Permisos,200);

    }

    public function insertPermisos(Request $request){
        $Permisos = Permisos::create($request->all());
        if(is_null($Permisos)){
            return response()->json(["message"=>"Hubo problemas con el registro"],404);
        }
        return response()->json($Permisos,200);

    }

    public function updatePermisos(Request $request, $id){
        $Permisos = Permisos :: find($id);
        if(is_null($Permisos)){
            return response()->json(["message"=>"Registro no encontrado"],404);
        }
        $Permisos -> update($request->all());
        return response()->json ($Permisos, 200);
    }

    public function deletePermisos($id){
        $Permisos = Permisos :: find($id);
        if(is_null($Permisos)){
            return response()->json(["message"=>"Registro no encontrado"],404);
        }
        $Permisos->delete();
        return response()->json(["message"=>"Registro eliminado"],200);
    }
}
