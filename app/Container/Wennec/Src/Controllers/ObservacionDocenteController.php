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

class ObservacionDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = auth()->user()->PK_id ;
        $idDocentes =
        DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_docente.PK_id
        FROM
        tbl_usuarios
        INNER JOIN tbl_docente ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
        WHERE tbl_usuarios.PK_id = $iduser"));

        foreach($idDocentes as $idDocente){
            $id_docente = $idDocente->PK_id;
        }

        $materiasdocente =
        DB::select(DB::raw("SELECT
          tbl_docente.PK_id,
          tbl_grupos.grupo,
          tbl_grupos.PK_id as id_grupo,
          tbl_materias.nombre_materia,
          tbl_materias.PK_id as id_materia
          FROM
          tbl_grupomaterias
          JOIN tbl_docente
          ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id
          JOIN tbl_grupos
          ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
          JOIN tbl_materias
          ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
          WHERE tbl_docente.PK_id = $id_docente"));
        return view('Wennec.docente.docente-gruposobservaciones', compact('materiasdocente'));
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
      ObservacionEstudiante::create([
        'FK_Estudiante' => $request['FK_Estudiante'],
        'FK_ObservacionDocente' => $request['FK_Observacion'],
        'FK_Materia' => $request['FK_Materia'],
        'FK_Periodo' => $request['FK_Periodo']
      ]);
      return redirect()->back()->with('success','Observacion Creada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $id_materia_show)
    {
      $listado_estudiantes =
      DB::select(DB::raw("SELECT
        tbl_grupos.grupo,
        tbl_usuarios.`name`,
        tbl_estudiante.PK_id as id_estudiante
        FROM
        tbl_grupoestudiantes
        JOIN tbl_estudiante
        ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id
        JOIN tbl_grupos
        ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id
        JOIN tbl_usuarios
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
        WHERE tbl_grupos.PK_id = $id"));
      $periodos = Periodo::all();
      $observaciones = Observacion::all();
      $id_materia = $id_materia_show;
      return view('Wennec.docente.docente-listadoestudiantesobservacion', compact('listado_estudiantes','periodos', 'observaciones','id_materia'));
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
