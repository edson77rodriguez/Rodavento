<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Vendedor;
use App\Models\Cotizacion;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $cotizaciones = Cotizacion::with(['vendedor.persona', 'cliente.persona', 'empresa'])->get();
        return view('cotizaciones.index', compact('cotizaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $vendedores = Vendedor::all();
        $empresas = Empresa::all();

        return view('cotizaciones.create', compact('clientes', 'vendedores', 'empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'id_cliente' => 'required',
            'id_vendedor' => 'required',
            'num_personas' => 'required',
            'id_empresa' => 'required',
        ]);

        Cotizacion::create($request->all());
        return redirect()->route('cotizaciones.index')
            ->with('success', 'Cotización creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cotizacion $cotizacion)
    {
        return view('cotizaciones.show', compact('cotizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cotizacion $cotizacion)
    {
        $clientes = Cliente::all();
        $Vendedores= Vendedor::all();
        return view('cotizaciones.edit', compact('cotizacion', 'clientes', 'Vendedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        $request->validate([

            'id_cliente' => 'required',
            'id_vendedor' => 'required',
            'num_personas' => 'required',
            'id_empresa' => 'required',
        ]);

        $cotizacion->update($request->all());
        return redirect()->route('cotizaciones.index')
            ->with('success', 'Cotización actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cotizacion $cotizacion)
    {
        $cotizacion->delete();
        return redirect()->route('cotizaciones.index')
            ->with('success', 'Cotización eliminada correctamente.');
    }
}
