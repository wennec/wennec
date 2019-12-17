<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function elite()
    {
        return view('Wennec.landing.index');
    }

    public function silver()
    {
        return view('Wennec.landing.silver');
    }

    public function diamond()
    {
        return view('Wennec.landing.diamond');
    }

    public function contacto()
    {
        return view('Wennec.landing.contacto');
    }

    public function planes()
    {
        return view('Wennec.landing.planes');
    }
}
