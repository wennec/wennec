<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\ActividadTemporal;
use App\Container\Wennec\Src\User;
use App\Container\Wennec\Src\Roles;
use App\Container\Wennec\Src\Requests\FormatoStoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Container\Wennec\Src\Notifications\PlazoTemporalCreado;
use Illuminate\Support\Facades\Notification;

class AyudActiTempoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$plazos = ActividadTemporal::all();
        $plazos = ActividadTemporal::with('departamento')->get();
        return view('Wennec.ayudante.ayudante-activTemporal',compact('plazos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependencias = Departamento::all();
        return view('Wennec.ayudante.ayudante-crearActivTempo',compact('dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormatoStoreRequest $request)
    {
      
        $url = "";
        if ($request->hasFile('url')) {
          $url = "Formato".'.'.time().'.'.$request->url->getClientOriginalExtension();
          $request->url->move(public_path('Ayudante/Formatos'), $url);
        } else {
          if ('url' == null) {
            $url = "";
          }
        }
        $actividad = new ActividadTemporal;
        $actividad::create([
            'nombre' => $request['nombre'],
            //'observacion' => $request['observacion'],
            'FK_DepartamentoId' => $request['FK_DepartamentoId'],
            'tipo_entrega' => $request['tipoEntrega'],
            'tipo_dia' => $request['tipoDia'],
            'Num_Dia' => $request['num_dia'],
            'fecha' => $request['fechaD'],
            'hora' => $request['horaD'],
            'url' => $url,
        ]);
        $rol = new Roles;
        $rol = $rol->find(2);
        $rol = $rol->usuarios()->get();
        Notification::send($rol, new PlazoTemporalCreado($request->nombre));
        return redirect('/activtemporal')->with('success','Actividad Temporal Creado Correctamente'); 
        return $rol;
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
    public function destroy($id)
    {
        $plazo = ActividadTemporal::find($id);
        Storage::disk('formatos')->delete($plazo->url);
        $plazo->delete();
        return redirect('/activtemporal')->with('error','Formato Eliminado Correctamente');
    }
}
