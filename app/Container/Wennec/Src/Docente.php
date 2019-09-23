<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = "tbl_docente";
    protected $primarykey = "PK_id";
    protected $fillable = ['profesion', 'perfil_profesional', 'FK_usuario'];

    public function user(){
        return $this->belongsTo(User::class,'FK_usuario','PK_id');
    }

}
