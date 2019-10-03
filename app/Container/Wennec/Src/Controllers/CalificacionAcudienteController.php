<?php
namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Requests\EventoStoreRequest;
use App\Container\Wennec\Src\Eventos;
use App\Container\Wennec\Src\CalificacionEstudiante;
use App\Container\Wennec\Src\Periodo;
use Illuminate\Support\Facades\DB;

class CalificacionAcudienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = auth()->user()->PK_id ;

        $id_acudientes =
        DB::select(DB::raw("SELECT
        tbl_acudiente.PK_id
        FROM
        tbl_acudiente
        INNER JOIN tbl_usuarios ON tbl_acudiente.FK_usuarioId = tbl_usuarios.PK_id
        WHERE tbl_usuarios.PK_id = $iduser"));

        foreach($id_acudientes as $id_acudiente){
            $acudienteId = $id_acudiente->PK_id;
        }

        $estudiantes_acudiente =
        DB::select(DB::raw("SELECT
          tbl_usuarios.`name`,
          tbl_usuarios_alias1.`name` AS name_student,
          tbl_estudiante.PK_id
          FROM
          tbl_acudiente
          JOIN tbl_estudiante
          ON tbl_acudiente.FK_estudianteId = tbl_estudiante.PK_id
          JOIN tbl_usuarios
          ON tbl_acudiente.FK_usuarioId = tbl_usuarios.PK_id
          JOIN tbl_usuarios AS tbl_usuarios_alias1
          ON tbl_estudiante.FK_usuarioId = tbl_usuarios_alias1.PK_id
          WHERE tbl_acudiente.PK_id = $acudienteId"));

        return view('Wennec.acudiente.acudiente-estudiantes',compact('estudiantes_acudiente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventos = Eventos::all();
        return view('Wennec.admin.administrador-crearevento',compact('eventos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoStoreRequest $request)
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
      $asignaturas_estudiante =
      DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_materias.nombre_materia,
        tbl_materias.PK_id,
        tbl_estudiante.PK_id as idStudent
        FROM
        tbl_grupomaterias
        JOIN tbl_materias
        ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
        JOIN tbl_grupos
        ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
        JOIN tbl_grupoestudiantes
        ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id
        JOIN tbl_estudiante
        ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id
        JOIN tbl_usuarios
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
        WHERE tbl_estudiante.PK_id = $id"));

      return view('Wennec.acudiente.acudiente-asignaturasestudiante',compact('asignaturas_estudiante'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCalificaciones($id, $idStudent)
    {
      $calificacionestotal_periodouno=
      DB::select(DB::raw("SELECT
        SUM(tbl_calificacionestudiante.calificacion)/COUNT(tbl_calificacionestudiante.calificacion) as calificacion
        FROM
        tbl_grupomaterias
        JOIN tbl_grupos
        ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
        JOIN tbl_materias
        ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
        JOIN tbl_docente
        ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id
        JOIN tbl_grupoestudiantes
        ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id
        JOIN tbl_estudiante
        ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id
        JOIN tbl_usuarios
        ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
        JOIN tbl_usuarios AS tbl_usuarios_alias1
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios_alias1.PK_id
        JOIN tbl_colegios
        ON tbl_usuarios_alias1.FK_ColegioId = tbl_colegios.id
        JOIN tbl_logro
        ON tbl_logro.FK_GrupoMateria = tbl_grupomaterias.PK_id
        JOIN tbl_periodo
        ON tbl_logro.FK_Periodo = tbl_periodo.PK_id
        JOIN tbl_calificacionestudiante
        ON tbl_calificacionestudiante.FK_Logro = tbl_logro.PK_id
        AND tbl_calificacionestudiante.FK_Estudiante = tbl_estudiante.PK_id
        WHERE
        tbl_grupoestudiantes.FK_estudiante = $idStudent and tbl_materias.PK_id = $id and tbl_periodo.periodo = 'Primero'"));

        $calificacionestotal_periododos=
        DB::select(DB::raw("SELECT
          SUM(tbl_calificacionestudiante.calificacion)/COUNT(tbl_calificacionestudiante.calificacion) as calificacion
          FROM
          tbl_grupomaterias
          JOIN tbl_grupos
          ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
          JOIN tbl_materias
          ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
          JOIN tbl_docente
          ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id
          JOIN tbl_grupoestudiantes
          ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id
          JOIN tbl_estudiante
          ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id
          JOIN tbl_usuarios
          ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
          JOIN tbl_usuarios AS tbl_usuarios_alias1
          ON tbl_estudiante.FK_usuarioId = tbl_usuarios_alias1.PK_id
          JOIN tbl_colegios
          ON tbl_usuarios_alias1.FK_ColegioId = tbl_colegios.id
          JOIN tbl_logro
          ON tbl_logro.FK_GrupoMateria = tbl_grupomaterias.PK_id
          JOIN tbl_periodo
          ON tbl_logro.FK_Periodo = tbl_periodo.PK_id
          JOIN tbl_calificacionestudiante
          ON tbl_calificacionestudiante.FK_Logro = tbl_logro.PK_id
          AND tbl_calificacionestudiante.FK_Estudiante = tbl_estudiante.PK_id
          WHERE
          tbl_grupoestudiantes.FK_estudiante = $idStudent and tbl_materias.PK_id = $id and tbl_periodo.periodo = 'Segundo'"));

          $calificacionestotal_periodotres=
          DB::select(DB::raw("SELECT
            SUM(tbl_calificacionestudiante.calificacion)/COUNT(tbl_calificacionestudiante.calificacion) as calificacion
            FROM
            tbl_grupomaterias
            JOIN tbl_grupos
            ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
            JOIN tbl_materias
            ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
            JOIN tbl_docente
            ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id
            JOIN tbl_grupoestudiantes
            ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id
            JOIN tbl_estudiante
            ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id
            JOIN tbl_usuarios
            ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
            JOIN tbl_usuarios AS tbl_usuarios_alias1
            ON tbl_estudiante.FK_usuarioId = tbl_usuarios_alias1.PK_id
            JOIN tbl_colegios
            ON tbl_usuarios_alias1.FK_ColegioId = tbl_colegios.id
            JOIN tbl_logro
            ON tbl_logro.FK_GrupoMateria = tbl_grupomaterias.PK_id
            JOIN tbl_periodo
            ON tbl_logro.FK_Periodo = tbl_periodo.PK_id
            JOIN tbl_calificacionestudiante
            ON tbl_calificacionestudiante.FK_Logro = tbl_logro.PK_id
            AND tbl_calificacionestudiante.FK_Estudiante = tbl_estudiante.PK_id
            WHERE
            tbl_grupoestudiantes.FK_estudiante = $idStudent and tbl_materias.PK_id = $id and tbl_periodo.periodo = 'Tercero'"));

            $calificacionestotal_periodocuatro=
            DB::select(DB::raw("SELECT
              SUM(tbl_calificacionestudiante.calificacion)/COUNT(tbl_calificacionestudiante.calificacion) as calificacion
              FROM
              tbl_grupomaterias
              JOIN tbl_grupos
              ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
              JOIN tbl_materias
              ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
              JOIN tbl_docente
              ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id
              JOIN tbl_grupoestudiantes
              ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id
              JOIN tbl_estudiante
              ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id
              JOIN tbl_usuarios
              ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
              JOIN tbl_usuarios AS tbl_usuarios_alias1
              ON tbl_estudiante.FK_usuarioId = tbl_usuarios_alias1.PK_id
              JOIN tbl_colegios
              ON tbl_usuarios_alias1.FK_ColegioId = tbl_colegios.id
              JOIN tbl_logro
              ON tbl_logro.FK_GrupoMateria = tbl_grupomaterias.PK_id
              JOIN tbl_periodo
              ON tbl_logro.FK_Periodo = tbl_periodo.PK_id
              JOIN tbl_calificacionestudiante
              ON tbl_calificacionestudiante.FK_Logro = tbl_logro.PK_id
              AND tbl_calificacionestudiante.FK_Estudiante = tbl_estudiante.PK_id
              WHERE
              tbl_grupoestudiantes.FK_estudiante = $idStudent and tbl_materias.PK_id = $id and tbl_periodo.periodo = 'Cuarto'"));

      return view('Wennec.acudiente.acudiente-calificacionesmateria',compact('calificacionestotal_periodouno', 'calificacionestotal_periododos',
      'calificacionestotal_periodotres','calificacionestotal_periodocuatro'));

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
