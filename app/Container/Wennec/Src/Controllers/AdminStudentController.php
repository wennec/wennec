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
        TBL_Colegios.id as idColegio
        FROM
        TBL_Usuarios
        JOIN TBL_Colegios
        ON TBL_Usuarios.FK_ColegioId = TBL_Colegios.id
        WHERE TBL_Usuarios.PK_id = $iduser"));

        foreach ($colegioUsers as $colegioUser) {
             $id = $colegioUser->idColegio;
        }

        $students = 
        DB::select(DB::raw("SELECT
        TBL_Usuarios.name as nameUser,
        TBL_Roles.nombre as nameRol,
        TBL_Colegios.nombre as nameColegio
        FROM
        TBL_Usuarios
        JOIN TBL_Roles ON TBL_Usuarios.FK_RolesId = TBL_Roles.id 
        JOIN TBL_Colegios ON TBL_Usuarios.FK_ColegioId = TBL_Colegios.id
        WHERE TBL_Colegios.id = $id AND TBL_Roles.nombre = 'Estudiante'"));
        return view('Wennec.admin.administrador-estudiante',compact('students'));
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
