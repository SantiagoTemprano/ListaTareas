<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $guarded = [];

    public function getRouteKeyName(){
        return 'uuid';
    }
}
