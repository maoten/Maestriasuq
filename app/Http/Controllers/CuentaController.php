<?php
namespace App\Http\Controllers;
use App\Certificado;
use App\Http\Requests;
use App\Http\Requests\CertificadoRequest;
use App\Http\Requests\CuentaRequest;
use App\Http\Requests\PasswordRequest;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
class CuentaController extends Controller
{
    public $student='estudiante';
    public $studentC='estudiante.cuenta';
    public $directorG='director_grado';
    public $directorC='director.cuenta';
    public $consejoC='consejo_curicular';
    public $consejoCu='consejo.cuenta';
    public $jurado='jurado';
    public $juradoC='jurado.cuenta';
    public $administrador='admin';
    public $administradorC='admin.cuenta';
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
        $ruta = '';
        switch ($user->rol) {
            case $this->student:
                $ruta = $this->studentC;
                break;
            case $this->directorG:
                $ruta = $this->directorC;
                break;
            case $this->consejoC:
                $ruta = $this->consejoCu;
                break;
            case $this->jurado:
                $ruta = $this->juradoC;
                break;
            case $this->administrador:
                $ruta = $this->administradorC;
                break;
            default:
                break;
        }
        return redirect()->route($ruta);
    }
    /**
     * Guarda el certificado de inglés del usuario indicado.
     *
     * @param CertificadoRequest|CuentaRequest|Request $request
     * @param  int                                     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function certificado(CertificadoRequest $request, $id)
    {
        /** @var User $user */
        $user = User::find($id);
        $certificado1 = Certificado::where('user_id', $user->id)->first();
        if ($request->file('certificado')) {
            $file = $request->file('certificado');
            $name = 'maestriauq_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\sistema\certificados';
            $file->move($path, $name);
        }
        if ($certificado1 == null) {
            $certificado         = new Certificado();
            $certificado->nombre = '/sistema/certificados/' . $name;
            $certificado->user()->associate($user);
            $certificado->save();
        } else {
            $certificado1->nombre = '/sistema/certificados/' . $name;
            $certificado1->save();
        }
        Flash::warning("Se ha guardado el certificado de forma exitosa.");
        $ruta = '';
        switch ($user->rol) {
            case $this->student:
                $ruta = $this->studentC;
                break;
            case $this->directorG:
                $ruta = $this->directorC;
                break;
            case $this->consejoC:
                $ruta = $this->consejoCu;
                break;
            case $this->jurado:
                $ruta = $this->juradoC;
                break;
            case $this->administrador:
                $ruta = $this->administradorC;
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
        $ruta = '';
        switch ($user->rol) {
            case $this->student:
                $ruta = $this->studentC;
                break;
            case $this->directorG:
                $ruta = $this->directorC;
                break;
            case $this->consejoC:
                $ruta = $this->consejoCu;
                break;
            case $this->jurado:
                $ruta = $this->juradoC;
                break;
            case $this->administrador:
                $ruta = $this->administradorC;
                break;
            default:
                break;
        }
        return redirect()->route($ruta);
    }
}