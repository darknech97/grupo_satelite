<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriaGrado extends Model
{
    protected $table = 'mxg_materiasxgrado';

    //
    protected $fillable = [
        'mxg_id', 'mxg_id_grd', 'mxg_id_mat'
    ];


    //
    public function grado(){
        return $this->belongsTo('App\Models\Grado', 'mxg_id_grd', 'grd_id');
    }


    public function materia(){
        return $this->belongsTo('App\Models\Materia', 'mxg_id_mat', 'mat_id');
    }
}
