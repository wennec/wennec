<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    protected $table = "TBL_Colegios";
    protected $primarykey = "id";
    protected $fillable = ['nombre','descripcion', 'FK_PlanesId'];

    public function usuario(){
        return $this->hasMany(User::class,'FK_ColegioId','id');
    }

    public function plan(){
        return $this->belongsTo(Plan::class,'FK_PlanesId','id');
    }

}
