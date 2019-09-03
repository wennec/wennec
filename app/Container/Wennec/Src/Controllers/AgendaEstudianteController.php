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
        TBL_Estudiante.PK_id as idEstudiante
        FROM
        TBL_Estudiante
        JOIN TBL_Usuarios
        ON TBL_Estudiante.FK_usuarioId = TBL_Usuarios.PK_id
        WHERE TBL_Usuarios.PK_id = $iduser"));

        foreach ($estudianteId as $estudianteIds){
            $idEstudiante = $estudianteIds->idEstudiante;
        }

        $eventos =
        DB::select(DB::raw("SELECT
        TBL_Usuarios.`name`,
        TBL_Estudiante.documento_estudiante,
        TBL_Agenda.tipo_agenda,
        TBL_AgendaEstudiante.descripcion,
        TBL_AgendaEstudiante.fecha,
        TBL_Estudiante.PK_id AS idEstudent
        FROM
        TBL_AgendaEstudiante
        JOIN TBL_Agenda
        ON TBL_AgendaEstudiante.FK_agendaId = TBL_Agenda.PK_id
        JOIN TBL_Estudiante
        ON TBL_AgendaEstudiante.FK_estudianteId = TBL_Estudiante.PK_id
        JOIN TBL_Usuarios
        ON TBL_Estudiante.FK_usuarioId = TBL_Usuarios.PK_id
        JOIN TBL_Colegios
        ON TBL_Usuarios.FK_ColegioId = TBL_Colegios.id
        WHERE
        TBL_Estudiante.PK_id = $idEstudiante AND TBL_Colegios.id = $idColegio"));

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
        TBL_Colegios.id as idColegio
        FROM
        TBL_Usuarios
        JOIN TBL_Colegios
        ON TBL_Usuarios.FK_ColegioId = TBL_Colegios.id
        WHERE TBL_Usuarios.PK_id = $iduser"));

        foreach ($colegioUsers as $colegioUser) {
             $id = $colegioUser->idColegio;
        }

        AgendaEstudiante::create([
            'FK_agendaId' => $request['FK_agendaId'],
            'descripcion' => $request['descripcion'],
            'fecha' => $request['fecha'],
            'FK_estudianteId' => $iduser
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
