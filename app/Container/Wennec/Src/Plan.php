<?php
namespace App\Container\Wennec\Src;

use App\Container\Wennec\Src\Proyecto;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use App\Container\Calisoft\Src\Notifications\ResetPassword;



class Plan extends Authenticatable
{
    use Notifiable;

    protected $table = "TBL_Planes";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    function colegio(){
        return $this->hasMany(Colegio::class,'FK_PlanesId','id');
    }
}
