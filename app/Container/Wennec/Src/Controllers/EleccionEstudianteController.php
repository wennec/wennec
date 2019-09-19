<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Container\Wennec\Src\Requests\DeptoStoreRequest;
use App\Container\Wennec\Src\Requests\DeptoUpdateRequest;
use App\Container\Wennec\Src\Requests\RequestOnly;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Eleccion;
use App\Container\Wennec\Src\EleccionEstudiante;
use App\Container\Wennec\Src\VotoEstudiante;
use App\Container\Wennec\Src\EstadoVotoEstudiante;
use Illuminate\Support\Facades\DB;

class EleccionEstudianteController extends Controller
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

      $eleccionEstudiantes =
      DB::select(DB::raw("SELECT
      tbl_usuarios.PK_id as idUsuario,
      tbl_usuarios.`name`,
      tbl_grupos.grupo,
      tbl_eleccionestudiante.PK_id AS idEleccionEstudiante
      FROM
      tbl_grupoestudiantes
      JOIN tbl_grupos
      ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id 
      JOIN tbl_estudiante
      ON tbl_estudiante.PK_id = tbl_grupoestudiantes.FK_estudiante 
      JOIN tbl_usuarios
      ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id 
      JOIN tbl_colegios
      ON tbl_usuarios.FK_ColegioId = tbl_colegios.id 
      JOIN tbl_eleccionestudiante
      ON tbl_eleccionestudiante.FK_UsuarioId = tbl_usuarios.PK_id 
      JOIN tbl_eleccion
      ON tbl_eleccionestudiante.FK_EleccionId = tbl_eleccion.PK_id
      WHERE
      tbl_colegios.id = $id"));

      $votoEstudiantes =
      DB::select(DB::raw("SELECT
      tbl_usuarios.`name`,
      tbl_estadovotoestudiante.votoEstudiante,
      tbl_votoestudiante.PK_id
      FROM
      tbl_votoestudiante
      JOIN tbl_usuarios
      ON tbl_votoestudiante.FK_UsuarioId = tbl_usuarios.PK_id 
      JOIN tbl_estadovotoestudiante
      ON tbl_estadovotoestudiante.FK_VotoEstudianteId = tbl_votoestudiante.PK_id
      WHERE tbl_usuarios.PK_id = $iduser"));

      foreach ($votoEstudiantes as $votoEstudiante) {
        $id = $votoEstudiante->PK_id;
      }


        return view('Wennec.estudiante.estudiante-eleccion', compact('eleccionEstudiantes', 'votoEstudiantes', 'id'));
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
        EleccionEstudiante::create([
            'FK_EleccionId' => $request['FK_EleccionId'],
            'FK_UsuarioId' => $request['FK_UsuarioId'],
        ]);
        return redirect('/eleccionEscolar')->with('success','Estudiante Agregado Correctamente');
    }

    public function storeVotoEstudiante(Request $request)
    {
      $iduser = auth()->user()->PK_id;

      VotoEstudiante::create([
        'FK_EleccionEstudiante' => $request['FK_EleccionEstudianteId'],
        'FK_UsuarioId' => $iduser,
      ]);

      $allVotoEstudiante= VotoEstudiante::all();
      $idVotoEstudiante = $allVotoEstudiante->last();

      EstadoVotoEstudiante::create([
        'votoEstudiante' => $request['votoEstudiante'],
        'FK_VotoEstudianteId' => $idVotoEstudiante->PK_id,
      ]);
      return redirect('/eleccionEstudiante')->with('success', 'Voto Enviado');
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
