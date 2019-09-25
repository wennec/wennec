<?php
namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Requests\EventoStoreRequest;
use App\Container\Wennec\Src\Eventos;
use App\Container\Wennec\Src\Periodo;
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
        $eventos = Eventos::all();
        return view('Wennec.admin.administrador-crearevento',compact('eventos'));
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
        return redirect('/logroDocente?' . $request['FK_GrupoMaterias'])->with('success','Logro Creado Correctamente');
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
