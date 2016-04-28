<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CuentaRequest;
use App\Http\Requests\PasswordRequest;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CuentaController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param CuentaRequest|Request $request
     * @param  int                  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CuentaRequest $request, $id)
    {
        /** @var User $user */
        $user           = User::find($id);
        $user->telefono = $request->telefono;
        $user->email    = $request->email;

        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $name = 'maestriauq_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\sistema\usuarios';
            $file->move($path, $name);

            $user->imagen = '/sistema/usuarios/' . $name;
            $user->save();
            $image         = new Image();
            $image->nombre = $name;
            $image->user()->associate($user);
            $image->save();
        } else {
            $user->save();
        }

        Flash::warning("Los datos han sido actualizados");

        if ($user->rol == 'admin') {
            return redirect()->route('admin.cuenta');
        } else {
            if ($user->rol == 'estudiante') {
                return redirect()->route('estudiante.cuenta');
            } else {
                if ($user->rol == 'director_grado') {
                    return redirect()->route('director.cuenta');
                } else {
                    if ($user->rol == 'consejo_curricular') {
                        return redirect()->route('consejo.cuenta');
                    } else {
                        if ($user->rol == 'jurado') {
                            return redirect()->route('jurado.cuenta');
                        }
                    }
                }
            }
        }

        return false;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param PasswordRequest|Request $request
     * @param  int                    $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(PasswordRequest $request, $id)
    {
        /** @var User $user */
        $user = User::find($id);
        if ( ! empty( $request->password )) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        Flash::warning("La contraseña ha sido actualizada");

        if ($user->rol == 'admin') {
            return redirect()->route('admin.cuenta');
        } else {
            if ($user->rol == 'estudiante') {
                return redirect()->route('estudiante.cuenta');
            } else {
                if ($user->rol == 'director_grado') {
                    return redirect()->route('director.cuenta');
                } else {
                    if ($user->rol == 'consejo_curricular') {
                        return redirect()->route('consejo.cuenta');
                    } else {
                        if ($user->rol == 'jurado') {
                            return redirect()->route('jurado.cuenta');
                        }
                    }
                }
            }
        }

        return false;
    }

}
