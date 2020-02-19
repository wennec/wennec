<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class HorarioMaterias extends Model
{
    protected $table = "tbl_horariomateria";
    protected $primarykey = "PK_id";
    protected $fillable = ['FK_HorarioId', 'FK_GrupoMateriaId'];
}
