<?php
namespace App\Container\Wennec\Src;

use App\Container\Wennec\Src\Proyecto;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use App\Container\Calisoft\Src\Notifications\ResetPassword;



class User extends Authenticatable
{
    use Notifiable;

    protected $table = "TBL_Usuarios";
    protected $primaryKey = "PK_id";

    /**
     *  Roles de el usuario
     * @var array
     */
    const ROLES = ['admin', 'student', 'evaluator'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','telefono','documento','direccion', 'email', 'password', 'foto','FK_RolesId','FK_DepartamentoId',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Canal de notificaciones
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'users.' . $this->PK_id;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }



    /**
     * Relacion evaluador -> proyectos asignados
     */

    public function departamento(){
        return $this->belongsTo(Colegio::class,'FK_ColegioId','id');
    }

    public function rol(){
        return $this->belongsTo(Roles::class,'FK_RolesId','id');
    }
}
