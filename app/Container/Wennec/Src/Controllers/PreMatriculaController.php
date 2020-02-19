<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Container\Wennec\Src\Requests\RequestOnly;
use App\Container\Wennec\Src\Requests\DeptoUpdateRequest;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Actividad;
use App\Container\Wennec\Src\Plan;
use App\Container\Wennec\Src\PreMatricula;
use Illuminate\Support\Facades\DB;

class PreMatriculaController extends Controller
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
           $id = $colegioUser->idColegio;
      }

      $prematriculas =
      DB::select(DB::raw("SELECT
      tbl_prematricula.nombreEstudiante,
      tbl_prematricula.numeroDocumentoEstudiante,
      tbl_grupos.grupo,
      tbl_prematricula.correoEstudiante,
      tbl_prematricula.direccionResidencia,
      tbl_prematricula.nombrePadre,
      tbl_prematricula.nombreMadre,
      tbl_prematricula.nombreAcudiente,
      tbl_prematricula.telefonoAcudiente,
      tbl_prematricula.correoAcudiente,
      tbl_estadoprematricula.estado,
      tbl_prematricula.created_at
      FROM
      tbl_prematricula
      INNER JOIN tbl_colegios ON tbl_prematricula.codigoColegio = tbl_colegios.codigo
      INNER JOIN tbl_grupos ON tbl_prematricula.FK_Grupo = tbl_grupos.PK_id
      INNER JOIN tbl_estadoprematricula ON tbl_prematricula.FK_Estado = tbl_estadoprematricula.PK_id
      WHERE
      tbl_colegios.id = $id"));

        return view('Wennec.super-admin.super-admin-prematricula',[
          'prematriculas' => $prematriculas,
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
    public function store(RequestOnly $request)
    {
      PreMatricula::create([
            'nombreEstudiante' => $request['nombreEstudiante'],
            'numeroDocumentoEstudiante' => $request['numeroDocumentoEstudiante'],
            'FK_Grupo' => $request['FK_Grupo'],
            'correoEstudiante' => $request['correoEstudiante'],
            'direccionResidencia' => $request['direccionResidencia'],
            'nombrePadre' => $request['nombrePadre'],
            'nombreMadre' => $request['nombreMadre'],
            'nombreAcudiente' => $request['nombreAcudiente'],
            'telefonoAcudiente' => $request['telefonoAcudiente'],
            'correoAcudiente' => $request['correoAcudiente'],
            'codigoColegio' => $request['codigoColegio'],
        ]);
        return redirect('/login')->with('success','Prematricula enviada Correctamente');
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
      return redirect('/colegios')->with('error','Colegio Eliminado Correctamente');
    }

}
