<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Container\Wennec\Src\Requests\NoticiaRequest;
use App\Container\Wennec\Src\User;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Roles;
use App\Container\Wennec\Src\Noticias;
use App\Container\Wennec\Src\Notifications\UsuarioCreado;
use Illuminate\Support\Facades\DB;


class AdminNoticiaController extends Controller
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
      $notices =
      DB::select(DB::raw("SELECT
        tbl_noticias.imagenNoticia,
        tbl_noticias.tipoNoticia,
        tbl_noticias.descripcion,
        tbl_noticias.fechaInicio,
        tbl_noticias.fechaFin
        FROM
        tbl_noticias
        INNER JOIN tbl_colegios ON tbl_noticias.FK_ColegioId = tbl_colegios.id
        WHERE tbl_colegios.id = $id"));
        return view('Wennec.admin.administrador-noticias',compact('notices'));
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
      public function store(NoticiaRequest $request)
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
          $url = "";
          if ($request->hasFile('imagenNoticia')) {
            $url = "Noticia".'.'.time().'.'.$request->imagenNoticia->getClientOriginalExtension();
            $request->imagenNoticia->move(public_path('Noticias'), $url);
          } else {
            if ('url' == null) {
              $url = "";
            }
          }
          Noticias::create([
            'tipoNoticia' => $request['tipoNoticia'],
            'imagenNoticia' => $url,
            'descripcion' => $request['descripcion'],
            'fechaInicio' => $request['fechaInicio'],
            'fechaFin' => $request['fechaFin'],
            'FK_ColegioId' => $id,
          ]);
          return redirect()->route('noticiasA.index')->with('success','Noticia Creada Correctamente');
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
