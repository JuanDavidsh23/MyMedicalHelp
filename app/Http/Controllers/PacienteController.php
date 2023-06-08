<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Ep;
/**
 * Class PacienteController
 * @package App\Http\Controllers
 */
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::paginate();

        return view('paciente.index', compact('pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * $pacientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paciente = new Paciente();
        $eps = Ep::pluck('descripcion','id');
        return view('paciente.create', compact('paciente','eps'));
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
            'nombre' => 'required|string|max:30|min:3',
            'apellido' => 'required|string|max:30|min:5',
            'correo' => 'required|email|unique:pacientes',
            'telefono' => 'required|integer|digits:10',
            'direccion' => 'required|string|max:50|min:5',
            'ciudad' => 'required|string',
            'documento' => 'required|string|digits_between:7,10',
            'idEps' => 'required|integer',
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
                'string' => 'El campo :attribute debe tener  menos de :max caracteres.',
            ],
            'integer' => 'El campo :attribute debe ser un número entero.',  
            'idEps.required' => 'El campo ID de rol es obligatorio.',
             
        ];
        
        $validatedData = $request->validate($rules, $messages);

  

        $paciente = Paciente::create($validatedData);

        return redirect()->route('Paciente.index')
            ->with('success', 'Paciente created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::find($id);

        return view('paciente.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        $eps = Ep::pluck('descripcion','id');

        return view('paciente.edit', compact('paciente','eps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Paciente $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nombre' => 'required|string|max:30|min:3',
            'apellido' => 'required|string|max:30|min:5',
            'correo' => 'required|email|unique:pacientes,correo,' . $id,
            'telefono' => 'required|integer|digits:10',
            'direccion' => 'required|string|max:50|min:5',
            'ciudad' => 'required|string',
            'documento' => 'required|string|digits_between:7,10',
            'idEps' => 'required|integer',
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
                'string' => 'El campo :attribute debe tener menos de :max caracteres.',
            ],
            'integer' => 'El campo :attribute debe ser un número entero.',
            'idEps.required' => 'El campo ID de rol es obligatorio.',
        ];
    
        $validatedData = $request->validate($rules, $messages);
    
        $paciente = Paciente::findOrFail($id);
        $paciente->update($validatedData);
    
        return redirect()->route('Paciente.index')
            ->with('success', 'Paciente updated successfully.');
    }
    

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id)->delete();

        return redirect()->route('Paciente.index')
            ->with('success', 'Paciente deleted successfully');
    }
}