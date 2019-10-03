<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Agenda extends Model
{
    use Notifiable;
    protected $table = "tbl_agenda";
    protected $primaryKey = "PK_id";

    function agendaEstudiante(){
        return $this->hasMany(AgendaEstudiante::class,'FK_AgendaId','PK_id');
    }
}
