<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\ListaTareas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::whereBelongsTo(Auth::user())->latest('updated_at')->paginate(5);
        return view('tareas.index')->with('tareas', $tareas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = Auth::id();
        $listaTareas = ListaTareas::where('user_id',$user_id)->orderBy('nombre')->get();
        return view('tareas.crear')->with('listaTareas',$listaTareas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:120',
            'texto' => 'required|max:4000'
        ]);

        $tarea = Auth::user()->tareas()->create([
            'uuid' => Str::uuid(),
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'listaTareas_id' => $request->listaTareas_id
        ]);

        return to_route('tareas.show', $tarea);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        if(!$tarea->user->is(Auth::user())){
            abort(403);
        }

        return view('tareas.mostrar',['tarea' => $tarea]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        $user_id = Auth::id();
        if(!$tarea->user->is(Auth::user())){
            abort(403);
        }
        $listaTareas = ListaTareas::where('user_id',$user_id)->orderBy('nombre')->get();
        return view('tareas.editar',['tarea' => $tarea,'listaTareas' => $listaTareas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        
        if(!$tarea->user->is(Auth::user())){
            abort(403);
        }

        $request->validate([
            'titulo' => 'required|max:120',
            'texto' => 'required|max:4000'
        ]);
        
        $tarea ->update([
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'listaTareas_id' => $request->listaTareas_id
        ]);

        return to_route('tareas.show', $tarea)->with('success', 'Cambios guardados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        if(!$tarea->user->is(Auth::user())){
            abort(403);
        }

        $tarea->delete();
        return to_route('tareas.index')->with('success', 'Tarea borrada con éxito');
    }
}
