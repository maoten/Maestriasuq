<?php
namespace App\Http\Controllers;

use App\Evento;
use App\Http\Requests;
use Illuminate\Http\Request;



class CalendarioController extends Controller
{
    public $calendar='calendario';
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

        return view('admin.calendario.index')->with($this->calendar, $calendario);

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

        $calendario = Evento::all();

        return view('estudiante.calendario.index')->with($this->calendar, $calendario);

    }


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

        return view('director.calendario.index')->with($this->calendar, $calendario);

    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexConsejo(Request $request)
    {

        $calendario = Evento::all();

        return view('consejo.calendario.index')->with($this->calendar, $calendario);

    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJurado(Request $request)
    {

        $calendario = Evento::all();

        return view('jurado.calendario.index')->with($this->calendar, $calendario);

    }

}
