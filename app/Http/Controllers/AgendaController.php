<?php

namespace App\Http\Controllers;

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
    
    if ($busqueda) {
        $agendas = Agenda::where('id', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('id_pacientes', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('id_user', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('fecha', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('hora', 'LIKE', '%' . $busqueda . '%')
            ->latest('id')
            ->paginate();
    } else {
        $agendas = Agenda::paginate();
    }

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
        return view('agenda.create', compact('agenda','pacientes','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
/*     public function store(Request $request)
    {
        $rules = [
            'fecha' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $startDateTime = Carbon::parse($value . ' ' . $request->hora);
                    $endDateTime = $startDateTime->copy()->addMinutes(40);
    
                    $existingAgenda = Agenda::where('id_user', $request->id_user)
                        ->where(function ($query) use ($startDateTime, $endDateTime) {
                            $query->where('fecha', $startDateTime->toDateString())
                                ->where(function ($query) use ($startDateTime, $endDateTime) {
                                    $query->where(function ($query) use ($startDateTime, $endDateTime) {
                                        $query->where('hora', '>=', $startDateTime->toTimeString())
                                            ->where('hora', '<=', $endDateTime->toTimeString());
                                    })
                                    ->orWhere(function ($query) use ($startDateTime, $endDateTime) {
                                        $query->where('hora', '<=', $startDateTime->toTimeString())
                                            ->where('hora', '>=', $endDateTime->toTimeString());
                                    });
                                });
                        })
                        ->first();
    
                    if ($existingAgenda) {
                        $fail('Ya existe una agenda dentro de un rango de 30 minutos para este usuario.');
                    }
                }
            ],
            'hora' => 'required',
            'lugar' => 'required',
            'id_pacientes' => 'required',
            'id_user' => 'required',
        ];
    
        $messages = [
            'required' => 'El campo es obligatorio.',
        ];
    
        $validatedData = $request->validate($rules, $messages);
    
        $agenda = Agenda::create($validatedData);
    
        return redirect()->route('Agenda.index')
            ->with('success', 'Agenda creada correctamente.');
    } */
    public function store(Request $request)
    {
        $rules = [
            'fecha' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $existingAgenda = Agenda::where('fecha', $value)
                        ->where('hora', $request->hora)
                        ->where('id_user', $request->id_user)
                        ->first();
    
                    if ($existingAgenda) {
                        $fail('Ya existe una agenda con la misma fecha y hora para esta enfermera.');
                    }
                }
            ],
            'hora' => 'required',
            'lugar' => 'required',
            'id_pacientes' => 'required',
            'id_user' => 'required',
        ];
    
        $messages = [
            'required' => 'El campo es obligatorio.',
        ];
    
        $validatedData = $request->validate($rules, $messages);
    
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
            'fecha' => 'required',
            'hora' => 'required',
            'lugar' => 'required',
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