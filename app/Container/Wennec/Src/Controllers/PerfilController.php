<?php

namespace App\Container\Wennec\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Wennec\Src\Requests\PerfilUpdateRequest;
use App\Container\Wennec\Src\Requests\PerfilPasswordRequest;
use App\Container\Wennec\Src\Requests\PerfilFotoRequest;
use App\Container\Wennec\Src\User;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Wennec.global.perfil');
    }

    public function update(PerfilUpdateRequest $request)
    {
        $user = $request->user();
        $user->fill($request->all());
        $user->save();
        $request->session()->flash('mensaje', __('perfil.actualizado'));
        return back();
    }

    public function updatePassword(PerfilPasswordRequest $request){

        $user = auth()->user();
        
        if (Hash::check($request->pass_actual, $user->password)) {
            $user->password = bcrypt($request->pass_new);
            $user->save();
            $request->session()->flash('mensaje', __('perfil.contraseña_exito'));
        } else {
            $request->session()->flash('error', __('perfil.contraseña_error'));
        }
        return back();
    }
    public function fotoUp(PerfilFotoRequest $request)
    {
        $user = $request->user();
        $user->foto = "FotoP".'.'.time().'.'.$request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('Foto/Usuarios'), $user->foto);
        $user->save();
        $request->session()->flash('mensaje', __('perfil.foto_exito'));
        return back();
    }
}
