<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class AgendaEstudiante extends Model
{
    protected $table = "TBL_AgendaEstudiante";
    protected $primarykey = "id";
    protected $fillable = ['descripcion', 'fecha', 'FK_estudianteId', 'FK_agendaId'];

    public function estudiante(){
        return $this->belongsTo(Estudiante::class,'FK_estudianteId','PK_id');
    }

    public function agenda(){
        return $this->belongsTo(Agenda::class,'FK_agendaId','PK_id');
    }

}
