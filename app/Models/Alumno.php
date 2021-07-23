<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alm_alumno';

    //
    protected $fillable = [
        'alm_id', 'alm_codigo', 'alm_nombre', 'alm_edad', 'alm_sexo', 'alm_id_grd', 'alm_observacion'
    ];


    //
    public function grado(){
        return $this->belongsTo('App\Models\Grado', 'alm_id_grd', 'grd_id');
    }

}
