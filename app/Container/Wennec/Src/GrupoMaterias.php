<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class GrupoMaterias extends Model
{
    protected $table = "tbl_grupomaterias";
    protected $primarykey = "PK_id";
    protected $fillable = ['FK_materia', 'FK_docente', 'FK_GrupoId'];
}
