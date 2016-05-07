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
        $ruta;
        switch ($user->rol){
            case 'estudiante':
                $ruta='estudiante.cuenta';
                break;
            case 'director_grado':
                $ruta='director.cuenta';
                break;
            case 'consejo_curicular':
                $ruta='consejo.cuenta';
                break;
            case 'jurado':
                $ruta='jurado.cuenta';
                break;
            case 'admin':
                $ruta='admin.cuenta';
                break;
            default:
                break;
        }
        return redirect()->route($ruta);
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

        $ruta;
        switch ($user->rol){
            case 'estudiante':
                $ruta='estudiante.cuenta';
                break;
            case 'director_grado':
                $ruta='director.cuenta';
                break;
            case 'consejo_curicular':
                $ruta='consejo.cuenta';
                break;
            case 'jurado':
                $ruta='jurado.cuenta';
                break;
            case 'admin':
                $ruta='admin.cuenta';
                break;
            default:
                break;
        }
        return redirect()->route($ruta);
    }

}
