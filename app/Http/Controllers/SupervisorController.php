<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supervisor;
use App\Models\Persona;
use App\Models\Area;

class SupervisorController extends Controller
{

      public function index()
      {
          $supervisores = Supervisor::with(['persona', 'area'])->get();
          $personas = Persona::all();
          $areas = Area::all();

          return view('supervisores.index', compact('supervisores', 'personas', 'areas'));
      }


      public function create()
      {
          $personas = Persona::all();
          $areas = Area::all();
          return view('supervisores.create', compact('supervisores', 'areas'));
      }


      public function store(Request $request)
      {
          $request->validate([
              'persona_id' => 'required|exists:persona,id',
              'area_id' => 'required|exists:areas,id',
          ]);

          Supervisor::create($request->all());

          return redirect()->route('supervisores.index')->with('register', 'Supervisor creado exitosamente.');
      }


      public function edit($id)
      {
          $supervisor = Supervisor::findOrFail($id);
          $personas = Persona::all();
          $areas = Area::all();

          return view('supervisores.edit', compact('supervisor', 'personas', 'areas'));
      }


      public function update(Request $request, $id)
      {
          $request->validate([
              'persona_id' => 'required|exists:persona,id',
              'area_id' => 'required|exists:areas,id',
          ]);

          $supervisor = Supervisor::findOrFail($id);
          $supervisor->update($request->all());

          return redirect()->route('supervisores.index')->with('modify', 'Supervisores actualizado exitosamente.');
      }


      public function destroy($id)
      {
          $supervisor = Supervisor::findOrFail($id);
          $supervisor->delete();

          return redirect()->route('supervisores.index')->with('destroy', 'Supervisores eliminado exitosamente.');
      }
}
