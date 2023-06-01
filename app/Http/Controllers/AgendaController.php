<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paciente;



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
    public function index()
    {
        $agendas = Agenda::paginate();

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
        $user = User::pluck('name','id');
        return view('agenda.create', compact('agenda','pacientes','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Agenda::$rules);

        $agenda = Agenda::create($request->all());

        return redirect()->route('Agenda.index')
            ->with('success', 'Agenda created successfully.');
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

    $request->validate([
        // Aquí van las reglas de validación para los campos del formulario
    ]);

    $agenda->update($request->all());

    return redirect()->route('Agenda.index')
        ->with('success', 'Agenda updated successfully.');
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
            ->with('success', 'Agenda deleted successfully');
    }
}
