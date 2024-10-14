<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;


class PersonaController extends Controller
{
    public function index()
    {
        $personas =Persona::all();
        return view('personas.index', compact('personas'));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'ap' => 'required',
            'am' => 'required',
            'direccion'=>'required',
            'telefono' => 'required',
        ]);
    
        Persona::create($validatedData);
    
        return redirect()->route('personas.index')->with('register',' ');
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
       
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'ap' => 'required',
            'am' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);
        $persona = Persona::find($id);
        $persona->update($request->all());

        return redirect()->route('personas.index')->with('modify',' ');
    }
    public function destroy(string $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();

        return redirect()->route('personas.index')->with('destroy',' ');
    }
}
