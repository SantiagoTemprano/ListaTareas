<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
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
        $user_id = Auth::id();
        $tareas = Tarea::where('user_id',$user_id)->latest('updated_at')->paginate(5);
        return view('tareas.index')->with('tareas', $tareas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tareas.crear');
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
        $tarea = new Tarea([
            'user_id' => Auth::id(),
            'uuid' => Str::uuid(),
            'titulo' => $request->titulo,
            'texto' => $request->texto
        ]);
        $tarea->save();

        return to_route('tareas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        if($tarea->user_id !== Auth::id()){
            abort(403);
        }

        return view('tareas.mostrar',['tarea' => $tarea]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
