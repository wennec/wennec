<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table =  "TBL_Actividad";
    protected $primarykey = "id";
    protected $fillable = ['nombre','tipo_entrega','fecha','hora','tipo_dia','Num_Dia','observacion','FK_DepartamentoId'];

    public function departamento(){
        return $this->belongsTo(Departamento::class,'FK_DepartamentoId','id');
    }
}
