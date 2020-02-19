<?php
namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\AgendaGeneral;
use Illuminate\Support\Facades\DB;

class AgendaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = auth()->user()->PK_id ;

        $eventos =
        DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_agendageneral.titulo,
        tbl_agendageneral.descripcion,
        tbl_agendageneral.fecha,
        tbl_agendageneral.FK_usuario,
        tbl_agendageneral.id
        FROM
        tbl_agendageneral
        INNER JOIN tbl_usuarios ON tbl_agendageneral.FK_usuario = tbl_usuarios.PK_id
        WHERE tbl_usuarios.PK_id = $iduser"));

        $estudiantes =
        DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_estudiante.PK_id
        FROM
        tbl_estudiante
        JOIN tbl_usuarios
        ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id"));
        return view('Wennec.admin.administrador-agenda',compact('eventos','estudiantes'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iduser = auth()->user()->PK_id;

        AgendaGeneral::create([
            'titulo' => $request['titulo'],
            'descripcion' => $request['descripcion'],
            'fecha' => $request['fecha'],
            'estudiante' => $request['estudiante'],
            'FK_usuario' => $iduser
        ]);

        return redirect('/agendaA')->with('success','Agenda Creada Correctamente');
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
        $cole = AgendaGeneral::findOrFail($id);
        return view('Wennec.admin.administrador-editarevento', [
            'departamento' => $cole
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
        $cole = AgendaGeneral::find($id);
        $cole->fill($request->all());
        $cole->save();
        return redirect('/agendaA')->with('success','Agenda Modificada Correctamente');
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
