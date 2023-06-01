<?php

namespace App\Http\Controllers;

use App\Models\RolesPermiso;
use Illuminate\Http\Request;

/**
 * Class RolesPermisoController
 * @package App\Http\Controllers
 */
class RolesPermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolesPermisos = RolesPermiso::paginate();

        return view('roles-permiso.index', compact('rolesPermisos'))
            ->with('i', (request()->input('page', 1) - 1) * $rolesPermisos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolesPermiso = new RolesPermiso();
        return view('roles-permiso.create', compact('rolesPermiso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RolesPermiso::$rules);

        $rolesPermiso = RolesPermiso::create($request->all());

        return redirect()->route('roles-permisos.index')
            ->with('success', 'RolesPermiso created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rolesPermiso = RolesPermiso::find($id);

        return view('roles-permiso.show', compact('rolesPermiso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rolesPermiso = RolesPermiso::find($id);

        return view('roles-permiso.edit', compact('rolesPermiso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RolesPermiso $rolesPermiso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RolesPermiso $rolesPermiso)
    {
        request()->validate(RolesPermiso::$rules);

        $rolesPermiso->update($request->all());

        return redirect()->route('roles-permisos.index')
            ->with('success', 'RolesPermiso updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rolesPermiso = RolesPermiso::find($id)->delete();

        return redirect()->route('roles-permisos.index')
            ->with('success', 'RolesPermiso deleted successfully');
    }
}
