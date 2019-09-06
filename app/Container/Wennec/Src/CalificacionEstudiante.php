<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class CalificacionEstudiante extends Model
{
    protected $table = "tbl_calificacionestudiante";
    protected $primarykey = "PK_id";
    protected $fillable = ['calificacion', 'periodo', 'FK_estudiante_materias'];
}
