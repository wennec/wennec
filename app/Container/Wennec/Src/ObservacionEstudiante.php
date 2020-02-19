<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class ObservacionEstudiante extends Model
{
    protected $table = "tbl_observacionestudiante";
    protected $primarykey = "PK_id";
    protected $fillable = ['FK_Estudiante','FK_ObservacionDocente', 'FK_Materia', 'FK_Periodo'];
}
