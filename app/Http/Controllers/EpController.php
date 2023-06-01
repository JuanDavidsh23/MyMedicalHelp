<?php

namespace App\Http\Controllers;

use App\Models\Ep;
use Illuminate\Http\Request;

/**
 * Class EpController
 * @package App\Http\Controllers
 */
class EpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eps = Ep::paginate();

        return view('ep.index', compact('eps'))
            ->with('i', (request()->input('page', 1) - 1) * $eps->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ep = new Ep();
        return view('ep.create', compact('ep'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ep::$rules);

        $ep = Ep::create($request->all());

        return redirect()->route('Ep.index')
            ->with('success', 'Ep created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ep = Ep::find($id);

        return view('ep.show', compact('ep'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ep = Ep::find($id);

        return view('ep.edit', compact('ep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ep $ep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ep $ep)
    {
        $request->validate(Ep::$rules);
    
        $ep->update($request->all());
    
        return redirect()->route('Ep.index')
            ->with('success', 'Ep updated successfully.');
    }
    

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ep = Ep::find($id)->delete();

        return redirect()->route('Ep.index')
            ->with('success', 'Ep deleted successfully');
    }
}
