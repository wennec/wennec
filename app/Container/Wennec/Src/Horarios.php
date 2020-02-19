<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    protected $table = "tbl_horario";
    protected $primarykey = "PK_id";
    protected $fillable = ['horaInicio', 'horaFin', 'FK_DiaId'];
}
