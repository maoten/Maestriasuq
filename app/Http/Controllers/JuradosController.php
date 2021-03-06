<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EditarUserRequest;
use App\Http\Requests\EditarJuradoRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\JuradoRequest;
use App\Jurado;
use App\Notificacion;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class JuradosController extends Controller
{

    public $juradoC = 'jurado';

    public $rutaJurado = 'admin.jurados.index';


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jurado = User::where('rol', $this->juradoC)->search($request->nombre)->orderBy('id', 'ASC')->paginate(10);

        return view($this->rutaJurado)->with('jurados', $jurado);

    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJurados(Request $request)
    {
        $jurado = User::where('rol', $this->juradoC)->search($request->nombre)->orderBy('id', 'ASC')->paginate(10);

        return view('consejo.jurados.index')->with('jurados', $jurado);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jurados.registrar');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(JuradoRequest $request)
    {

        $name = 'user.jpg';

        $jurado = new User($request->all());
        if ( ! empty( $request->password )) {
            $jurado->password = bcrypt($request->password);
        }
        $jurado->rol    = $this->juradoC;
        $jurado->imagen = '/sistema/usuarios/' . $name;
        $jurado->save();

        $jurad          = new Jurado();
        $jurad->user_id = $jurado->id;
        $jurad->pasaporte = $request->pasaporte;
        if ( ! empty( $request->pais )) {
            $jurad->pais_id = $request->pais;
        }
        $jurad->save();

        $notificacion = new Notificacion();
        $notificacion->notificarRegistro($jurado);

        Flash::success("Se ha registrado " . $jurado->nombre . " de forma exitosa");

        return redirect()->route($this->rutaJurado);
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
        $jurado = User::find($id);

        return view('admin.jurados.editar')->with($this->juradoC, $jurado);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param EditarUserRequest|Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditarJuradoRequest $request, $id)
    {
        $jurado              = User::find($id);
        $jurado->nombre      = $request->nombre;
        $jurado->cc          = $request->cc;
        $jurado->telefono    = $request->telefono;
        $jurado->profesion   = $request->profesion;
        $jurado->universidad = $request->universidad;
        $jurado->email       = $request->email;
        $jurado->save();

        $jurad = Jurado::where('user_id', $id)->first();
        $jurad->pasaporte = $request->pasaporte;
        $jurad->save();
        Flash::warning("El jurado " . $jurado->nombre . " ha sido editado");

        return redirect()->route($this->rutaJurado);
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
        $jurado = User::find($id);
        $jurado->delete();
        Flash::error("Se ha eliminado " . $jurado->nombre . " de forma exitosa");

        return redirect()->route($this->rutaJurado);

    }
}
