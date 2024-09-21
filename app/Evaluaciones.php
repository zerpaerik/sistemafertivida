<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluaciones extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="evaluaciones";

    protected $fillable = [
        'id','id_paciente','tipo'
    ];

    
    //
}