<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $table = "tbl_noticias";
    protected $primarykey = "PK_id";
    protected $fillable = ['tipoNoticia', 'imagenNoticia', 'descripcion', 'fechaInicio', 'fechaFin', 'FK_ColegioId'];
}
