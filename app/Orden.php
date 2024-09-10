<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="orden";

    protected $fillable = [
        'id','id_paciente'
    ];

    
    //
}