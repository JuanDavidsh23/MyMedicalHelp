<?php

namespace App\Http\Controllers;

use App\Models\Historia;
use Illuminate\Http\Request;
use App\Models\Paciente;


/**
 * Class HistoriaController
 * @package App\Http\Controllers
 */
class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historias = Historia::paginate();

        return view('historia.index', compact('historias'))
            ->with('i', (request()->input('page', 1) - 1) * $historias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $historia = new Historia();
        $pacientes = Paciente::pluck('nombre','id');

        return view('historia.create', compact('historia','pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Historia::$rules);

        $historia = Historia::create($request->all());

        return redirect()->route('Historia.index')
            ->with('success', 'Historia creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historia = Historia::find($id);

        return view('historia.show', compact('historia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historia = Historia::find($id);
        $pacientes = Paciente::pluck('nombre','id');
        return view('historia.edit', compact('historia','pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Historia $historia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Historia::$rules);
    
        $historia = Historia::findOrFail($id);
        $historia->update($request->all());
    
        return redirect()->route('Historia.index')
            ->with('success', 'Historia creada correctamente.');
    }
    
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $historia = Historia::find($id)->delete();

        return redirect()->route('Historia.index')
            ->with('success', 'Historia eliminada correctamente');
    }


    
}
