<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Container\Wennec\Src\Requests\DeptoStoreRequest;
use App\Container\Wennec\Src\Requests\DeptoUpdateRequest;
use App\Container\Wennec\Src\Requests\RequestOnly;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Eleccion;
use App\Container\Wennec\Src\Actividad;
use App\Container\Wennec\Src\Plan;
use Illuminate\Support\Facades\DB;

class EleccionEscolarController extends Controller
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

      $eleccionColegios =
      DB::select(DB::raw("SELECT
      tbl_colegios.nombre,
      tbl_eleccion.PK_id,
      tbl_eleccion.nombreEleccion,
      tbl_eleccion.fechaInicio,
      tbl_eleccion.fechaFin
      FROM
      tbl_eleccion
      JOIN tbl_colegios
      ON tbl_eleccion.FK_ColegioId = tbl_colegios.id
      WHERE tbl_colegios.id = $id"));

      $estudiantesId =
      DB::select(DB::raw("SELECT
      tbl_usuarios.PK_id,
      CONCAT('Grupo: ', tbl_grupos.grupo, ' Nombre:', tbl_usuarios.`name`) as only
      FROM
      tbl_estudiante
      JOIN tbl_usuarios
      ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id 
      JOIN tbl_grupoestudiantes
      ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id 
      JOIN tbl_grupos
      ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id 
      JOIN tbl_cursos
      ON tbl_grupos.`FK_ curso` = tbl_cursos.PK_id 
      JOIN tbl_colegios
      ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
      WHERE
      tbl_colegios.id = $id"));


      return view('Wennec.admin.administrador-eleccion', compact('eleccionColegios', 'estudiantesId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        Eleccion::create([
            'nombreEleccion' => $request['nombreEleccion'],
            'fechaInicio' => $request['fechaInicio'],
            'fechaFin' => $request['fechaFin'],
            'FK_ColegioId' => $id,
        ]);
        return redirect('/eleccionEscolar')->with('success','Eleccion Creada Correctamente');
    }

    public function storeStudent(request $request)
    {
      
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
