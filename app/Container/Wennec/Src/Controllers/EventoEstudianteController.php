<?php
namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Requests\EventoStoreRequest;
use App\Container\Wennec\Src\Eventos;
use App\Container\Wennec\Src\EventosGenerales;
use Illuminate\Support\Facades\DB;

class EventoEstudianteController extends Controller
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
             $idSchool = $colegioUser->idColegio;
        }

        $eventos =
        DB::select(DB::raw("SELECT
        tbl_eventosgenerales.titulo_evento as Evento,
        tbl_eventosgenerales.fecha as Fecha,
        tbl_eventos.tipo_evento as Descripcion,
        tbl_colegios.nombre as Colegio
        FROM
        tbl_eventosgenerales
        JOIN tbl_colegios
        ON tbl_eventosgenerales.FK_ColegioId = tbl_colegios.id
        JOIN tbl_eventos
        ON tbl_eventosgenerales.FK_EventosId = tbl_eventos.PK_id
        WHERE tbl_colegios.id = 2"));

        return view('Wennec.admin.administrador-eventos',compact('eventos'));
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
        tbl_colegios.id as idColegio
        FROM
        tbl_usuarios
        JOIN tbl_colegios
        ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
        WHERE tbl_usuarios.PK_id = $iduser"));

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
