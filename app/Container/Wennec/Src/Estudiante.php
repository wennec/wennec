<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = "tbl_estudiante";
    protected $primarykey = "PK_id";
    protected $fillable = ['documento_estudiante', 'tipo_documento', 'sexo_estudiante', 'fecha_nacimiento', 'lugar_nacimiento', 'nombre_madre', 'apellido_madre', 'nombre_padre', 'apellido_padre', 'FK_usuarioId'];

    public function user(){
        return $this->belongsTo(User::class,'FK_usuarioId','PK_id');
    }

}
