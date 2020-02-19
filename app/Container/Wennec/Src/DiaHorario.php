<?php

namespace App\Container\Wennec\Src;

use Illuminate\Database\Eloquent\Model;

class DiaHorario extends Model
{
    protected $table = "tbl_diahorario";
    protected $primarykey = "PK_id";
    protected $fillable = ['dia'];
}
