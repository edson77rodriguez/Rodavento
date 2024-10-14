<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_h;


class Tipo_hController extends Controller
{
    public function index()
    {
        $tipo_hs =Tipo_h::all();
        return view('tipo_hs.index', compact('tipo_hs'));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'desc_t' => 'required',
        ]);
    
        Tipo_h::create($validatedData);
    
        return redirect()->route('tipo_hs.index')->with('register',' ');
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
            'desc_t' => 'required',
        ]);
        $tipo_h = Tipo_h::find($id);
        $tipo_h->update($request->all());

        return redirect()->route('tipo_hs.index')->with('modify',' ');
    }
    public function destroy(string $id)
    {
        $tipo_h = Tipo_h::findOrFail($id);
        $tipo_h->delete();

        return redirect()->route('tipo_hs.index')->with('destroy',' ');
    }
}
