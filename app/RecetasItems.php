<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecetasItems extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="receta_items";

    protected $fillable = [
        'id','id_receta','id_producto','descripcion'
    ];

    
    //
}