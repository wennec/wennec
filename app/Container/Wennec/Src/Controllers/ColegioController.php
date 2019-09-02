<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Container\Wennec\Src\Requests\DeptoStoreRequest;
use App\Container\Wennec\Src\Requests\DeptoUpdateRequest;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Actividad;
use App\Container\Wennec\Src\Plan;

class ColegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plan::all();
        $colegios = Colegio::with('plan')->get();
        return view('Wennec.super-admin.super-admin-colegios',[
          'colegios' => $colegios,
          'planes' => $planes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $planes = Plan::all();
        return view('Wennec.super-admin.super-admin-crearcolegio', [
          'planes' => $planes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeptoStoreRequest $request)
    {
        Colegio::create([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'FK_PlanesId' => $request['FK_PlanesId'],
        ]);
        return redirect('/colegios')->with('success','Colegio Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      /*$id = Actividad::
                    select('tbl_actividad.nombre','tbl_actividad.tipo_entrega','tbl_actividad.tipo_dia', 'tbl_actividad.Num_Dia',
                           'tbl_actividad.fecha', 'tbl_actividad.hora','tbl_actividad.observacion')
                          ->join('tbl_departamento','tbl_actividad.FK_DepartamentoId','=','tbl_departamento.id')
                          ->where('tbl_departamento.id','=', $id)
                          ->get();
      return view('Wennec.super-admin.super-admin-actividad', [
          'actividades'  => $id,
      ]);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $departamento = Departamento::find($id);
        return view('Wennec.super-admin.super-admin-editdpto',['departamento'=>$departamento]);
    }
    */

    public function edit($colegio)
     {

         $cole = Colegio::find($colegio);
         $planes = Plan::all();
         return view('Wennec.super-admin.super-admin-editcolegio',[
           'departamento' => $cole,
           'planes' => $planes
         ]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeptoUpdateRequest $request, $colegio)
    {
      $cole = colegio::find($colegio);
      $cole->fill($request->all());
      $cole->save();
      return redirect('/colegios')->with('success','Colegio Modificado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($colegio)
    {
      Colegio::destroy($colegio);
      return redirect('/colegios')->with('error','Dependencia Eliminada Correctamente');
    }

}
