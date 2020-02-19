<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AgendaGeneral extends Model
{
    protected $table = "tbl_agendageneral";
    protected $primarykey = "id";
    protected $fillable = ['titulo' ,'descripcion', 'fecha', 'FK_usuario'];
}
