<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Models\Ep;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Agenda;
use Barryvdh\DomPDF\Facade\Pdf;





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

    public function pdf(){

        $contratos=Contrato::all();
        $pdf = Pdf::loadView('Contrato.pdf', compact('contratos'));
        return $pdf->stream();

    }

    public function obtenerDatos(Request $request)
    {
        $contratoId = $request->query('contratoId');
    
        // Obtén pacientes y usuarios relacionados con el contrato seleccionado
        $pacientes = Paciente::where('idContrato', $contratoId)->get(['id', 'nombre']);
        $usuarios = User::where('idContrato', $contratoId)->get(['id', 'name']);
    
        // Devuelve los datos en formato JSON
        return response()->json([
            'pacientes' => $pacientes,
            'usuarios' => $usuarios,
    
        ]);
        
    }
    public function toggleEstado($id, Request $request)
    {
        DB::beginTransaction();  // Comienza una transacción
    
        try {
            $contrato = Contrato::findOrFail($id);
    
            // Si el contrato está activo (0), desactívalo (1) y registra la razón de cancelación
            if ($contrato->estado == 0) {
                $contrato->estado = 1;
                $contrato->razon_cancelacion = $request->input('razon_cancelacion');
    
                // Desactivar usuarios, pacientes y agendas asociados
                User::where('idContrato', $id)->update(['estado' => 1]);  // Desactivar usuarios
                Paciente::where('idContrato', $id)->update(['estado' => 1]);  // Desactivar pacientes
                Agenda::where('idContrato', $id)->update(['estado' => 1]);  // Desactivar agendas
    
                $contrato->save();
                DB::commit();
    
                return redirect()->back()->with('success', 'Contrato marcado como inactivo y todos los elementos asociados han sido desactivados.');
    
            } else {
                // Si el contrato está inactivo (1), actívalo (0)
                $contrato->estado = 0;
                $contrato->razon_cancelacion = null;  // Puedes resetear la razón de cancelación si lo deseas
                $contrato->save();
                DB::commit();
    
                return redirect()->back()->with('success', 'Contrato marcado como activo.');
            }
    
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Ocurrió un error al intentar cambiar el estado del contrato.');
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

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'idContrato'); 
    }

    public function users()
    {
        return $this->hasMany(User::class, 'idContrato');
    }
    
}
