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

    public function listaTareas(){
        return $this->belongsTo(ListaTareas::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
