<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eva extends Model
{

    protected $table="eva";

    protected $fillable = [
        'texto', 'usuario'
    ];
    //
}
