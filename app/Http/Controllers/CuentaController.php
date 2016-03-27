<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Image;
use Laracasts\Flash\Flash;
use App\Http\Requests\CuentaRequest;
use App\Http\Requests\PasswordRequest;


class CuentaController extends Controller
{  


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CuentaRequest $request, $id)
    {
        $user=User::find($id);
        $user->telefono=$request->telefono;
        $user->email=$request->email;

        if($request->file('imagen')){
            $file=$request->file('imagen');
            $name='maestriauq_' . time() . '.' . $file->getClientOriginalExtension();
            $path=public_path().'\imagenes\usuarios';
            $file->move($path,$name);

            $user->imagen='/imagenes/usuarios/'.$name; 
            $user->save();
            $image=new Image();
            $image->nombre=$name;
            $image->user()->associate($user);
            $image->save();
        }else{
            $user->save();
        }

        Flash::warning("Los datos han sido actualizados");

        if ($user->rol=='admin') {
            return redirect()->route('admin.cuenta');
        }else if ($user->rol=='estudiante') {
            return redirect()->route('estudiante.cuenta');
        }else if ($user->rol=='director_grado') {
            return redirect()->route('director.cuenta');
        }else if ($user->rol=='consejo_curricular') {
            return redirect()->route('consejo.cuenta');
        }else if ($user->rol=='jurado') {
            return redirect()->route('jurado.cuenta');
        }

    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updatePassword(PasswordRequest $request, $id)
     {
         $user=User::find($id);
         $user->password=bcrypt($request->password);
         $user->save();
         Flash::warning("La contraseña ha sido actualizada");

         if ($user->rol=='admin') {
            return redirect()->route('admin.cuenta');
        }else if ($user->rol=='estudiante') {
            return redirect()->route('estudiante.cuenta');
        }else if ($user->rol=='director_grado') {
            return redirect()->route('director.cuenta');
        }else if ($user->rol=='consejo_curricular') {
            return redirect()->route('consejo.cuenta');
        }else if ($user->rol=='jurado') {
            return redirect()->route('jurado.cuenta');
        } 
        
    }

}
