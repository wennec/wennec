<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class EvaluacionDocente extends Model
{
    protected $table = "tbl_evaluaciondocente";
    protected $primarykey = "PK_id";
    protected $fillable = ['puntualidad', 'dinamismo', 'respeto', 'actitud', 'FK_UsuarioId', 'FK_EstudianteId', 'FK_FechaId'];
}
