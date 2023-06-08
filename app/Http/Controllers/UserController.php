<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('User.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $rol = Rol::pluck('nombre_rol','id');
        return view('User.create', compact('user','rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:30|min:3',
            'apellido' => 'required|string|max:30|min:5',
            'telefono' => 'required|integer|digits:10',
            'direccion' => 'required|string|max:50|min:5',
            'ciudad' => 'required|string',
            'departamemnto' => 'required|string',
            'cedula' => 'required|string|digits_between:7,10',
            'zona' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'IdRol' => 'required|integer',
        ];
    
        $messages = [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
            'unique' => 'El campo :attribute ya ha sido registrado.',
            'digits' => 'El campo :attribute debe tener :digits dígitos.',
            'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
            'min' => [
                'string' => 'El campo :attribute debe tener al menos :min caracteres.',
            ],
            'max' => [
                'string' => 'El campo :attribute debe tener al menos :max caracteres.',
            ],
            'integer' => 'El campo :attribute debe ser un número entero.',  
            'IdRol.required' => 'El campo ID de rol es obligatorio.',
             
        ];
    
     
    
        $validatedData = $request->validate($rules, $messages);
    
        $user = User::create($validatedData);
    
        return redirect()->route('User.index')
            ->with('success', 'Usuario creado exitosamente.');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('User.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $rol = Rol::pluck('nombre_rol','id');
        return view('user.edit', compact('user','rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $rules = [
        'name' => 'required|string|max:30|min:3',
        'apellido' => 'required|string|max:30|min:5',
        'telefono' => 'required|digits:9',
        'direccion' => 'required|string|max:50|min:5',
        'ciudad' => 'required|string',
        'departamemnto' => 'required|string',
        'cedula' => 'required|digits_between:7,10',
        'zona' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'required|string|min:8',
        'IdRol' => 'required|integer',
    ];

    $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'string' => 'El campo :attribute debe ser una cadena de texto.',
        'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
        'unique' => 'El campo :attribute ya ha sido registrado.',
        'digits' => 'El campo :attribute debe tener :digits dígitos.',
        'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
        'min' => [
            'string' => 'El campo :attribute debe tener al menos :min caracteres.',
        ],
        'max' => [
            'string' => 'El campo :attribute debe tener máximo :max caracteres.',
        ],
        'integer' => 'El campo :attribute debe ser un número entero.',
        'IdRol.required' => 'El campo ID de rol es obligatorio.',
    ];

    $validatedData = $request->validate($rules, $messages);

    $user = User::find($id);
    $user->update($validatedData);

    return redirect()->route('User.index')
        ->with('success', 'Usuario actualizado exitosamente.');
}

    

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('User.index')
            ->with('success', 'User deleted successfully');
    }
}
