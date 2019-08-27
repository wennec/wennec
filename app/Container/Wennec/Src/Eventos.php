<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Eventos extends Model
{
    use Notifiable;
    protected $table = "TBL_Eventos";
    protected $primaryKey = "PK_id";

    function eventosGenerales(){
        return $this->hasMany(EventosGenerales::class,'FK_EventosId','PK_id');
    }
}
