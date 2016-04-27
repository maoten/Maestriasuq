<?php
namespace App\Http\Controllers;

use App\Evento;
use App\Http\Requests;
use Illuminate\Http\Request;

//use App\Http\Requests\CalendarioRequest;

class CalendarioController extends Controller
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

        $calendario = Evento::all();

        return view('admin.calendario.index')->with('calendario', $calendario);

    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEstudiante(Request $request)
    {
<<<<<<< HEAD

        $calendario = Evento::all();

        return view('estudiante.calendario.index')->with('calendario', $calendario);
=======
>>>>>>> origin/master

        $calendario = Evento::all();

<<<<<<< HEAD
     /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDirector(Request $request)
    {

        $calendario = Evento::all();

        return view('director.calendario.index')->with('calendario', $calendario);

=======
        return view('estudiante.calendario.index')->with('calendario', $calendario);

>>>>>>> origin/master
    }

     /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function indexConsejo(Request $request)
=======
    public function indexDirector(Request $request)
>>>>>>> origin/master
    {

        $calendario = Evento::all();

<<<<<<< HEAD
        return view('consejo.calendario.index')->with('calendario', $calendario);
=======
        return view('director.calendario.index')->with('calendario', $calendario);
>>>>>>> origin/master

    }

}
