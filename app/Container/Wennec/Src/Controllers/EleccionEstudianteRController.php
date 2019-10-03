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


class EleccionEstudianteRController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $iduser = auth()->user()->PK_id;

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
      COUNT(*) AS total,
      tbl_grupos.grupo,
      tbl_usuarios.foto
      FROM
      tbl_eleccionestudiante
      JOIN tbl_eleccion
      ON tbl_eleccionestudiante.FK_EleccionId = tbl_eleccion.PK_id 
      JOIN tbl_usuarios
      ON tbl_eleccionestudiante.FK_UsuarioId = tbl_usuarios.PK_id 
      JOIN tbl_estudiante
      ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id 
      JOIN tbl_grupoestudiantes
      ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id 
      JOIN tbl_grupos
      ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id 
      JOIN tbl_colegios
      ON tbl_colegios.id = tbl_usuarios.FK_ColegioId
      GROUP BY
      tbl_usuarios.`name`, tbl_grupos.grupo, tbl_usuarios.foto"));
    return view('Wennec.admin.administrador-resultadoseleccionestudiante', compact('resultados'));
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
