<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultadosImagenes extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="resultados_imagenes";

    protected $fillable = [
        'id_resultado','imagen','name'
    ];

    
    //
}
