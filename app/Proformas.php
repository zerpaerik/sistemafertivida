<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proformas extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="proformas";

    protected $fillable = [
        'id','id_paciente'
    ];

    
    //
}