<?php
namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Requests\AgendaEstudianteStoreRequest;
use App\Container\Wennec\Src\Eventos;
use App\Container\Wennec\Src\EventosGenerales;
use App\Container\Wennec\Src\Agenda;
use App\Container\Wennec\Src\AgendaEstudiante;
use App\Container\Wennec\Src\Estudiante;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $iduser = auth()->user()->PK_id ;
    $teachers_name =
    DB::select(DB::raw("SELECT
      tbl_usuarios.`name`
      FROM
      tbl_usuarios
      INNER JOIN tbl_docente ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
      WHERE tbl_usuarios.PK_id = $iduser"));

      return view('Wennec.docente.docente-reportes',compact('teachers_name'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {

      return view('Wennec.admin.administrador-crearevento',compact('eventos'));
    }
    public function reporteCertificadoLaboral()
    {
      $iduser = auth()->user()->PK_id ;
      $datas =
      DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_colegios.nombre,
        tbl_colegios.nit,
        tbl_usuarios.documento,
        tbl_colegios.representanteLegal
        FROM
        tbl_usuarios
        INNER JOIN tbl_docente ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
        INNER JOIN tbl_colegios ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
        WHERE
        tbl_usuarios.PK_id = $iduser"));
        $startDate = date("d - M - Y");
        foreach ($datas as $data) {
             $name_teacher = $data->name;
             $name_school = $data->nombre;
             $school_nit= $data->nit;
             $teacher_document = $data->documento;
             $represent = $data->representanteLegal;
        }
        $pdf = PDF::loadView('Wennec.reporte.certificado-laboral',compact('name_teacher','name_school','school_nit',
        'teacher_document', 'represent', 'startDate'));
        return $pdf->stream('certificado-laboral.pdf');
      }

  public function reporteHorario()
  {
    $iduser = auth()->user()->PK_id;
    $datas =
      DB::select(DB::raw("SELECT
      tbl_colegios.nombre
      FROM
      tbl_usuarios
      JOIN tbl_colegios
      ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
      WHERE
        tbl_usuarios.PK_id = $iduser"));
    foreach ($datas as $data) {
      $name_school = $data->nombre;
    }
    $horarios =
      DB::select(DB::raw("SELECT
        tbl_cursos.nombre_curso,
        tbl_grupos.grupo,
        tbl_diahorario.dia,
        tbl_horario.horaInicio,
        tbl_horario.horaFin,
        tbl_materias.nombre_materia,
        tbl_usuarios.`name` as nom_teacher,
        tbl_colegios.nombre,
        tbl_diahorario.PK_id
        FROM
        tbl_horario
        JOIN tbl_diahorario
        ON tbl_horario.FK_DiaId = tbl_diahorario.PK_id
        JOIN tbl_horariomateria
        ON tbl_horariomateria.FK_HorarioId = tbl_horario.PK_id
        JOIN tbl_grupomaterias
        ON tbl_horariomateria.FK_GrupoMateriaId = tbl_grupomaterias.PK_id
        JOIN tbl_grupos
        ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
        JOIN tbl_cursos
        ON tbl_grupos.`FK_ curso` = tbl_cursos.PK_id
        JOIN tbl_materias
        ON tbl_horariomateria.FK_HorarioId = tbl_materias.PK_id
        JOIN tbl_docente
        ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id
        JOIN tbl_usuarios
        ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
        JOIN tbl_colegios
        ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
        "));

    foreach ($horarios as $horarioGrupo) {
      $grupo = $horarioGrupo->grupo;
    }
    $pdf = PDF::loadView('Wennec.reporte.horario', compact(
      'horarios',
      'name_school',
      'grupo'
    ));
    return $pdf->stream('horario.pdf');
  }
      /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      public function store(Request $request)
      {
        return redirect('/agendaAcudiente')->with('success','Peticion Creada Correctamente');
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
        return redirect('/agendaAcudiente')->with('success','Peticion Modificada Correctamente');
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
