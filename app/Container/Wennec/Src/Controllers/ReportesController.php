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
        $pdf = PDF::loadView('Wennec.docente.reporte.certificado-laboral',compact('name_teacher','name_school','school_nit',
        'teacher_document', 'represent', 'startDate'));
        return $pdf->stream('certificado-laboral.pdf');
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
