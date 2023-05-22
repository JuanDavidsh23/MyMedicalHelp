<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rol;


class rolController extends Controller
{
    public function getRol(){
        return response()->json(Rol::all(),200);

    }

    public function getRolid($id){
        $Rol = Rol::find($id);
        if(is_null($Rol)){
            return response()->json(["message"=>"Rol no encontrado"],404);
        }
        return response()->json($Rol,200);

    }

    public function insertRol(Request $request){
        $Rol = Rol::create($request->all());
        if(is_null($Rol)){
            return response()->json(["message"=>"Hubo problemas con el Rol"],404);
        }
        return response()->json($Rol,200);

    }

    public function updateRol(Request $request, $id){
        $Rol = Rol :: find($id);
        if(is_null($Rol)){
            return response()->json(["message"=>"Rol no encontrado"],404);
        }
        $Rol -> update($request->all());
        return response()->json ($Rol, 200);
    }

    public function deleteRol($id){
        $Rol = Rol :: find($id);
        if(is_null($Rol)){
            return response()->json(["message"=>"Rol no encontrado"],404);
        }
        $Rol->delete();
        return response()->json(["message"=>"Rol eliminado"],200);
    }}
