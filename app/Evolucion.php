<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evolucion extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="evolucion";

    protected $fillable = [
        'id','id_paciente'
    ];

    
    //
}