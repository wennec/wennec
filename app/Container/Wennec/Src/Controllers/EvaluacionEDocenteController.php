<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Container\Wennec\Src\Requests\NoticiaRequest;
use App\Container\Wennec\Src\Requests\FechaEvaluacionDocenteRequest;
use App\Container\Wennec\Src\Requests\EvaluacionDocenteRequest;
use App\Container\Wennec\Src\User;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Roles;
use App\Container\Wennec\Src\FechaEvaluacionDocente;
use App\Container\Wennec\Src\EvaluacionDocente;
use App\Container\Wennec\Src\EvaluacionDocenteEstado;
use App\Container\Wennec\Src\Noticias;
use App\Container\Wennec\Src\Notifications\UsuarioCreado;
use Illuminate\Support\Facades\DB;


class EvaluacionEDocenteController extends Controller
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
        $id_colegio = $colegioUser->idColegio;
      }
      $grupoUsers =
      DB::select(DB::raw("SELECT
        tbl_grupos.PK_id
        FROM
        tbl_usuarios
        JOIN tbl_colegios
        ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
        JOIN tbl_estudiante
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
        JOIN tbl_grupoestudiantes
        ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id
        JOIN tbl_grupos
        ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id
        WHERE tbl_usuarios.PK_id = $iduser"));
        foreach ($grupoUsers as $grupoUser) {
          $id_grupo = $grupoUser->PK_id;
        }
            $teachersTest =
            DB::select(DB::raw("SELECT
              tbl_docente.PK_id,
              tbl_colegios.nombre,
              tbl_usuarios.PK_id AS id_teacher,
              tbl_usuarios.`name` AS name_teacher,
              tbl_grupos.grupo,
              tbl_materias.nombre_materia
              FROM
              tbl_grupomaterias
              JOIN tbl_grupos ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
              JOIN tbl_docente ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id
              JOIN tbl_materias ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
              JOIN tbl_usuarios ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
              JOIN tbl_colegios ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
              WHERE
              tbl_colegios.id = $id_colegio AND
              tbl_grupos.PK_id = $id_grupo "));

              $dates =
              DB::select(DB::raw("SELECT
                tbl_fechaevaluaciondocente.fecha_inicio,
                tbl_fechaevaluaciondocente.fecha_fin
                FROM
                tbl_fechaevaluaciondocente
                INNER JOIN tbl_colegios ON tbl_fechaevaluaciondocente.FK_ColegioId = tbl_colegios.id
                WHERE tbl_fechaevaluaciondocente.FK_ColegioId = $id_colegio"));

                $estudiantesId =
                DB::select(DB::raw("SELECT
                  tbl_estudiante.PK_id
                  FROM
                  tbl_usuarios
                  INNER JOIN tbl_estudiante ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
                  WHERE tbl_usuarios.PK_id = $iduser"));
                  foreach ($estudiantesId as $estudianteId) {
                    $id_est = $estudianteId->PK_id;
                  }
                  $evaluacionesId =
                  DB::select(DB::raw("SELECT
                    tbl_evaluaciondocente.PK_id
                    FROM
                    tbl_evaluaciondocente
                    INNER JOIN tbl_estudiante ON tbl_evaluaciondocente.FK_EstudianteId = tbl_estudiante.PK_id
                    WHERE tbl_estudiante.PK_id = $id_est"));
                    foreach ($evaluacionesId as $evaluacionId) {
                      $id_eva = $evaluacionId->PK_id;
                    }

                return view('Wennec.estudiante.estudiante-evaluaciondocente',compact('teachersTest','dates','iduser','id_eva'));
              }




              /**
              * Show the form for creating a new resource.
              *
              * @return \Illuminate\Http\Response
              */
              public function create()
              {
                $colegios = Colegio::all();
                return view('Wennec.admin.administrador-crearnoticia',compact('colegios'));
              }

              /**
              * Store a newly created resource in storage.
              *
              * @param  \Illuminate\Http\Request  $request
              * @return \Illuminate\Http\Response
              */
              public function store(EvaluacionDocenteRequest $request)
              {
                $iduser = auth()->user()->PK_id ;

                $estudiantes_id =
                DB::select(DB::raw("SELECT
                  tbl_usuarios.`name`,
                  tbl_estudiante.PK_id,
                  tbl_colegios.nombre
                  FROM
                  tbl_estudiante
                  JOIN tbl_usuarios
                  ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
                  JOIN tbl_colegios
                  ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
                  WHERE tbl_usuarios.PK_id = $iduser"));
                  foreach ($estudiantes_id as $estudiante_id) {
                    $id_e = $estudiante_id->PK_id;
                  }

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

                    $fechas_evaluacion_docente_id =
                    DB::select(DB::raw("SELECT
                      tbl_fechaevaluaciondocente.id,
                      tbl_colegios.nombre
                      FROM
                      tbl_colegios
                      INNER JOIN tbl_fechaevaluaciondocente ON tbl_fechaevaluaciondocente.FK_ColegioId = tbl_colegios.id
                      WHERE
                      tbl_colegios.id = $id "));
                      foreach ($fechas_evaluacion_docente_id as $fecha_evaluacion_docente_id) {
                        $id_fecha = $fecha_evaluacion_docente_id->id;
                      }

                      if(DB::table('tbl_evaluaciondocente')->where(['FK_UsuarioId'=>$request['teacher_id'],'FK_EstudianteId'=>$id_e])->exists()){
                        return redirect()->route('evaluacionDocenteE.index')->with('error','El docente ya fue evaluado');
                      }else{
                        EvaluacionDocente::create([
                          'puntualidad' => $request['puntualidad'],
                          'dinamismo' => $request['dinamismo'],
                          'respeto' => $request['respeto'],
                          'actitud' => $request['actitud'],
                          'FK_UsuarioId' => $request['teacher_id'],
                          'FK_EstudianteId' => $id_e,
                          'FK_FechaId' => $id_fecha
                        ]);
                        return redirect()->route('evaluacionDocenteE.index')->with('success','Evaluacion Enviada');
                      }
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
                      $fechaEvaluacionDocente = FechaEvaluacionDocente::findOrFail($id);
                      return view('Wennec.admin.administrador-editarevaluaciondocente', [
                        'fechasEvaluacionDocente' => $fechaEvaluacionDocente,
                      ]);
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
                      $fechaEvaluacionDocente = FechaEvaluacionDocente::find($id);
                      $fechaEvaluacionDocente->fill($request->all());
                      $fechaEvaluacionDocente->save();
                      return redirect('/fechaevaluaciondocenteA')->with('success','Fecha Modificada Correctamente');
                    }

                    /**
                    * Remove the specified resource from storage.
                    *
                    * @param  int  $id
                    * @return \Illuminate\Http\Response
                    */
                    public function destroy($users)
                    {
                      User::destroy($users);
                      return redirect()->route('usuarios.index')->with('error','Usuario Eliminado Correctamente');
                    }
                  }
