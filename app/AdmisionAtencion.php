<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmisionAtencion extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="admision_atencion";

    protected $fillable = [
        'consulta','created_at'
    ];
}