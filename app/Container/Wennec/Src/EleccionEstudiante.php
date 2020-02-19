<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class EleccionEstudiante extends Model
{
    protected $table = "tbl_eleccionestudiante";
    protected $primarykey = "PK_id";
    protected $fillable = ['FK_UsuarioId', 'FK_EleccionId'];
}
