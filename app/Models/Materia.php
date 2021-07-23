<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'mat_materia';

    //
    protected $fillable = [
        'mat_id', 'mat_nombre'
    ];
}
