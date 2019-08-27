<?php
namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Requests\EventoStoreRequest;
use App\Container\Wennec\Src\Eventos;
use App\Container\Wennec\Src\EventosGenerales;
use Illuminate\Support\Facades\DB;

class EventoAdminController extends Controller
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
             $id = $colegioUser->idColegio;
        }

        $eventos = 
        DB::select(DB::raw("SELECT
        TBL_EventosGenerales.titulo_evento as Evento,
        TBL_EventosGenerales.fecha as Fecha,
        TBL_Eventos.tipo_evento as Descripcion,
        TBL_Colegios.nombre as Colegio
        FROM
        TBL_EventosGenerales
        JOIN TBL_Colegios
        ON TBL_EventosGenerales.FK_ColegioId = TBL_Colegios.id 
        JOIN TBL_Eventos
        ON TBL_EventosGenerales.FK_EventosId = TBL_Eventos.PK_id
        WHERE TBL_Colegios.id = $id
        "));

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
