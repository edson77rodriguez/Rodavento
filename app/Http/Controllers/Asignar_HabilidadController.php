<?php

namespace App\Http\Controllers;

use App\Models\asignar_habilidade;
use App\Models\Guia;
use App\Models\Habilidad;
use Illuminate\Http\Request;

class Asignar_HabilidadController extends Controller
{
    /**
     * Muestra una lista de todas las asignaciones de habilidades.
     */
    public function index()
    {
        $asignaciones = asignar_habilidade::with(['guia', 'habilidad'])->get();
        $guias = Guia::all();
        $habilidades = Habilidad::all();
        return view('asignar_habilidades.index', compact('asignaciones','guias','habilidades'));
    }

 
    public function create()
    {
        $guias = Guia::all();
        $habilidades = Habilidad::all();
        return view('asignar_habilidades.create', compact('guias', 'habilidades'));
    }

    /**
     * Almacena una nueva asignación de habilidad en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'guia_id' => 'required|exists:guias,id',
            'habilidads_id' => 'required|exists:habilidads,id',
            'fecha_emision' => 'required|date',
            'fecha_vencimiento' => 'required|date|after_or_equal:fecha_emision',
        ]);

        asignar_habilidade::create($request->all());

        return redirect()->route('asignar_habilidades.index')->with('success', 'Habilidad asignada exitosamente.');
    }

    /**
     * Muestra los detalles de una asignación de habilidad específica.
     */
    public function show($id)
    {
        $asignacion = asignar_habilidade::with(['guia', 'habilidad'])->findOrFail($id);
        return view('asignar_habilidades.show', compact('asignacion'));
    }

    /**
     * Muestra el formulario para editar una asignación de habilidad.
     */
    public function edit($id)
    {
        $asignacion = asignar_habilidade::findOrFail($id);
        $guias = Guia::all();
        $habilidades = Habilidad::all();
        return view('asignar_habilidades.edit', compact('asignacion', 'guias', 'habilidades'));
    }

    /**
     * Actualiza una asignación de habilidad existente en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'guia_id' => 'required|exists:guias,id',
            'habilidads_id' => 'required|exists:habilidades,id',
            'fecha_emision' => 'required|date',
            'fecha_vencimiento' => 'required|date|after_or_equal:fecha_emision',
        ]);

        $asignacion = asignar_habilidade::findOrFail($id);
        $asignacion->update($request->all());

        return redirect()->route('asignar_habilidades.index')->with('success', 'Asignación de habilidad actualizada exitosamente.');
    }

    /**
     * Elimina una asignación de habilidad de la base de datos.
     */
    public function destroy($id)
    {
        $asignacion = asignar_habilidade::findOrFail($id);
        $asignacion->delete();

        return redirect()->route('asignar_habilidades.index')->with('success', 'Asignación de habilidad eliminada exitosamente.');
    }
}
