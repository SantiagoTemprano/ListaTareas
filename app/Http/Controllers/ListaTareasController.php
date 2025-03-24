<?php

namespace App\Http\Controllers;

use App\Models\ListaTareas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListaTareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $listaTareas = ListaTareas::where('user_id',$user_id)->orderBy('nombre')->get();
        return view('listaTareas.index')->with('listaTareas', $listaTareas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listaTareas.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:60'
        ]);
        $listaTareas = new ListaTareas([
            'user_id' => Auth::id(),
            'nombre' => $request->nombre
        ]);
        $listaTareas->save();
        
        return to_route('listaTareas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ListaTareas $listaTarea)
    {
        if($listaTarea->user_id !== Auth::id()){
            abort(403);
        }

        return view('listaTareas.mostrar',['listaTareas' => $listaTarea]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListaTareas $listaTarea)
    {

        if($listaTarea->user_id !== Auth::id()){
            abort(403);
        }

        return view('listaTareas.editar',['listaTareas' => $listaTarea]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ListaTareas $listaTarea)
    {
        if($listaTarea->user_id !== Auth::id()){
            abort(403);
        }

        $request->validate([
            'nombre' => 'required|max:120'
        ]);
        
        $listaTarea ->update([
            'nombre' => $request->nombre
        ]);

        return to_route('listaTareas.show', $listaTarea)->with('success', 'Cambios guardados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListaTareas $listaTareas)
    {
        //
    }
}
