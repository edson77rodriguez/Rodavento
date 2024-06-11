<?php

namespace App\Http\Controllers;

use App\Models\Hospedaje;
use Illuminate\Http\Request;

class HospedajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospedajes = Hospedaje::latest()->paginate(5);

        return view('hospedajes.index',compact('hospedajes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hospedajes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'costo_entre_semana' => 'required',
            'costo_volumen' => 'required',
            'costo_fin' => 'required',
            'costo_especial' => 'required',

        ]);
        Hospedaje::create($request->all());

        return redirect()->route('hospedajes.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospedaje $hospedaje)
    {
        return view('hospedajes.show',compact('hospedaje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospedaje $hospedaje)
    {
        return view('hospedajes.edit',compact('hospedaje'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospedaje $hospedaje)
    {
        $request->validate([
            'descripcion' => 'required',
            'costo_entre_semana' => 'required',
            'costo_volumen' => 'required',
            'costo_fin' => 'required',
            'costo_especial' => 'required',
        ]);

        $hospedaje->update($request->all());

        return redirect()->route('hospedajes.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospedaje $hospedaje)
    {
        $hospedaje->delete();

        return redirect()->route('hospedajes.index')
            ->with('success','Product deleted successfully');
    }
}
