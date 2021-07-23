<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grd_grado';

    //
    protected $fillable = [
        'grd_id', 'grd_nombre'
    ];

    public function materias(){
        return $this->hasMany('App\Models\MateriaGrado', 'mxg_id_grd', 'grd_id');
    }
}
