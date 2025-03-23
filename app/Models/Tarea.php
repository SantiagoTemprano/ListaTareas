<?php

namespace App\Models;

use App\Models\ListaTareas;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $guarded = [];

    public function getRouteKeyName(){
        return 'uuid';
    }

    public function lista_tareas(){
        return $this->belongsTo(ListaTareas::class,'lista_tareas_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
