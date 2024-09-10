<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="receta";

    protected $fillable = [
        'id','id_paciente'
    ];

    
    //
}