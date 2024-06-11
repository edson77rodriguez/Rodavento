<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $personas = Persona::latest()->paginate(5);

        return view('persona.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('persona.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => 'required',
            'ap' => 'required',
            'am' => 'required',
            'num_tel' => 'required',
            'rfc' => 'required',
            'corre_elect' => 'required|email',
        ]);

        Persona::create($request->all());

        return redirect()->route('persona.index')
            ->with('success', 'Persona creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona): View
    {
        return view('persona.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona): View
    {
        return view('persona.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona): RedirectResponse
    {$request->validate([
        'nom' => 'required',
        'ap' => 'required',
        'am' => 'required',
        'num_tel' => 'required',
        'rfc' => 'required',
        'corre_elect' => 'required|email',
    ]);



        $persona->update($request->all());

        return redirect()->route('persona.index')
            ->with('success', 'Persona actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona): RedirectResponse
    {
        $persona->delete();

        return redirect()->route('persona.index')
            ->with('success', 'Persona eliminada exitosamente.');
    }
}
