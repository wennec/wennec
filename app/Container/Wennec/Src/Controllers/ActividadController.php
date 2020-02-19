<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Actividad;
Use App\Container\Wennec\Src\Plan;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Departamento $colegio)
    {
      $planes = Planes::all();
      return view('Wennec.super-admin.super-admin-actividad', [
          'colegio' => $colegio->load('actividad'),
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Colegio $colegio)
    {
        return view('Wennec.super-admin.super-admin-crearActivi',compact('colegio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Colegio $colegio, Request $request)
    {
       // dump($request['tipoDia']);
        Actividad::create([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'FK_PlanesId' => $request['FK_PlanesId']
        ]);
        
        return redirect('/departamentos')->with('success','Plazo Creado Correctamente');
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
                    select('tbl_actividad.id','tbl_actividad.nombre','tbl_actividad.tipo_entrega','tbl_actividad.tipo_dia', 'tbl_actividad.Num_Dia',
                           'tbl_actividad.fecha', 'tbl_actividad.hora','tbl_actividad.observacion')
                          ->join('tbl_departamento','tbl_actividad.FK_DepartamentoId','=','tbl_departamento.id')
                          ->where('tbl_departamento.id','=', $id)
                          ->get();
      return view('Wennec.super-admin.super-admin-actividad', [
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
      return view('Wennec.super-admin.super-admin-actividad', [
          'colegio' => $departamento->load('actividad'),
          'actividad'    => $actividad,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($actividad)
    {
         Actividad::destroy($actividad); 
      return redirect('/departamentos')->with('error','Plazo Eliminado Correctamente'); 
    }
}
