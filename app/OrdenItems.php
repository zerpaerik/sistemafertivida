<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenItems extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="orden_items";

    protected $fillable = [
        'id','id_orden','id_servicio'
    ];

    
    //
}