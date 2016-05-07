<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EditarUserRequest;
use App\Http\Requests\UserRequest;
use App\Notificacion;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class EstudiantesController extends Controller
{
    public $student='estudiante';
    public $rutaStudent='admin.estudiantes.index';
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $estudiantes = User::where('rol',$this->student )->search($request->nombre)->orderBy('id', 'ASC')->paginate(10);

        return view($this->rutaStudent)->with('estudiantes', $estudiantes);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.estudiantes.registrar');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $name       = 'user.jpg';
        $estudiante = new User($request->all());
        if ( ! empty( $request->password )) {
            $estudiante->password = bcrypt($request->password);
        }
        $estudiante->rol    = $this->student;
        $estudiante->imagen = '/sistema/usuarios/' . $name;
        $estudiante->save();

        $notificacion = new Notificacion();
        $notificacion->notificarRegistro($estudiante);

        Flash::success("Se ha registrado " . $estudiante->nombre . " de forma exitosa");

        return redirect()->route($this->rutaStudent);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = User::find($id);

        return view('admin.estudiantes.editar')->with($this->student, $estudiante);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param EditarUserRequest|UserRequest|Request $request
     * @param  int                                  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditarUserRequest $request, $id)
    {
        $estudiante              = User::find($id);
        $estudiante->nombre      = $request->nombre;
        $estudiante->cc          = $request->cc;
        $estudiante->telefono    = $request->telefono;
        $estudiante->profesion   = $request->profesion;
        $estudiante->universidad = $request->universidad;
        $estudiante->email       = $request->email;
        $estudiante->save();
        Flash::warning("El estudiante " . $estudiante->nombre . " ha sido editado");

        return redirect()->route($this->rutaStudent);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = User::find($id);
        $estudiante->delete();
        Flash::error("Se ha eliminado " . $estudiante->nombre . " de forma exitosa");

        return redirect()->route($this->rutaStudent);
    }
}
