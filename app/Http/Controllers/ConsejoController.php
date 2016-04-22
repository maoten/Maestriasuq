<?php

namespace App\Http\Controllers;

use App\Coordinador;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Notificacion;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ConsejoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $consejo = User::where('rol', 'consejo_curricular')->search($request->nombre)->orderBy('id',
            'ASC')->paginate(10);

        return view('admin.consejo.index')->with('consejo', $consejo);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.consejo.registrar');

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

        $consejo = new User($request->all());
        if ( ! empty( $request->password )) {
            $consejo->password = bcrypt($request->password);
        }
        $consejo->rol    = 'consejo_curricular';
        $consejo->imagen = '/imagenes/usuarios/' . $name;
        $consejo->save();

        if ( ! empty( $request->check )) {
            if ($request->check == '1') {
                $coordinador          = new Coordinador();
                $coordinador->user_id = $consejo->id;
                if ( ! empty( $request->coor )) {
                    $coordinador->enf_id = $request->coor;
                }
                $coordinador->save();

            }
        }

        $notificacion = new Notificacion();
        $notificacion->notificarRegistro($consejo);

        Flash::success("Se ha registrado " . $consejo->nombre . " de forma exitosa");

        return redirect()->route('admin.consejo.index');
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
        $consejo = User::find($id);

        return view('admin.consejo.editar')->with('consejo', $consejo);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $consejo              = User::find($id);
        $consejo->nombre      = $request->nombre;
        $consejo->cc          = $request->cc;
        $consejo->telefono    = $request->telefono;
        $consejo->profesion   = $request->profesion;
        $consejo->universidad = $request->universidad;
        $consejo->email       = $request->email;
        $consejo->save();
        Flash::warning("El miembro del consejo curricular " . $consejo->nombre . " ha sido editado");

        return redirect()->route('admin.consejo.index');
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
        $consejo = User::find($id);
        $consejo->delete();
        Flash::error("Se ha eliminado " . $consejo->nombre . " de forma exitosa");

        return redirect()->route('admin.consejo.index');
    }
}
