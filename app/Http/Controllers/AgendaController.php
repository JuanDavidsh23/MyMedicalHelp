<?php

namespace App\Http\Controllers;
use App\Models\Contrato;
use App\Models\Ep;
use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paciente;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



/**
 * Class AgendaController
 * @package App\Http\Controllers
 */
class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda');
    
        $query = Agenda::query();
    
        if ($busqueda) {
            $query->where('id', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('id_pacientes', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('id_user', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('fecha_inicio', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('fecha_fin', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('hora', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('hora_fin', 'LIKE', '%' . $busqueda . '%');
        }
    
        $agendas = $query->latest('id')->paginate();
    
        return view('agenda.index', compact('agendas'))
            ->with('i', (request()->input('page', 1) - 1) * $agendas->perPage());
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agenda = new Agenda();
        $pacientes = Paciente::pluck('nombre','id');
        $user = User::where('IdRol', 2)->pluck('name', 'id');
        $contrato = Contrato::join('eps', 'contratos.idEps', '=', 'eps.id')
        ->pluck('eps.eps', 'contratos.id');
        $eps = Ep::pluck('eps','id');
        return view('agenda.create', compact('agenda','pacientes','user','contrato','eps'));
    }

    public function store(Request $request)
{
    $rules = [
        'fecha_inicio' => 'required',
        'fecha_fin' => 'required', 
        'hora' => 'required',
        'hora_fin' => 'required',
        'id_pacientes' => 'required',
        'id_user' => 'required',
    ];

    $messages = [
        'required' => 'El campo es obligatorio.',
    ];

    $validatedData = $request->validate($rules, $messages);

    // Verificar si el paciente ya tiene una agenda activa en el rango de fechas proporcionado
    $existingAgenda = Agenda::where('id_pacientes', $validatedData['id_pacientes'])
        ->where(function ($query) use ($validatedData) {
            $query->whereBetween('fecha_inicio', [$validatedData['fecha_inicio'], $validatedData['fecha_fin']])
                ->orWhereBetween('fecha_fin', [$validatedData['fecha_inicio'], $validatedData['fecha_fin']])
                ->orWhere(function ($query) use ($validatedData) {
                    $query->where('fecha_inicio', '<=', $validatedData['fecha_inicio'])
                        ->where('fecha_fin', '>=', $validatedData['fecha_fin']);
                });
        })
        ->first();

    if ($existingAgenda) {
        return redirect()->back()->withErrors('El paciente ya tiene una agenda activa en el rango de fechas proporcionado.');
    }

    $agenda = Agenda::create($validatedData);

    return redirect()->route('Agenda.index')
        ->with('success', 'Agenda creada correctamente.');
}


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda = Agenda::find($id);

        return view('agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda = Agenda::find($id);
        $pacientes = Paciente::pluck('nombre','id');
        $user = User::pluck('name','id');
        return view('agenda.edit', compact('agenda','pacientes','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Agenda $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $agenda = Agenda::findOrFail($id);

        $rules = [
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required', 
            'hora' => 'required',
            'hora_fin' => 'required',
            'id_pacientes' => 'required',
            'id_user' => 'required',
        ];

        $messages = [
            'required' => 'El campo es obligatorio.',
        ];

        $validatedData = $request->validate($rules, $messages);

    $agenda->update($validatedData);

    return redirect()->route('Agenda.index')
        ->with('success', 'Agenda Actualizada .');
}

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $agenda = Agenda::find($id)->delete();

        return redirect()->route('Agenda.index')
            ->with('success', 'Agenda eliminado con éxito');
    }
}