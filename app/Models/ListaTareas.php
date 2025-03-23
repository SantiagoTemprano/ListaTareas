<?php

namespace App\Models;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Model;

class ListaTareas extends Model
{
    protected $guarded = [];

    public function tareas(){
        return $this->hasMany(Tarea::class);
    }
}
