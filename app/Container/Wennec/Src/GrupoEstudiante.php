<?php
namespace App\Container\Wennec\Src;

use App\Container\Wennec\Src\Proyecto;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use App\Container\Calisoft\Src\Notifications\ResetPassword;



class GrupoEstudiante extends Authenticatable
{
    use Notifiable;

    protected $table = "tbl_grupoestudiantes";
    protected $primaryKey = "PK_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FK_estudiante','FK_grupo',
    ];
}
