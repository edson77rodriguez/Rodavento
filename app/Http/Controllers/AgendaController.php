<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::latest()->paginate(5);
        
        return view('agendas.index',compact('agendas'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agendas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inicio' => 'required',
            'fin' => 'required',
            'actividad' => 'required',
            'lugar' => 'required',
            'equipo' => 'required',
            'montaje' => 'required',
            'comentarios' => 'required',

        ]);
        
        Agenda::create($request->all());
         
        return redirect()->route('agendas.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        return view('agendas.show',compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        return view('agendas.edit',compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'inicio' => 'required',
            'fin' => 'required',
            'actividad' => 'required',
            'lugar' => 'required',
            'equipo' => 'required',
            'montaje' => 'required',
            'comentarios' => 'required',
        ]);
        
        $agenda->update($request->all());
        
        return redirect()->route('agendas.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
         
        return redirect()->route('agendas.index')
                        ->with('success','Product deleted successfully');
    }
}
