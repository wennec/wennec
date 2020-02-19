<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class PreMatricula extends Model
{
    protected $table = "tbl_prematricula";
    protected $primaryKey = "PK_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'nombreEstudiante','numeroDocumentoEstudiante','FK_Grupo','correoEstudiante', 'direccionResidencia', 'nombrePadre', 'nombreMadre', 'nombreAcudiente','telefonoAcudiente','correoAcudiente','codigoColegio',
    ];
}
