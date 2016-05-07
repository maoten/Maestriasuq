<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EditarUserRequest;
use App\Http\Requests\UserRequest;
use App\Notificacion;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class DirectoresController extends Controller
{
    public $rutaAdmin='admin.directores.index';
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $directores = User::where('rol', 'director_grado')->search($request->nombre)->orderBy('id',
            'ASC')->paginate(10);

        return view($this->rutaAdmin)->with('directores', $directores);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.directores.registrar');

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

        $name = 'user.jpg';

        $director = new User($request->all());
        if ( ! empty( $request->password )) {
            $director->password = bcrypt($request->password);
        }
        $director->rol    = 'director_grado';
        $director->imagen = '/sistema/usuarios/' . $name;
        $director->save();

        $notificacion = new Notificacion();
        $notificacion->notificarRegistro($director);

        Flash::success("Se ha registrado " . $director->nombre . " de forma exitosa");

        return redirect()->route($this->rutaAdmin);
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
        $director = User::find($id);

        return view('admin.directores.editar')->with('director', $director);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param EditarUserRequest|Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditarUserRequest $request, $id)
    {
        $director              = User::find($id);
        $director->nombre      = $request->nombre;
        $director->cc          = $request->cc;
        $director->telefono    = $request->telefono;
        $director->profesion   = $request->profesion;
        $director->universidad = $request->universidad;
        $director->email       = $request->email;
        $director->save();
        Flash::warning("El director " . $director->nombre . " ha sido editado");

        return redirect()->route($this->rutaAdmin);
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

        $director = User::find($id);
        $director->delete();
        Flash::error("Se ha eliminado " . $director->nombre . " de forma exitosa");

        return redirect()->route($this->rutaAdmin);
    }
}
