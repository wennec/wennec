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

class AgendaAcudienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = auth()->user()->PK_id ; 

        $estudianteId = 
        DB::select(DB::raw("SELECT
        tbl_estudiante.PK_id as idEstudiante,
        TBL_Acudiente.FK_usuarioId
        FROM
        TBL_Acudiente
        JOIN tbl_usuarios
        ON TBL_Acudiente.FK_usuarioId = tbl_usuarios.PK_id 
        JOIN tbl_estudiante
        ON TBL_Acudiente.FK_estudianteId = tbl_estudiante.PK_id
        WHERE tbl_usuarios.PK_id = $iduser"));

        foreach ($estudianteId as $estudianteIds){
            $idEstudiante = $estudianteIds->idEstudiante;
        }

        $eventos = 
        DB::select(DB::raw("SELECT
        tbl_agenda.tipo_agenda,
        tbl_agendaestudiante.id,
        tbl_agendaestudiante.descripcion,
        tbl_estudiante.nombre_madre,
        TBL_AgendaEstudiante.fecha,
        tbl_usuarios.`name`
        FROM
        tbl_agendaestudiante
        JOIN tbl_agenda
        ON tbl_agendaestudiante.FK_agendaId = tbl_agenda.PK_id 
        JOIN tbl_estudiante
        ON tbl_agendaestudiante.FK_estudianteId = tbl_estudiante.PK_id 
        JOIN tbl_acudiente
        ON tbl_acudiente.FK_estudianteId = tbl_estudiante.PK_id 
        JOIN tbl_usuarios
        ON tbl_acudiente.FK_usuarioId = tbl_usuarios.PK_id 
        WHERE
        tbl_estudiante.PK_id = $idEstudiante"));

        $agenda = Agenda::all();
        return view('Wennec.acudiente.acudiente-eventos',compact('eventos', 'agenda'));
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

        $estudianteId = 
        DB::select(DB::raw("SELECT
        tbl_estudiante.PK_id as idEstudiante,
        TBL_Acudiente.FK_usuarioId
        FROM
        TBL_Acudiente
        JOIN tbl_usuarios
        ON TBL_Acudiente.FK_usuarioId = tbl_usuarios.PK_id 
        JOIN tbl_estudiante
        ON TBL_Acudiente.FK_estudianteId = tbl_estudiante.PK_id
        WHERE tbl_usuarios.PK_id = $iduser"));

        foreach ($estudianteId as $estudianteIds){
            $idEstudiante = $estudianteIds->idEstudiante;
        }

        AgendaEstudiante::create([
            'FK_agendaId' => $request['FK_agendaId'],
            'descripcion' => $request['descripcion'],
            'fecha' => $request['fecha'],
            'FK_estudianteId' => $idEstudiante
        ]);
        
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
        $cole = AgendaEstudiante::findOrFail($id);
        $agenda = Agenda::all();
        return view('Wennec.acudiente.acudiente-editarevento', [
            'departamento' => $cole,
            'agenda' => $agenda
        ]);
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
      $cole = AgendaEstudiante::find($id);
      $cole->fill($request->all());
      $cole->save();
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
