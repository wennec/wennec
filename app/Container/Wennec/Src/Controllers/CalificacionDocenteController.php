<?php
namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Requests\EventoStoreRequest;
use App\Container\Wennec\Src\Eventos;
use App\Container\Wennec\Src\CalificacionEstudiante;
use App\Container\Wennec\Src\EventosGenerales;
use Illuminate\Support\Facades\DB;

class CalificacionDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = auth()->user()->PK_id ; 

        $grupos = 
        DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_materias.nombre_materia,
        tbl_grupos.grupo,
        tbl_grupos.ano,
        tbl_grupos.PK_id
        FROM
        tbl_docente
        JOIN tbl_usuarios
        ON tbl_docente.FK_usuario = tbl_usuarios.PK_id 
        JOIN tbl_grupomaterias
        ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id 
        JOIN tbl_grupos
        ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id 
        JOIN tbl_materias
        ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id 
        JOIN tbl_colegios
        ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
        WHERE
        tbl_docente.PK_id = 1 AND tbl_colegios.id = 2"));

        return view('Wennec.docente.docente-grupos',compact('grupos'));
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
        CalificacionEstudiante::create([
            'calificacion' => $request['calificacion'],
            'periodo' => $request['periodo'],
            'FK_estudiante_materias' => $request['id'],
        ]);
        return redirect('/calificacionDocente')->with('success','Notas Registradas Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calificacion = 
        DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_cursos.nombre_curso,
        tbl_grupos.grupo,
        tbl_materias.nombre_materia,
        tbl_calificacionestudiante.calificacion,
        tbl_usuarios_docente.`name` AS docente,
        tbl_grupos.ano,
        tbl_estudiantematerias.PK_id
        FROM
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
        JOIN tbl_grupoestudiantes
        ON tbl_estudiantematerias.FK_grupo_estudiantes = tbl_grupoestudiantes.PK_id 
        JOIN tbl_grupos
        ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id 
        JOIN tbl_cursos
        ON tbl_grupos.`FK_ curso` = tbl_cursos.PK_id 
        JOIN tbl_estudiante
        ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id 
        JOIN tbl_usuarios
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id 
        JOIN tbl_colegios
        ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
        WHERE tbl_materias.PK_id = 4"));

        return view('Wennec.docente.docente-calificacion',compact('calificacion'));
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
