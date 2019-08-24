<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ActividadTemporal extends Model
{
    use Notifiable;
    protected $table = "TBL_ActivTemporal";
    protected $primaryKey = "id";
    protected $fillable = ['nombre','observacion','FK_DepartamentoId','tipo_entrega','fecha','hora','tipo_dia','Num_Dia','url','url_plazo'];

    public function departamento(){
        return $this->belongsTo(Departamento::class,'FK_DepartamentoId','id');
    }
}
