<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class Eleccion extends Model
{
    protected $table = "tbl_eleccion";
    protected $primarykey = "PK_id";
    protected $fillable = ['nombreEleccion', 'fechaInicio','fechaFin', 'FK_ColegioId'];

}
