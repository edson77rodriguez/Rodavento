<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = Departamento::latest()->paginate(5);

        return view('departamentos.index', compact('departamentos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
            'departamento' => 'required',
            'costo' => 'required|numeric',
            'precio_sin_iva' => 'required|numeric',
            'iva' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'servicio' => 'required|numeric',
            'total' => 'required|numeric',
            'observaciones' => 'nullable|string',
        ]);

        Departamento::create($request->all());

        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamento $departamento)
    {
        return view('departamentos.show', compact('departamento'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit',compact('departamento'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'tipo' => 'required',
            'departamento' => 'required',
            'costo' => 'required|numeric',
            'precio_sin_iva' => 'required|numeric',
            'iva' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'servicio' => 'required|numeric',
            'total' => 'required|numeric',
            'observaciones' => 'nullable|string',
        ]);

        $departamento->update($request->all());

        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();

        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento eliminado exitosamente.');

    }
}
