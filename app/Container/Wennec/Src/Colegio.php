<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    protected $table = "tbl_colegios";
    protected $primarykey = "id";
    protected $fillable = ['nombre', 'ubicacion','representanteLegal', 'nit', 'codigo', 'url', 'FK_PlanesId'];

    public function usuario(){
        return $this->hasMany(User::class,'FK_ColegioId','id');
    }

    public function plan(){
        return $this->belongsTo(Plan::class,'FK_PlanesId','id');
    }

}
