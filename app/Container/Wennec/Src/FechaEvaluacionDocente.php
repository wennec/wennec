<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class FechaEvaluacionDocente extends Model
{
    protected $table = "tbl_fechaevaluaciondocente";
    protected $primarykey = "PK_id";
    protected $fillable = ['fecha_inicio', 'fecha_fin'];
}
