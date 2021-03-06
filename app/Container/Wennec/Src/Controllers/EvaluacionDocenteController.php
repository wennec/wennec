<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Container\Wennec\Src\Requests\NoticiaRequest;
use App\Container\Wennec\Src\Requests\FechaEvaluacionDocenteRequest;
use App\Container\Wennec\Src\User;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Roles;
use App\Container\Wennec\Src\FechaEvaluacionDocente;
use App\Container\Wennec\Src\Noticias;
use App\Container\Wennec\Src\Notifications\UsuarioCreado;
use Illuminate\Support\Facades\DB;


class EvaluacionDocenteController extends Controller
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
      $testTeachers =
      DB::select(DB::raw("SELECT
        tbl_fechaevaluaciondocente.id,
        tbl_fechaevaluaciondocente.fecha_fin,
        tbl_fechaevaluaciondocente.fecha_inicio
        FROM
        tbl_fechaevaluaciondocente
        INNER JOIN tbl_colegios ON tbl_fechaevaluaciondocente.FK_ColegioId = tbl_colegios.id
        WHERE tbl_fechaevaluaciondocente.FK_ColegioId =  $id"));
        return view('Wennec.admin.administrador-crearevaluaciondocente',compact('testTeachers'));
      }

      /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function create()
      {
        $colegios = Colegio::all();
        return view('Wennec.admin.administrador-crearnoticia',compact('colegios'));
      }

      /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      public function store(FechaEvaluacionDocenteRequest $request)
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
          FechaEvaluacionDocente::create([
            'fecha_inicio' => $request['fecha_inicio'],
            'fecha_fin' => $request['fecha_fin'],
            'FK_ColegioId' => $id
          ]);
          return redirect()->route('fechaevaluaciondocenteA.index')->with('success','Evaluacion Creada Correctamente');
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
          $fechaEvaluacionDocente = FechaEvaluacionDocente::findOrFail($id);
          return view('Wennec.admin.administrador-editarevaluaciondocente', [
              'fechasEvaluacionDocente' => $fechaEvaluacionDocente,
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
          $fechaEvaluacionDocente = FechaEvaluacionDocente::find($id);
          $fechaEvaluacionDocente->fill($request->all());
          $fechaEvaluacionDocente->save();
          return redirect('/fechaevaluaciondocenteA')->with('success','Fecha Modificada Correctamente');
        }

        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function destroy($users)
        {
          User::destroy($users);
          return redirect()->route('usuarios.index')->with('error','Usuario Eliminado Correctamente');
        }
      }
