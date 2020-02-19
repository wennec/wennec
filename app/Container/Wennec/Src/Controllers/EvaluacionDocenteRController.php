<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Container\Wennec\Src\Requests\NoticiaRequest;
use App\Container\Wennec\Src\Requests\FechaEvaluacionDocenteRequest;
use App\Container\Wennec\Src\User;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Roles;
use App\Container\Wennec\Src\FechaEvaluacionDocente;
use App\Container\Wennec\Src\Noticias;
use App\Container\Wennec\Src\Notifications\UsuarioCreado;
use Illuminate\Support\Facades\DB;


class EvaluacionDocenteRController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $iduser = auth()->user()->PK_id ;

    $colegioUsers =
    DB::select(DB::raw("SELECT
      tbl_colegios.id as idColegio
      FROM
      tbl_usuarios
      JOIN tbl_colegios
      ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
      WHERE tbl_usuarios.PK_id = $iduser"));

      foreach ($colegioUsers as $colegioUser) {
        $id = $colegioUser->idColegio;
      }
      $resultados =
      DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        SUM(if(tbl_evaluaciondocente.puntualidad = 0,1,0)) AS malaPuntualidad,
        SUM(if(tbl_evaluaciondocente.puntualidad = 1,1,0)) AS buenaPuntualidad,
        SUM(if(tbl_evaluaciondocente.dinamismo = 0,1,0)) AS malDinamismo,
        SUM(if(tbl_evaluaciondocente.dinamismo = 1,1,0)) AS buenDinamismo,
        SUM(if(tbl_evaluaciondocente.respeto = 0,1,0)) AS malRespeto,
        SUM(if(tbl_evaluaciondocente.respeto = 1,1,0)) AS buenRespeto,
        SUM(if(tbl_evaluaciondocente.actitud = 0,1,0)) AS malaActitud,
        SUM(if(tbl_evaluaciondocente.actitud = 1,1,0)) AS buenaActitud,
        COUNT(*) as totalVotos
        FROM
        tbl_docente
        JOIN tbl_usuarios
        ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
        JOIN tbl_evaluaciondocente
        ON tbl_evaluaciondocente.FK_UsuarioId = tbl_usuarios.PK_id
        JOIN tbl_colegios
        ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
        WHERE
        tbl_colegios.id = $id
        GROUP BY tbl_usuarios.`name` "));
        return view('Wennec.admin.administrador-resultadosevaluaciondocente',compact('resultados'));
      }

      /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function create()
      {
      }

      /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      public function store(FechaEvaluacionDocenteRequest $request)
      {
      }

        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
          //
        }

        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
        }

        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        }

        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function destroy($users)
        {
        }
      }
