<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_h;
use App\Models\Habilidad;

class HabilidadController extends Controller
{
    public function index()
    {
        $habilidades = Habilidad::with(['tipo_h'])->get();
        $tipo_hs = Tipo_h::all();
        return view('habilidades.index', compact('habilidades', 'tipo_hs'));
    }

    public function create()
    {
        $tipo_hs = Tipo_h::all();
        return view('habilidades.create', compact('tipo_hs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_h_id' => 'required|exists:tipo_hs,id',
            'desc_h' => 'required|string|max:255',
        ]);

        Habilidad::create($validatedData);

        return redirect()->route('habilidades.index')->with('register', 'Habilidad registrada con éxito.');
    }

    public function edit(string $id)
    {
        $habilidad = Habilidad::findOrFail($id);
        $tipo_hs = Tipo_h::all();
        return view('habilidades.edit', compact('habilidad', 'tipo_hs'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'tipo_h_id' => 'required|exists:tipo_hs,id',
            'desc_h' => 'required|string|max:255',
        ]);

        $habilidad = Habilidad::findOrFail($id);
        $habilidad->update($validatedData);

        return redirect()->route('habilidades.index')->with('modify', 'Habilidad actualizada con éxito.');
    }

    public function destroy(string $id)
    {
        $habilidad = Habilidad::findOrFail($id);
        $habilidad->delete();

        return redirect()->route('habilidades.index')->with('destroy', 'Habilidad eliminada con éxito.');
    }
}