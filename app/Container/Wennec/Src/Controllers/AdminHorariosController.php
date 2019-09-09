<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Container\Wennec\Src\DiaHorario;
use App\Container\Wennec\Src\HorarioMaterias;
use App\Container\Wennec\Src\Horarios;
use App\Container\Wennec\Src\GrupoMaterias;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Container\Wennec\Src\Requests\RequestOnly;


class AdminHorariosController extends Controller
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
             $id = $colegioUser->idColegio;
        }

        $grupos =
        DB::select(DB::raw("SELECT
        tbl_grupos.PK_id,
        tbl_grupos.grupo,
        tbl_materias.nombre_materia,
        tbl_materias.PK_id AS idmateria,
        tbl_grupomaterias.PK_id as idgrupomateria
        FROM
        tbl_usuarios
        JOIN tbl_colegios
        ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
        JOIN tbl_docente
        ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
        JOIN tbl_grupomaterias
        ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id
        JOIN tbl_materias
        ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
        JOIN tbl_grupos
        ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
        WHERE tbl_colegios.id = $id"));

        $dias = DiaHorario::all();
        $docentes =
        DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_materias.nombre_materia,
        tbl_docente.PK_id
        FROM
        tbl_materias
        JOIN tbl_grupomaterias
        ON tbl_materias.PK_id = tbl_grupomaterias.FK_materia
        JOIN tbl_docente
        ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id
        JOIN tbl_usuarios
        ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
        WHERE tbl_materias.nombre_materia = 'Sociales'"));

        return view('Wennec.admin.administrador-grupos',compact('grupos','dias','docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Wennec.admin.administrador-crearhorario',compact('docentes', 'dias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Horarios::create([
            'horaInicio' => $request['horaInicio'],
            'horaFin' => $request['horaFin'],
            'FK_DiaId' => $request['FK_DiaId'],
        ]);
        $prueba = Horarios::all();
        $prueba2 = $prueba->last();

        HorarioMaterias::create([
            'FK_HorarioId' => $prueba2->PK_id,
            'FK_GrupoMateriaId' => $request['id_grupomateria'],
        ]);

        GrupoMaterias::create([
            'FK_materia' => $request['id_materia'],
            'FK_docente' => $request['FK_docente'],
            'FK_GrupoId' => $request['id_grupo'],
        ]);
        return redirect('/calificacionDocente')->with('success','Horario Registrado Correctamente');
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
        //
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
    public function destroy($users)
    {
        User::destroy($users);
        return redirect()->route('usuarios.index')->with('error','Usuario Eliminado Correctamente');
    }
}
