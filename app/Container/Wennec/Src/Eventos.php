<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Eventos extends Model
{
    use Notifiable;
    protected $table = "tbl_eventos";
    protected $primaryKey = "PK_id";

    function eventosGenerales(){
        return $this->hasMany(EventosGenerales::class,'FK_EventosId','PK_id');
    }
}
