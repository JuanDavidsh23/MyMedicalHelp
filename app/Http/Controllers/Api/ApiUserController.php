<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function createUser(Request $request)
    {
        // Obtener los datos del cuerpo de la solicitud JSON
        $data = $request->all();

        // Crear una nueva instancia de User con los datos
        $user = new User($data);

        // Guardar el usuario en la base de datos
        $user->save();

        // Devolver una respuesta JSON con el objeto creado
        return response()->json($user, 201);
    }

    public function getUsers(Request $request)
    {
        $users = User::all();

        return response()->json($users);
    }

    public function updateUser(Request $request, $id)
    {
        // Validar los datos recibidos (puedes agregar reglas de validación aquí si es necesario)
        $validatedData = $request->validate([
            // Define las reglas de validación aquí si es necesario
        ]);

        // Buscar el usuario por ID
        $user = User::findOrFail($id);

        // Actualizar los atributos del modelo con los datos validados
        $user->update($validatedData);

        // Devolver una respuesta JSON con el objeto actualizado
        return response()->json($user);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente']);
    }
}