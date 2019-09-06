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

class AgendaEstudianteController extends Controller
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

        foreach ($estudianteId as $estudianteIds){
            $idEstudiante = $estudianteIds->idEstudiante;
        }

        $eventos =
        DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_estudiante.documento_estudiante,
        tbl_agenda.tipo_agenda,
        tbl_agendaestudiante.descripcion,
        tbl_agendaestudiante.fecha,
        tbl_estudiante.PK_id AS idEstudent
        FROM
        tbl_agendaestudiante
        JOIN tbl_agenda
        ON tbl_agendaestudiante.FK_agendaId = tbl_agenda.PK_id
        JOIN tbl_estudiante
        ON tbl_agendaestudiante.FK_estudianteId = tbl_estudiante.PK_id
        JOIN tbl_usuarios
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
        JOIN tbl_colegios
        ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
        WHERE
        tbl_estudiante.PK_id = $idEstudiante AND tbl_colegios.id = $idColegio"));

        $agenda = Agenda::all();
        return view('Wennec.estudiante.estudiante-eventos',compact('eventos', 'agenda'));



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
    public function store(AgendaEstudianteStoreRequest $request)
    {
        $iduser = auth()->user()->PK_id;

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

        AgendaEstudiante::create([
            'FK_agendaId' => $request['FK_agendaId'],
            'descripcion' => $request['descripcion'],
            'fecha' => $request['fecha'],
            'FK_usuarioId' => $iduser
        ]);

        return redirect('/agendaEstudiante')->with('success','Peticion Creada Correctamente');
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
    public function destroy($id)
    {
        //
    }
}
