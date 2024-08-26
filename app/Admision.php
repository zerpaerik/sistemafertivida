<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admision extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="admision";

    protected $fillable = [
        'consulta','created_at'
    ];

    
    //
}