<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Actividad;
use App\Container\Wennec\Src\User;
use Illuminate\Support\Facades\Auth;

class JefedeptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $jefes = Departamento::
                    select('tbl_actividad.id' ,'tbl_usuarios.FK_DepartamentoId','tbl_departamento.nombre as nombredepar', 'tbl_actividad.nombre as nombreacti',
                           'tbl_actividad.tipo_entrega', 'tbl_actividad.tipo_dia','tbl_actividad.Num_Dia',
                           'tbl_actividad.fecha','tbl_actividad.hora','tbl_actividad.observacion', 'tbl_actividad.url')
                          ->join('tbl_usuarios','tbl_usuarios.FK_DepartamentoId','=','tbl_departamento.id')
                          ->join('tbl_actividad','tbl_actividad.FK_DepartamentoId','=','tbl_departamento.id')
                          ->where('tbl_usuarios.PK_id','=', $id)
                          ->get();

        return view('Wennec.empleado.empleado-departamento',[
          'jefes' => $jefes,
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
        $user = Actividad::find($id);
        return view('Wennec.empleado.empleado-subirdptoarch',[
            'id' => $user
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
        $user = Actividad::find($id);
        $url = "";
        if ($request->hasFile('url')) {
          $url = "Archivo".'.'.time().'.'.$request->url->getClientOriginalExtension();
          $request->url->move(public_path('Jefe/Archivos'), $url);
        } else {
          if ('url' == null) {
            $url = "";
          }
        }

        $user->url = $url;
        $user->save();
        return redirect('/jefedepto')->with('success','Archivo Subido Correctamente');
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
