<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenIteml extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="orden_iteml";

    protected $fillable = [
        'id','id_orden','id_lab'
    ];

    
    //
}