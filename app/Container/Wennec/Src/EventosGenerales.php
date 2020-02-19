<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class EventosGenerales extends Model
{
    protected $table = "tbl_eventosgenerales";
    protected $primarykey = "PK_id";
    protected $fillable = ['titulo_evento', 'fecha', 'FK_EventosId', 'FK_ColegioId'];

    public function evento(){
        return $this->belongsTo(Evento::class,'FK_EventosId','PK_id');
    }

    public function colegio(){
        return $this->belongsTo(Colegio::class,'FK_ColegioId','id');
    }

}
