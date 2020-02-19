<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    protected $table = "tbl_materias";
    protected $primarykey = "PK_id";
    protected $fillable = ['nombre_materia'];
}
