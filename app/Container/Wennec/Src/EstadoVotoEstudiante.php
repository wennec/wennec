<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class EstadoVotoEstudiante extends Model
{
    protected $table = "tbl_estadovotoestudiante";
    protected $primarykey = "PK_id";
    protected $fillable = ['votoEstudiante', 'FK_VotoEstudianteId'];
}
