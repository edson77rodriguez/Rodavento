<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\guia;


class GuiaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        $guias = guia::all();
        return view('guias.index', compact('guias','personas'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'persona_id' => 'required|exists:persona,id',
        ]);

        guia::create($validatedData);

        return redirect()->route('guias.index')->with('register', ' ');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'persona_id' => 'required|exists:persona,id',
        ]);

        $guia = guia::findOrFail($id);
        $guia->update($validatedData);

        return redirect()->route('guias.index')->with('modify', 'Guia actualizado exitosamente.');
    }
    public function destroy(string $id)
    {
        $guia = guia::findOrFail($id);
        $guia->delete();

        return redirect()->route('guias.index')->with('destroy', ' ');
    }
}
