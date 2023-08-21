<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Models\Ep;

/**
 * Class ContratoController
 * @package App\Http\Controllers
 */
class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::paginate();

        return view('contrato.index', compact('contratos'))
            ->with('i', (request()->input('page', 1) - 1) * $contratos->perPage());
    }
    public function toggleEstado($id, Request $request)
    {
        $contrato = Contrato::findOrFail($id);
        
        if ($contrato->estado == 0) {
            $contrato->estado = 1;
            $contrato->razon_cancelacion = $request->input('razon_cancelacion');
            $contrato->save();
            
            return redirect()->back()->with('success', 'Contrato marcado como inactivo.');
        } else {
        }
    }
    
    
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contrato = new Contrato();
        $eps = Ep::pluck('eps','id');
        return view('contrato.create', compact('contrato','eps'));
    }

    /**c
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    request()->validate(Contrato::$rules);

    $data = $request->all();
    $data['estado'] = 0; 

    $contrato = Contrato::create($data);

    return redirect()->route('Contrato.index')
        ->with('success', 'Contrato creado correctamente.');
}


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contrato::find($id);

        return view('contrato.show', compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrato = Contrato::find($id);
        $eps = Ep::pluck('eps','id');

        return view('contrato.edit', compact('contrato','eps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contrato $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    request()->validate(Contrato::$rules);

    $contrato = Contrato::findOrFail($id);
    $contrato->update($request->all());

    return redirect()->route('Contrato.index')
        ->with('success', 'Contrato actualizado correctamente');
}


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id)->delete();

        return redirect()->route('Contrato.index')
            ->with('success', 'Contrato eliminado correctamente');
    }
}
