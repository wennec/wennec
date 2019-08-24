<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Roles extends Model
{
    use Notifiable;
    protected $table = "TBL_Roles";
    protected $primaryKey = "id";

    function usuarios(){
        return $this->hasMany(User::class,'FK_RolesId','id');
    }
}
