<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    // Display a listing of the persona
    public function index()
    {
        $personas = Persona::all();
        return view('persona.index', compact('personas'));
    }

    // Show the form for creating a new persona (if applicable)
    public function create()
    {
        return view('persona.create');
    }

    // Store a newly created persona in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'ap' => 'required',
            'am' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        Persona::create($validatedData);

        return redirect()->route('persona.index')->with('register', ' ');
    }

    // Display the specified persona (if needed)
    public function show(string $id)
    {
        $persona = Persona::findOrFail($id);
        return view('persona.show', compact('persona'));
    }

    // Show the form for editing the specified persona
    public function edit(string $id)
    {
        $persona = Persona::findOrFail($id);
        return view('persona.edit', compact('persona'));
    }

    // Update the specified persona in storage
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'ap' => 'required',
            'am' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        $persona = Persona::findOrFail($id);
        $persona->update($validatedData);

        return redirect()->route('persona.index')->with('modify', ' ');
    }

    // Remove the specified persona from storage
    public function destroy(string $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();

        return redirect()->route('persona.index')->with('destroy', ' ');
    }
}
