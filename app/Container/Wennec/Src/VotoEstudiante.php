<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class VotoEstudiante extends Model
{
    protected $table = "tbl_votoestudiante";
    protected $primarykey = "PK_id";
    protected $fillable = ['votoEstudiante', 'FK_UsuarioId', 'FK_EleccionEstudiante'];
}
