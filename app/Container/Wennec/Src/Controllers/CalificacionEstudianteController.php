<?php
namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Requests\EventoStoreRequest;
use App\Container\Wennec\Src\Eventos;
use App\Container\Wennec\Src\EventosGenerales;
use Illuminate\Support\Facades\DB;

class CalificacionEstudianteController extends Controller
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
        TBL_Colegios.id as idColegio
        FROM
        TBL_Usuarios
        JOIN TBL_Colegios
        ON TBL_Usuarios.FK_ColegioId = TBL_Colegios.id
        WHERE TBL_Usuarios.PK_id = $iduser"));

        foreach ($colegioUsers as $colegioUser) {
             $idColegio = $colegioUser->idColegio;
        }

        $estudianteId = 
        DB::select(DB::raw("SELECT
        tbl_estudiante.PK_id as idEstudiante
        FROM
        tbl_estudiante
        JOIN tbl_usuarios
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
        WHERE tbl_usuarios.PK_id = $iduser"));

        $idEstudiante = ""

        foreach ($estudianteId as $estudianteIds){
            $idEstudiante = $estudianteIds->idEstudiante;
        }

        $calificaciones = 
        DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_cursos.nombre_curso,
        tbl_grupos.grupo,
        tbl_materias.nombre_materia,
        tbl_calificacion.tipo_calificacion,
        tbl_calificacionestudiante.calificacion,
        tbl_usuarios_docente.`name` AS docente,
        tbl_grupos.ano
        FROM
        tbl_estudiante
        JOIN tbl_usuarios
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id 
        JOIN tbl_grupoestudiantes
        ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id 
        JOIN tbl_grupos
        ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id 
        JOIN tbl_cursos
        ON tbl_grupos.`FK_ curso` = tbl_cursos.PK_id 
        JOIN tbl_colegios
        ON tbl_usuarios.FK_ColegioId = tbl_colegios.id,
        tbl_calificacionestudiante
        JOIN tbl_estudiantematerias
        ON tbl_calificacionestudiante.FK_estudiante_materias = tbl_estudiantematerias.PK_id 
        JOIN tbl_calificacion
        ON tbl_calificacionestudiante.FK_tipo_calificacion = tbl_calificacion.PK_id 
        JOIN tbl_grupomaterias
        ON tbl_estudiantematerias.FK_grupo_materias = tbl_grupomaterias.PK_id 
        JOIN tbl_docente
        ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id 
        JOIN tbl_materias
        ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id 
        JOIN tbl_usuarios AS tbl_usuarios_docente
        ON tbl_docente.FK_usuario = tbl_usuarios_docente.PK_id
        WHERE tbl_estudiante.PK_id = $idEstudiante AND tbl_colegios.id = $idColegio"));

        return view('Wennec.estudiante.estudiante-calificaciones',compact('calificaciones'));
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
        $iduser = auth()->user()->PK_id ; 

        $colegioUsers = 
        DB::select(DB::raw("SELECT
        TBL_Colegios.id as idColegio
        FROM
        TBL_Usuarios
        JOIN TBL_Colegios
        ON TBL_Usuarios.FK_ColegioId = TBL_Colegios.id
        WHERE TBL_Usuarios.PK_id = $iduser"));

        foreach ($colegioUsers as $colegioUser) {
             $id = $colegioUser->idColegio;
        }

        EventosGenerales::create([
            'titulo_evento' => $request['titulo_evento'],
            'fecha' => $request['fecha'],
            'FK_EventosId' => $request['FK_EventosId'],
            'FK_ColegioId' => $id
        ]);
        
        return redirect('/eventoA')->with('success','Evento Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        //
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
