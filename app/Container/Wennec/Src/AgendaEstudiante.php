<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class AgendaEstudiante extends Model
{
    protected $table = "TBL_AgendaEstudiante";
    protected $primarykey = "PK_id";
    protected $fillable = ['descripcion', 'fecha', 'FK_usuarioId', 'FK_agendaId'];

    public function estudiante(){
        return $this->belongsTo(Estudiante::class,'FK_usuarioId','PK_id');
    }

    public function agenda(){
        return $this->belongsTo(Agenda::class,'FK_agendaId','PK_id');
    }

}
