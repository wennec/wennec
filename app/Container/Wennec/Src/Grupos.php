<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Grupos extends Model
{
    use Notifiable;
    protected $table = "tbl_grupos";
    protected $primaryKey = "PK_id";

    function usuarios(){
        return $this->hasMany(User::class,'FK_grupo','PK_id');
    }
}
