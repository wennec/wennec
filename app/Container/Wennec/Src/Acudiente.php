<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
    protected $table = "tbl_acudiente";
    protected $primarykey = "PK_id";
    protected $fillable = ['documento', 'tipo_documento', 'parentesco','telefono','direccion','FK_estudianteId','FK_usuarioId'];
}
