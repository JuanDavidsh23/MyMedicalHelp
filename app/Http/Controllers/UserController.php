<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;


class UserController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/User';

    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $users = User::where('cedula', $busqueda)
            ->orWhere('created_at', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('name', 'LIKE', '%' . $busqueda . '%')
            ->latest('id')
            ->paginate();

        $data = [
            'users' => $users,
        ];

        return view('User.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    public function create()
    {
        $user = new User();
        $rol = Rol::pluck('id', 'nombre_rol');
        return view('User.create', compact('user', 'rol'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:30', 'min:3', 'regex:/^[A-Za-z]+$/'],
            'apellido' => ['required', 'string', 'max:30', 'min:5', 'regex:/^[A-Za-z]+$/'],
            'telefono' => ['required', 'integer', 'digits:10'],
            'direccion' => ['required', 'string', 'max:50', 'min:5'],
            'ciudad' => ['required', 'string', 'regex:/^[A-Za-z]+$/'],
            'departamemnto' => ['required', 'string', 'regex:/^[A-Za-z]+$/'],
            'cedula' => ['required', 'string', 'digits_between:7,10'],
            'zona' => ['required', 'string', 'regex:/^[A-Za-z]+$/'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'IdRol' => ['required', 'integer'],
        ]);
    }

    protected function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'apellido' => $data['apellido'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'ciudad' => $data['ciudad'],
            'departamemnto' => $data['departamemnto'],
            'cedula' => $data['cedula'],
            'zona' => $data['zona'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'IdRol' => $data['IdRol'],
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:30', 'min:3', 'regex:/^[A-Za-z]+$/'],
            'apellido' => ['required', 'string', 'max:30', 'min:5', 'regex:/^[A-Za-z]+$/'],
            'telefono' => ['required', 'integer', 'digits:10'],
            'direccion' => ['required', 'string', 'max:50', 'min:5'],
            'ciudad' => ['required', 'string', 'regex:/^[A-Za-z]+$/'],
            'departamemnto' => ['required', 'string', 'regex:/^[A-Za-z]+$/'],
            'cedula' => ['required', 'string', 'digits_between:7,10'],
            'zona' => ['required', 'string', 'regex:/^[A-Za-z]+$/'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'IdRol' => ['required', 'integer'],
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
            'regex' => 'El campo :attribute solo puede contener letras.',
            'IdRol.required' => 'El campo ID de rol es obligatorio.',
        ];

        $validatedData = $request->validate($rules, $messages);

        $user = User::create($validatedData);

        return redirect()->route('User.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('User.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $rol = Rol::pluck('nombre_rol', 'id');
        return view('user.edit', compact('user', 'rol'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => ['required', 'string', 'max:30', 'min:3', 'regex:/^[A-Za-z]+$/'],
            'apellido' => ['required', 'string', 'max:30', 'min:5', 'regex:/^[A-Za-z]+$/'],
            'telefono' => ['required', 'digits:9'],
            'direccion' => ['required', 'string', 'max:50', 'min:5'],
            'ciudad' => ['required', 'string', 'regex:/^[A-Za-z]+$/'],
            'departamemnto' => ['required', 'string', 'regex:/^[A-Za-z]+$/'],
            'cedula' => ['required', 'digits_between:7,10'],
            'zona' => ['required', 'string', 'regex:/^[A-Za-z]+$/'],
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'password' => ['nullable', 'string', 'min:8'],
            'IdRol' => ['required', 'integer'],
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
            'regex' => 'El campo :attribute solo puede contener letras.',
            'IdRol.required' => 'El campo ID de rol es obligatorio.',
        ];

        $validatedData = $request->validate($rules, $messages);

        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->apellido = $validatedData['apellido'];
        $user->telefono = $validatedData['telefono'];
        $user->direccion = $validatedData['direccion'];
        $user->ciudad = $validatedData['ciudad'];
        $user->departamemnto = $validatedData['departamemnto'];
        $user->cedula = $validatedData['cedula'];
        $user->zona = $validatedData['zona'];
        $user->email = $validatedData['email'];
        $user->IdRol = $validatedData['IdRol'];

        // Verificar si se proporcionó una nueva contraseña
        if (!empty($validatedData['password'])) {
            // Encriptar la nueva contraseña
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->route('User.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('User.index')
            ->with('success', 'User deleted successfully');
    }
}
