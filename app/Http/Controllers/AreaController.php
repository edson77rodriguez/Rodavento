<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area; 
class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        return view('areas.create'); // Asegúrate de crear la vista para crear áreas
    }

    public function store(Request $request)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'desc_area' => 'required|unique:areas,desc_area|max:255',
        ]);

        Area::create($validatedData);

        return redirect()->route('areas.index')->with('register', 'Área creada exitosamente.');
    }

    public function show(string $id)
    {
        $area = Area::findOrFail($id);
        return view('areas.show', compact('area')); // Asegúrate de crear la vista para mostrar un área
    }

    public function edit(string $id)
    {
        $area = Area::findOrFail($id);
        return view('areas.edit', compact('area')); // Asegúrate de crear la vista para editar áreas
    }

    public function update(Request $request, string $id)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'desc_area' => 'required|unique:areas,desc_area,' . $id . '|max:255',
        ]);

        $area = Area::findOrFail($id);
        $area->update($validatedData);

        return redirect()->route('areas.index')->with('modify', 'Área actualizada exitosamente.');
    }

    public function destroy(string $id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return redirect()->route('areas.index')->with('destroy', 'Área eliminada exitosamente.');
    }
}
