<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Colegio;
use App\Container\Wennec\Src\Actividad;
use App\Container\Wennec\Src\User;
use Khill\Lavacharts\Lavacharts;
use Charts;

class EstadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $chartUser = Charts::database(User::all(), 'bar', 'highcharts')
            ->title('Usuarios Registrados')
            ->dimensions(900,500)
            ->responsive(true)
             ->elementLabel("Total usuarios")
            ->groupBy('name');

        $chartDepar = Charts::database(Colegio::all(), 'pie', 'highcharts')
            ->title('Departamentos Registrados')
            ->dimensions(900,500)
            ->responsive(true)
             ->elementLabel("Total Departamentos")
            ->groupBy('nombre');

        $chartActi = Charts::database(Colegio::all(), 'area', 'highcharts')
            ->title('Actividades Registradas')
            ->dimensions(900,500)
            ->responsive(true)
             ->elementLabel("Total Actividades")
            ->groupBy('nombre');
        

                return view('Wennec.super-admin.super-admin-estadistica',[
                        'chartUser' => $chartUser,
                        'chartDepar' => $chartDepar,
                        'chartActi' => $chartActi,]);
                
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
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
    public function destroy()
    {
      // 
    }
}
