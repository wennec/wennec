<?php
namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Requests\EventoStoreRequest;
use App\Container\Wennec\Src\Eventos;
use App\Container\Wennec\Src\CalificacionEstudiante;
use App\Container\Wennec\Src\Periodo;
use App\Container\Wennec\Src\Observacion;
use App\Container\Wennec\Src\ObservacionEstudiante;
use Illuminate\Support\Facades\DB;

class ObservacionAcudienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $iduser = auth()->user()->PK_id ;

      $idAcudientes =
      DB::select(DB::raw("SELECT
      tbl_usuarios.`name`,
      tbl_acudiente.PK_id
      FROM
      tbl_usuarios
      INNER JOIN tbl_acudiente ON tbl_acudiente.FK_usuarioId = tbl_usuarios.PK_id
      WHERE tbl_usuarios.PK_id = $iduser"));

      foreach($idAcudientes as $idAcudiente){
          $id_acudiente = $idAcudiente->PK_id;
      }

      $estudiantes_acudiente =
      DB::select(DB::raw("SELECT
        tbl_usuarios.`name` AS nombreMadre,
        tbl_usuarios_alias1.`name` AS nombreEstudiante,
        tbl_estudiante.PK_id
        FROM
        tbl_estudiante
        JOIN tbl_usuarios AS tbl_usuarios_alias1
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios_alias1.PK_id
        JOIN tbl_acudiente
        ON tbl_acudiente.FK_estudianteId = tbl_estudiante.PK_id
        JOIN tbl_usuarios
        ON tbl_acudiente.FK_usuarioId = tbl_usuarios.PK_id
        WHERE tbl_acudiente.PK_id = $id_acudiente"));

      return view('Wennec.acudiente.acudiente-estudiantesobservacion',compact('estudiantes_acudiente'));
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
    public function store(Request $request)
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
      $id_estudiante = $id;
      $idEstudiantes =
      DB::select(DB::raw("SELECT
        tbl_usuarios.PK_id
        FROM
        tbl_estudiante
        JOIN tbl_usuarios
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
        WHERE tbl_estudiante.PK_id = $id_estudiante"));

      foreach($idEstudiantes as $idEstudiante){
          $id_estudiante = $idEstudiante->PK_id;
      }
      $materias_estudiante =
      DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_grupos.grupo,
        tbl_materias.nombre_materia,
        tbl_materias.PK_id
        FROM
        tbl_grupomaterias
        JOIN tbl_materias
        ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
        JOIN tbl_grupos
        ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
        JOIN tbl_estudiante
        JOIN tbl_grupoestudiantes
        ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id
        AND tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id
        JOIN tbl_usuarios
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
        WHERE tbl_usuarios.PK_id = $id_estudiante"));

      return view('Wennec.acudiente.acudiente-materiasobservacion', compact('materias_estudiante','id_estudiante'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_observaciones($id_estudiante, $id_materia)
    {
      $idEstudiantes =
      DB::select(DB::raw("SELECT
      tbl_usuarios.`name`,
      tbl_estudiante.PK_id
      FROM
      tbl_usuarios
      INNER JOIN tbl_estudiante ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
      WHERE tbl_usuarios.PK_id = $id_estudiante"));

      foreach($idEstudiantes as $idEstudiante){
          $id_estudiante = $idEstudiante->PK_id;
      }
      $observaciones_estudiante =
      DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_materias.nombre_materia,
        tbl_observaciondocente.descripcion,
        tbl_periodo.periodo
        FROM
        tbl_observacionestudiante
        JOIN tbl_observaciondocente
        ON tbl_observacionestudiante.FK_ObservacionDocente = tbl_observaciondocente.PK_id
        JOIN tbl_materias
        ON tbl_materias.PK_id = tbl_observacionestudiante.FK_Materia
        JOIN tbl_periodo
        ON tbl_observacionestudiante.FK_Periodo = tbl_periodo.PK_id
        JOIN tbl_estudiante
        ON tbl_observacionestudiante.FK_Estudiante = tbl_estudiante.PK_id
        JOIN tbl_usuarios
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
        WHERE tbl_estudiante.PK_id = $id_estudiante and tbl_materias.PK_id = $id_materia"));

      return view('Wennec.acudiente.acudiente-observacionesmateria', compact('observaciones_estudiante'));
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
    public function destroy($id)
    {
        //
    }

}
