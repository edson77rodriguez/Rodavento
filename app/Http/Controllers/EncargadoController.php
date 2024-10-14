<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encargado;
use App\Models\Persona;
use App\Models\Area;

class EncargadoController extends Controller
{
     // Muestra la lista de encargados
     public function index()
     {
         $encargados = Encargado::with(['persona', 'area'])->get();
         $personas = Persona::all();
         $areas = Area::all();
 
         return view('encargados.index', compact('encargados', 'personas', 'areas'));
     }
 
     // Muestra el formulario para crear un nuevo encargado
     public function create()
     {
         $personas = Persona::all();
         $areas = Area::all();
         return view('encargados.create', compact('personas', 'areas'));
     }
 
     // Almacena un nuevo encargado
     public function store(Request $request)
     {
         $request->validate([
             'persona_id' => 'required|exists:personas,id',
             'area_id' => 'required|exists:areas,id',
         ]);
 
         Encargado::create($request->all());
 
         return redirect()->route('encargados.index')->with('register', 'Encargado creado exitosamente.');
     }
 
     // Muestra el formulario para editar un encargado
     public function edit($id)
     {
         $encargado = Encargado::findOrFail($id);
         $personas = Persona::all();
         $areas = Area::all();
 
         return view('encargados.edit', compact('encargado', 'personas', 'areas'));
     }
 
     // Actualiza un encargado existente
     public function update(Request $request, $id)
     {
         $request->validate([
             'persona_id' => 'required|exists:personas,id',
             'area_id' => 'required|exists:areas,id',
         ]);
 
         $encargado = Encargado::findOrFail($id);
         $encargado->update($request->all());
 
         return redirect()->route('encargados.index')->with('modify', 'Encargado actualizado exitosamente.');
     }
 
     // Elimina un encargado
     public function destroy($id)
     {
         $encargado = Encargado::findOrFail($id);
         $encargado->delete();
 
         return redirect()->route('encargados.index')->with('destroy', 'Encargado eliminado exitosamente.');
     }
}
