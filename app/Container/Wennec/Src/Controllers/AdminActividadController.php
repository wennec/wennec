<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Actividad;

class AdminActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Departamento $departamento)
    {
        return view('Wennec.admin.admin-actividad', [
            'departamento' => $departamento->load('actividad'),
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Actividad::
        select('tbl_actividad.nombre','tbl_actividad.tipo_entrega','tbl_actividad.tipo_dia', 'tbl_actividad.Num_Dia',
            'tbl_actividad.fecha', 'tbl_actividad.hora','tbl_actividad.observacion')
            ->join('tbl_departamento','tbl_actividad.FK_DepartamentoId','=','tbl_departamento.id')
            ->where('tbl_departamento.id','=', $id)
            ->get();
        return view('Wennec.admin.admin-actividad', [
        'actividades'  => $id,
        ]);
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
