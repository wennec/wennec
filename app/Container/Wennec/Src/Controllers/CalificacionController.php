<?php
namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Requests\EventoStoreRequest;
use App\Container\Wennec\Src\CalificacionEstudiante;
use App\Container\Wennec\Src\Periodo;
use App\Container\Wennec\Src\Logro;
use App\Container\Wennec\Src\Requests\RequestOnly;
use Illuminate\Support\Facades\DB;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function store(RequestOnly $request)
    {
        $logro = $request['FK_Logro'];
        CalificacionEstudiante::create([
            'calificacion' => $request['calificacion'],
            'FK_Logro' => $request['FK_Logro'],
            'FK_Estudiante' => $request['FK_Estudiante'],
        ]);
        return redirect('/grupoEstudiantes/' .$logro. '/grupoEstudiantes')->with('success','Calificación Registrada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $calificacionEstudiante = CalificacionEstudiante::findOrFail($id);
      return view('Wennec.docente.docente-editarcalificacion', [
          'calificacionesEstudiante' => $calificacionEstudiante,
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
        $calificacionEstudiante = CalificacionEstudiante::find($id);
        $calificacionEstudiante->fill($request->all());
        $calificacionEstudiante->save();
        return redirect('/grupoEstudiantes/' .$request['FK_Logro']. '/grupoEstudiantes')->with('success','Calificación Modificada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
