<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    protected $table = "tbl_logro";
    protected $primarykey = "PK_id";
    protected $fillable = ['nombreLogro', 'descripcion', 'FK_Periodo', 'FK_GrupoMateria'];

}
