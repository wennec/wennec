<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Actividad;
use App\Container\Wennec\Src\ActividadTemporal;
use App\Container\Wennec\Src\User;
use Illuminate\Support\Facades\Auth;

class JefeActTempController extends Controller
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
                    select('tbl_activtemporal.id' ,'tbl_usuarios.FK_DepartamentoId','tbl_departamento.nombre as nombredepar', 'tbl_activtemporal.nombre as nombreacti',
                           'tbl_activtemporal.tipo_entrega', 'tbl_activtemporal.tipo_dia','tbl_activtemporal.Num_Dia',
                           'tbl_activtemporal.fecha','tbl_activtemporal.hora','tbl_activtemporal.observacion', 'tbl_activtemporal.url', 'tbl_activtemporal.url_plazo')
                          ->join('tbl_usuarios','tbl_usuarios.FK_DepartamentoId','=','tbl_departamento.id')
                          ->join('tbl_activtemporal','tbl_activtemporal.FK_DepartamentoId','=','tbl_departamento.id')
                          ->where('tbl_usuarios.PK_id','=', $id)
                          ->get();

        return view('Wennec.empleado.empleado-acttemporales',[
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
        $user = ActividadTemporal::find($id);
        return view('Wennec.empleado.empleado-subirplazo',[
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
        $user = ActividadTemporal::find($id);
        $url = "";
        if ($request->hasFile('url_plazo')) {
          $url = "Archivo".'.'.time().'.'.$request->url_plazo->getClientOriginalExtension();
          $request->url_plazo->move(public_path('Jefe/Archivos'), $url);
        } else {
          if ('url_plazo' == null) {
            $url = "";
          }
        }

        $user->url_plazo = $url;
        $user->save();
        return redirect('/jefeacttemp')->with('success','Archivo Subido Correctamente');
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
