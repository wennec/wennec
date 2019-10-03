<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Container\Wennec\Src\Requests\UserStoreRequest;
use App\Container\Wennec\Src\User;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Roles;
use App\Container\Wennec\Src\Estudiante;
use App\Container\Wennec\Src\GrupoEstudiante;
use App\Container\Wennec\Src\Grupos;
use App\Container\Wennec\Src\Notifications\UsuarioCreado;
use Illuminate\Support\Facades\DB;


class AdminStudentController extends Controller
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

        $students =
        DB::select(DB::raw("SELECT
          tbl_usuarios.`name` AS nameUser,
          tbl_roles.nombre AS nameRol,
          tbl_colegios.nombre AS nameColegio,
          tbl_grupos.grupo
          FROM
          tbl_usuarios
          JOIN tbl_roles
          ON tbl_usuarios.FK_RolesId = tbl_roles.id
          JOIN tbl_colegios
          ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
          JOIN tbl_estudiante
          ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
          JOIN tbl_grupoestudiantes
          ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id
          JOIN tbl_grupos
          ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id
          WHERE
          tbl_colegios.id = $id AND tbl_roles.nombre = 'Estudiante'"));

        $grupos = Grupos::all();

        return view('Wennec.admin.administrador-estudiante',compact('students', 'grupos'));
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
            'direccion' => $request['direccion'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'FK_RolesId' => 3,
            'FK_ColegioId' => $id
        ]);

        $allUser = User::all();
        $idUserStudent = $allUser->last();

        Estudiante::create([
            'documento_estudiante' => $request['documento_estudiante'],
            'tipo_documento' => $request['tipo_documento'],
            'sexo_estudiante' => $request['sexo_estudiante'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'lugar_nacimiento' => $request['lugar_nacimiento'],
            'nombre_madre' => $request['nombre_madre'],
            'apellido_madre' => $request['apellido_madre'],
            'nombre_padre' => $request['nombre_padre'],
            'apellido_padre' => $request['apellido_padre'],
            'FK_usuarioId' => $idUserStudent->PK_id,
        ]);

        $allStudent = Estudiante::all();
        $idStudent = $allStudent->last();

        GrupoEstudiante::create([
            'FK_estudiante' => $idStudent->PK_id,
            'FK_grupo' => $request['FK_grupo'],
        ]);
        return redirect()->route('adminStudent.index')->with('success','Estudiante Creado Correctamente');
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
