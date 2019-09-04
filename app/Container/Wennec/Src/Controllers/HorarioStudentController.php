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


class HorarioStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $horario =
      DB::select(DB::raw("SELECT
        tbl_cursos.nombre_curso,
        tbl_grupos.grupo,
        tbl_diahorario.dia,
        tbl_horario.horaInicio,
        tbl_horario.horaFin,
        tbl_materias.nombre_materia,
        tbl_usuarios.`name` as nom_teacher,
        tbl_colegios.nombre,
        tbl_diahorario.PK_id
        FROM
        tbl_horario
        JOIN tbl_diahorario
        ON tbl_horario.FK_DiaId = tbl_diahorario.PK_id
        JOIN tbl_horariomateria
        ON tbl_horariomateria.FK_HorarioId = tbl_horario.PK_id
        JOIN tbl_grupomaterias
        ON tbl_horariomateria.FK_GrupoMateriaId = tbl_grupomaterias.PK_id
        JOIN tbl_grupos
        ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
        JOIN tbl_cursos
        ON tbl_grupos.`FK_ curso` = tbl_cursos.PK_id
        JOIN tbl_materias
        ON tbl_horariomateria.FK_HorarioId = tbl_materias.PK_id
        JOIN tbl_docente
        ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id
        JOIN tbl_usuarios
        ON tbl_docente.FK_usuario = tbl_usuarios.PK_id
        JOIN tbl_colegios
        ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
        "));
        return view('Wennec.estudiante.estudiante-horario',compact('horario'));
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
        TBL_Colegios.id as idColegio
        FROM
        TBL_Usuarios
        JOIN TBL_Colegios
        ON TBL_Usuarios.FK_ColegioId = TBL_Colegios.id
        WHERE TBL_Usuarios.PK_id = $iduser"));

        foreach ($colegioUsers as $colegioUser) {
             $id = $colegioUser->idColegio;
        }

        $atributos = $request->only(
            'name',
            'email',
            'password',
            'FK_RolesId'
        );

        
        User::create([
            'FK_ColegioId' => $id
        ]);
        
        $user = new User($atributos);
        $user->password = bcrypt($user->password);
        
        $user->save();
        $user->notify(new UsuarioCreado($request->password));
        return redirect()->route('usuariosC.index')->with('success','Usuario Creado Correctamente');
        return $user;
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
