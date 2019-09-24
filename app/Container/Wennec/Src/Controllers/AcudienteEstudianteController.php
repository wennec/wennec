<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Container\Wennec\Src\Requests\UserStoreRequest;
use App\Container\Wennec\Src\User;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Roles;
use App\Container\Wennec\Src\Notifications\UsuarioCreado;
use Illuminate\Support\Facades\DB;
use App\Container\Wennec\Src\Grupos;
use App\Container\Wennec\Src\Materias;
use App\Container\Wennec\Src\Docente;
use App\Container\Wennec\Src\GrupoMaterias;


class AcudienteEstudianteController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $iduser = auth()->user()->PK_id ;
    $acudientesEstudiante =
    DB::select(DB::raw("SELECT
      tbl_usuarios.`name`,
      tbl_acudiente.parentesco,
      tbl_acudiente.telefono,
      tbl_acudiente.direccion
      FROM
      tbl_usuarios
      INNER JOIN tbl_acudiente ON tbl_acudiente.FK_usuarioId = tbl_usuarios.PK_id"));

      $estudiantes=
      DB::select(DB::raw("SELECT
        tbl_usuarios.`name`,
        tbl_estudiante.PK_id
        FROM
        tbl_usuarios
        INNER JOIN tbl_estudiante ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id"));


        return view('Wennec.admin.administrador-acudienteestudiante',compact('acudientesEstudiante','estudiantes'));
      }

      /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function create()
      {
        $users = Colegio::all();
        $roles = Roles::all();
        return view('Wennec.admin.administrador-crearuser',compact('users'));
      }

      /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      public function store(UserStoreRequest $request)
      {
        $iduser = auth()->user()->PK_id;
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

          User::create([
            'name' => $request['name'],
            'telefono' => $request['telefono'],
            'documento' => $request['documento_acudiente'],
            'direccion' => $request['direccion'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'FK_RolesId' => 5,
            'FK_ColegioId' => $id
          ]);

          $allUser = User::all();
          $idUserAcudiente = $allUser->last();

          Acudiente::create([
            'documento' => $request['documento_acudiente'],
            'tipo_documento' => $request['tipo_documento'],
            'parentesco' => $request['parentesco'],
            'telefono' => $request['telefono'],
            'direccion' => $request['direccion'],
            'FK_estudianteId' => $request['FK_estudiante'],
            'FK_usuarioId' => $idUserAcudiente->PK_id,
          ]);
          return redirect()->route('acudienteEstudiante.index')->with('success','Acudiente Creado Correctamente');
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
        public function destroy($users)
        {
          User::destroy($users);
          return redirect()->route('usuarios.index')->with('error','Usuario Eliminado Correctamente');
        }
      }
