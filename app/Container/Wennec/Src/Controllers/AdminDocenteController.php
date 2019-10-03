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


class AdminDocenteController extends Controller
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

        $docentes =
        DB::select(DB::raw("SELECT
        tbl_usuarios.name as nameUser,
        tbl_roles.nombre as nameRol,
        tbl_colegios.nombre as nameColegio
        FROM
        tbl_usuarios
        JOIN tbl_roles ON tbl_usuarios.FK_RolesId = tbl_roles.id
        JOIN tbl_colegios ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
        WHERE tbl_colegios.id = $id AND tbl_roles.nombre = 'Docente'"));
        $grupos = Grupos::all();
        $materias = Materias::all();
        return view('Wennec.admin.administrador-docente',compact('docentes', 'grupos','materias'));
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

      User::create([
          'name' => $request['name'],
          'telefono' => $request['telefono'],
          'documento' => $request['documento_docente'],
          'direccion' => $request['direccion'],
          'email' => $request['email'],
          'password' => bcrypt($request['password']),
          'FK_RolesId' => 4,
          'FK_ColegioId' => $id
      ]);

      $allUser = User::all();
      $idUserTeacher = $allUser->last();

      Docente::create([
          'profesion' => $request['profesion'],
          'perfil_profesional' => $request['perfil_profesional'],
          'FK_usuario' => $idUserTeacher->PK_id,
      ]);

      $allTeachers = Docente::all();
      $idTeacher = $allTeachers->last();

      GrupoMaterias::create([
          'FK_materia' => $request['FK_materia'],
          'FK_docente' => $idTeacher->PK_id,
          'FK_GrupoId' => $request['FK_grupo'],
      ]);
      return redirect()->route('adminDocente.index')->with('success','Docente Creado Correctamente');
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
