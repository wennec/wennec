<?php
namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Requests\EventoStoreRequest;
use App\Container\Wennec\Src\Eventos;
use App\Container\Wennec\Src\CalificacionEstudiante;
use App\Container\Wennec\Src\Logro;
use App\Container\Wennec\Src\Requests\RequestOnly;
use Illuminate\Support\Facades\DB;

class LogroController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $logros =
    DB::select(DB::raw("SELECT
      tbl_grupos.grupo,
      tbl_materias.nombre_materia,
      tbl_logro.nombreLogro,
      tbl_logro.descripcion
      FROM
      tbl_logro
      JOIN tbl_grupomaterias
      ON tbl_logro.FK_GrupoMateria = tbl_grupomaterias.PK_id
      JOIN tbl_grupos
      ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
      JOIN tbl_materias
      ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
      WHERE tbl_logro.FK_GrupoMateria = 2"));
      return view('Wennec.docente.docente-logros', compact('logros'));
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
    public function store(RequestOnly $request)
    {
      $grupoMateria = $request['FK_GrupoMaterias'];
      Logro::create([
        'nombreLogro' => $request['logro'],
        'descripcion' => $request['descripcion'],
        'FK_Periodo' => $request['FK_Periodo'],
        'FK_GrupoMateria' => $grupoMateria,
      ]);
      $this->index($grupoMateria);
      return redirect('/logroDocente/' . $request['FK_GrupoMaterias'])->with('success','Logro Creado Correctamente');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
      $logros =
      DB::select(DB::raw("SELECT
        tbl_grupos.grupo,
        tbl_materias.nombre_materia,
        tbl_logro.nombreLogro,
        tbl_logro.descripcion,
        tbl_logro.PK_id
        FROM
        tbl_logro
        JOIN tbl_grupomaterias
        ON tbl_logro.FK_GrupoMateria = tbl_grupomaterias.PK_id
        JOIN tbl_grupos
        ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
        JOIN tbl_materias
        ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
        WHERE tbl_logro.FK_GrupoMateria = $id"));
        return view('Wennec.docente.docente-logros', compact('logros'));
      }

      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function show_estudiantes($id)
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
            $idColegio = $colegioUser->idColegio;
          }
          $estudiantes_grupo =
          DB::select(DB::raw("SELECT
          tbl_materias.nombre_materia,
          tbl_grupos.grupo,
          tbl_logro.nombreLogro,
          tbl_usuarios.`name`,
          tbl_estudiante.PK_id AS idEstudiante,
          tbl_logro.PK_id
          FROM
          tbl_logro
          JOIN tbl_periodo
          ON tbl_logro.FK_Periodo = tbl_periodo.PK_id 
          JOIN tbl_grupomaterias
          ON tbl_logro.FK_GrupoMateria = tbl_grupomaterias.PK_id 
          JOIN tbl_materias
          ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id 
          JOIN tbl_docente
          ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id 
          JOIN tbl_grupos
          ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id 
          JOIN tbl_grupoestudiantes
          ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id 
          JOIN tbl_estudiante
          ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id 
          JOIN tbl_usuarios
          ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id 
          JOIN tbl_colegios
          ON tbl_usuarios.FK_ColegioId = tbl_colegios.id 
          WHERE
            tbl_logro.PK_id = $id  AND tbl_colegios.id = $idColegio"));
            return view('Wennec.docente.docente-calificacion', compact('estudiantes_grupo'));
          }

          /**
          * Show the form for editing the specified resource.
          *
          * @param  int  $id
          * @return \Illuminate\Http\Response
          */
          public function edit($id)
          {
            $calificacionEstudiante = CalificacionEstudiante::findOrFail($id);
            $calificacionEstudiante->fill($request->all());
            $calificacionEstudiante->save();
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
            $calificacionEstudiante = CalificacionEstudiante::find($id);
            $calificacionEstudiante->fill($request->all());
            $calificacionEstudiante->save();
            return redirect('/')->with('success','Calificiacion Modificada Correctamente');
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
