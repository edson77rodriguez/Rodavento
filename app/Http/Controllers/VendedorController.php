<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class VendedorController extends Controller
{
    /**
     * Muestra una lista de vendedores.
     */
    public function index(): View
    {
        $vendedores = Vendedor::latest()->paginate(5);
        return view('vendedores.index', compact('vendedores'));
    }

    /**
     * Muestra el formulario para crear un nuevo vendedor.
     */
    public function create()
    {
        $personas = Persona::all();

        return view('vendedores.create', compact('personas'));
    }

    /**
     * Almacena un nuevo vendedor en la base de datos.
     */


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_pers' => 'required|exists:persona,id_pers', // Validación de la existencia de la persona
            // Aquí puedes agregar otras reglas de validación según tus necesidades
        ]);

        Vendedor::create([
            'id_pers' => $request->id_pers,
            // Aquí puedes agregar otros campos que quieras asignar al crear un nuevo vendedor
        ]);

        return redirect()->route('vendedores.index')->with('success', 'Vendedor creado exitosamente.');
    }


    /**
     * Muestra los detalles de un vendedor específico.
     */
    public function show(Vendedor $vendedor): View
    {
        return view('vendedores.show', compact('vendedor'));

    }

    /**
     * Muestra el formulario para editar un vendedor existente.
     */
    public function edit(Vendedor $vendedor): View
    {
        return view('vendedores.edit', compact('vendedor'));
    }

    /**
     * Actualiza un vendedor existente en la base de datos.
     */
    public function update(Request $request, Vendedor $vendedor): RedirectResponse
    {
        $request->validate([
            // Aquí coloca las reglas de validación para actualizar el vendedor
        ]);

        $vendedor->update($request->all());

        return redirect()->route('vendedores.index')
            ->with('success', 'Vendedor actualizado exitosamente.');
    }

    /**
     * Elimina un vendedor de la base de datos.
     */
    public function destroy(Vendedor $vendedor)
    {
        $vendedor->delete();
        return redirect()->route('vendedores.index')->with('success', 'Vendedor eliminado exitosamente.');
    }
}
