<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::to('login');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*
|--------------------------------------------------------------------------
| ruta de configuración de la cuenta // cambiar web por auth 
|--------------------------------------------------------------------------
*/

Route::group([ \App\Http\Constantes::$midd => [ 'web', 'throttle:30' ] ], function () {
    Route::auth();

});

/*
|--------------------------------------------------------------------------
| ruta del panel de administrador 
|--------------------------------------------------------------------------
*/

Route::group([ \App\Http\Constantes::$midd   => [ 'web', 'role:admin', 'throttle:30' ],
               \App\Http\Constantes::$prefix => 'admin'
], function () {

    Route::get('/', [
        'as' => 'admin.index',
        function () {
            return view('admin.index');
        }
    ]);

    //======== opciones de la cuenta ==========//
    Route::get(\App\Http\Constantes::$cuent, [
        'as' => 'admin.cuenta',
        function () {
            return view('admin.cuenta.index');
        }
    ]);
    Route::get(\App\Http\Constantes::$help, [
        'as' => 'admin.ayuda',
        function () {
            return view('admin.cuenta.ayuda');
        }
    ]);
    Route::post(\App\Http\Constantes::$cuentaid,
        [ 'uses' => \App\Http\Constantes::$cuentaCont, 'as' => 'admin.cuenta.update' ]);
    Route::post(\App\Http\Constantes::$passw,
        [ 'uses' => \App\Http\Constantes::$passwUpdate, 'as' => 'admin.password.update' ]);

    //======== opciones de los estudiantes ==========//
    Route::resource('estudiantes', 'EstudiantesController');
    Route::get('estudiantes/{id}/destroy',
        [ 'uses' => 'EstudiantesController@destroy', 'as' => 'admin.estudiantes.destroy' ]);
    Route::get('estudiantes/{id}/update',
        [ 'uses' => 'EstudiantesController@update', 'as' => 'admin.estudiantes.update' ]);

    //======== opciones de los jurados ==========//
    Route::resource('jurados', 'JuradosController');
    Route::get('jurados/{id}/destroy', [ 'uses' => 'JuradosController@destroy', 'as' => 'admin.jurados.destroy' ]);
    Route::get('jurados/{id}/update', [ 'uses' => 'JuradosController@update', 'as' => 'admin.jurados.update' ]);

    //======== opciones de los directores de grado ==========//
    Route::resource('directores', 'DirectoresController');
    Route::get('directores/{id}/destroy',
        [ 'uses' => 'DirectoresController@destroy', 'as' => 'admin.directores.destroy' ]);
    Route::get('directores/{id}/update',
        [ 'uses' => 'DirectoresController@update', 'as' => 'admin.directores.update' ]);

    //======== opciones del consejo curricular ==========//
    Route::resource('consejo', 'ConsejoController');
    Route::get('consejo/{id}/destroy', [ 'uses' => 'ConsejoController@destroy', 'as' => 'admin.consejo.destroy' ]);
    Route::get('consejo/{id}/update', [ 'uses' => 'ConsejoController@update', 'as' => 'admin.consejo.update' ]);

    //======== opciones de las propuestas ==========//
    Route::resource(\App\Http\Constantes::$propuest, \App\Http\Constantes::$propuestaC);
    Route::get(\App\Http\Constantes::$propuests,
        [ 'uses' => 'PropuestaController@indexPropuestas', 'as' => 'admin.propuestas.index' ]);
    Route::get(\App\Http\Constantes::$verPropuest,
        [ 'uses' => 'PropuestaController@showPropuestaAdmin', 'as' => 'admin.propuesta.ver' ]);
    Route::get('propuesta/{id}/citacion',
        [ 'uses' => 'PropuestaController@showCitacion', 'as' => 'admin.propuesta.citacion' ]);

    //======== opciones de las acciones con las propuestas ==========//
    Route::get('propuesta/{id}/asignarJurados',
        [ 'uses' => 'AdministradorController@asignarJurados', 'as' => 'admin.propuesta.asignarJurados' ]);
    Route::get('propuesta/{id}/citar', [ 'uses' => 'AdministradorController@citar', 'as' => 'admin.propuesta.citar' ]);
    Route::get('propuesta/{id}/cancelarCitacion',
        [ 'uses' => 'AdministradorController@cancelarCitacion', 'as' => 'admin.propuesta.cancelarCitacion' ]);

    //======== opciones de los trabajos de grado ==========//
    Route::resource(\App\Http\Constantes::$trabajograd, \App\Http\Constantes::$trabajogradoC);
    Route::get(\App\Http\Constantes::$trabajosgrado,
        [ 'uses' => 'TrabajogradoController@indexTrabajosgrado', 'as' => 'admin.trabajosgrado.index' ]);
    Route::get(\App\Http\Constantes::$verTrabajograd,
        [ 'uses' => 'TrabajogradoController@showTrabajogradoAdmin', 'as' => 'admin.trabajogrado.ver' ]);
    Route::get('trabajogrado/{id}/citacion',
        [ 'uses' => 'TrabajogradoController@showCitacion', 'as' => 'admin.trabajogrado.citacion' ]);

    //======== opciones de las acciones de los trabajos de grado ==========//
    Route::get('trabajogrado/{id}/asignarJurados', [
        'uses' => 'AdministradorController@asignarJuradosTrabajogrado',
        'as'   => 'admin.trabajogrado.asignarJurados'
    ]);
    Route::get('trabajogrado/{id}/citar',
        [ 'uses' => 'AdministradorController@citarTrabajogrado', 'as' => 'admin.trabajogrado.citar' ]);
    Route::get('trabajogrado/{id}/cancelarCitacion', [
        'uses' => 'AdministradorController@cancelarCitacionTrabajogrado',
        'as'   => 'admin.trabajogrado.cancelarCitacion'
    ]);

    //======== opciones del calendario ==========//
    Route::resource(\App\Http\Constantes::$calendar, 'CalendarioController');

});
/*
|--------------------------------------------------------------------------
| rutas del estudiante 
|--------------------------------------------------------------------------
*/

Route::group([
    \App\Http\Constantes::$midd   => [ 'web', 'role:estudiante', 'throttle:30' ],
    \App\Http\Constantes::$prefix => 'estudiante'
], function () {

    Route::get('/', [
        'as' => 'estudiante.index',
        function () {
            return view('estudiante.index');
        }
    ]);

    //======== opciones de la cuenta ==========//
    Route::get(\App\Http\Constantes::$cuent, [
        'as' => 'estudiante.cuenta',
        function () {
            return view('estudiante.cuenta.index');
        }
    ]);
    Route::get(\App\Http\Constantes::$help, [
        'as' => 'estudiante.ayuda',
        function () {
            return view('estudiante.cuenta.ayuda');
        }
    ]);
    Route::post(\App\Http\Constantes::$cuentaid,
        [ 'uses' => \App\Http\Constantes::$cuentaCont, 'as' => 'estudiante.cuenta.update' ]);
    Route::post(\App\Http\Constantes::$passw,
        [ 'uses' => \App\Http\Constantes::$passwUpdate, 'as' => 'estudiante.password.update' ]);
    Route::post(\App\Http\Constantes::$certificadoid,
        [ 'uses' => \App\Http\Constantes::$cuentaContr, 'as' => 'estudiante.cuenta.certificado' ]);

    //======== opciones de la propuesta ==========//
    Route::resource(\App\Http\Constantes::$propuest, 'PropuestaController');
    Route::get(\App\Http\Constantes::$verPropuest,
        [ 'uses' => 'PropuestaController@showPropuesta', 'as' => 'estudiante.propuesta.ver' ]);
    Route::get('seguimiento/{id}',
        [ 'uses' => 'PropuestaController@showSeguimiento', 'as' => 'estudiante.propuesta.seguimiento' ]);
    Route::post('propuesta/{id}/update',
        [ 'uses' => 'PropuestaController@update', 'as' => 'estudiante.propuesta.update' ]);

    //======== opciones de los trabajos de grado ==========//
    Route::resource(\App\Http\Constantes::$trabajograd, 'TrabajogradoController');
    Route::get(\App\Http\Constantes::$verTrabajograd,
        [ 'uses' => 'TrabajogradoController@showTrabajogrado', 'as' => 'estudiante.trabajogrado.ver' ]);
    Route::get('seguimientotrabajogrado/{id}',
        [ 'uses' => 'TrabajogradoController@showSeguimiento', 'as' => 'estudiante.trabajogrado.seguimiento' ]);
    Route::post('trabajogrado/{id}/update',
        [ 'uses' => 'TrabajogradoController@update', 'as' => 'estudiante.trabajogrado.update' ]);

    //======== opciones de los documentos ==========//
    Route::get(\App\Http\Constantes::$comments, [
        'as' => 'estudiante.documentos.index',
        function () {
            return view('estudiante.documentos.index');
        }
    ]);

    //======== opciones de las notificaciones ==========//
    Route::get(\App\Http\Constantes::$notifications, [
        'as' => 'estudiante.notificaciones.index',
        function () {
            return view('estudiante.notificaciones.index');
        }
    ]);

    Route::get(\App\Http\Constantes::$notificationsA,
        [ 'uses' => \App\Http\Constantes::$notificationC, 'as' => 'estudiante.notificaciones.archivar' ]);

    //======== opciones del calendario ==========//
    Route::get(\App\Http\Constantes::$calendar,
        [ 'uses' => 'CalendarioController@indexEstudiante', 'as' => 'estudiante.calendario.index' ]);

});
/*
|--------------------------------------------------------------------------
| rutas del director de grado 
|--------------------------------------------------------------------------
*/

Route::group([
    \App\Http\Constantes::$midd   => [ 'web', 'role:director_grado', 'throttle:30' ],
    \App\Http\Constantes::$prefix => 'director'
], function () {

    Route::get('/', [
        'as' => 'director.index',
        function () {
            return view('director.index');
        }
    ]);
    //======== opciones de la cuenta ==========//
    Route::get(\App\Http\Constantes::$cuent, [
        'as' => 'director.cuenta',
        function () {
            return view('director.cuenta.index');
        }
    ]);
    Route::get(\App\Http\Constantes::$help, [
        'as' => 'director.ayuda',
        function () {
            return view('director.cuenta.ayuda');
        }
    ]);
    Route::post(\App\Http\Constantes::$cuentaid,
        [ 'uses' => \App\Http\Constantes::$cuentaCont, 'as' => 'director.cuenta.update' ]);
    Route::post(\App\Http\Constantes::$passw,
        [ 'uses' => \App\Http\Constantes::$passwUpdate, 'as' => 'director.password.update' ]);

    //======== opciones de la propuesta ==========//
    Route::resource(\App\Http\Constantes::$propuest, \App\Http\Constantes::$propuestaC);
    Route::get(\App\Http\Constantes::$propuests,
        [ 'uses' => 'PropuestaController@indexPropuestasDir', 'as' => 'director.propuestas.index' ]);
    Route::get(\App\Http\Constantes::$verPropuest,
        [ 'uses' => 'PropuestaController@showPropuestaDir', 'as' => 'director.propuesta.ver' ]);

    //======== opciones del trabajo de grado ==========//
    Route::resource(\App\Http\Constantes::$trabajograd, \App\Http\Constantes::$trabajogradoC);
    Route::get(\App\Http\Constantes::$trabajosgrado,
        [ 'uses' => 'TrabajoGradoController@indexTrabajosgradoDir', 'as' => 'director.trabajosgrado.index' ]);
    Route::get(\App\Http\Constantes::$verTrabajograd,
        [ 'uses' => 'TrabajogradoController@showTrabajogradoDir', 'as' => 'director.trabajogrado.ver' ]);

    //======== opciones de los documentos ==========//
    Route::get(\App\Http\Constantes::$comments, [
        'as' => 'director.documentos.index',
        function () {
            return view('director.documentos.index');
        }
    ]);

    //======== opciones de las notificaciones ==========//
    Route::get(\App\Http\Constantes::$notifications, [
        'as' => 'director.notificaciones.index',
        function () {
            return view('director.notificaciones.index');
        }
    ]);

    Route::get(\App\Http\Constantes::$notificationsA,
        [ 'uses' => \App\Http\Constantes::$notificationC, 'as' => 'director.notificaciones.archivar' ]);

    //======== opciones del calendario ==========//
    Route::get(\App\Http\Constantes::$calendar,
        [ 'uses' => 'CalendarioController@indexDirector', 'as' => 'director.calendario.index' ]);

});

/*
|--------------------------------------------------------------------------
| rutas del consejo curricular
|--------------------------------------------------------------------------
*/

Route::group([
    \App\Http\Constantes::$midd   => [ 'web', 'role:consejo_curricular', 'throttle:30' ],
    \App\Http\Constantes::$prefix => 'consejo'
], function () {

    Route::get('/', [
        'as' => 'consejo.index',
        function () {
            return view('consejo.index');
        }
    ]);
    //======== opciones de la cuenta ==========//
    Route::get(\App\Http\Constantes::$cuent, [
        'as' => 'consejo.cuenta',
        function () {
            return view('consejo.cuenta.index');
        }
    ]);
    Route::get(\App\Http\Constantes::$help, [
        'as' => 'consejo.ayuda',
        function () {
            return view('consejo.cuenta.ayuda');
        }
    ]);
    Route::post(\App\Http\Constantes::$cuentaid,
        [ 'uses' => \App\Http\Constantes::$cuentaCont, 'as' => 'consejo.cuenta.update' ]);
    Route::post(\App\Http\Constantes::$passw,
        [ 'uses' => \App\Http\Constantes::$passwUpdate, 'as' => 'consejo.password.update' ]);

    //======== opciones de los documentos ==========//
    Route::get(\App\Http\Constantes::$comments, [
        'as' => 'consejo.documentos.index',
        function () {
            return view('consejo.documentos.index');
        }
    ]);
    //======== opciones de la propuesta ==========//
    Route::resource(\App\Http\Constantes::$propuest, \App\Http\Constantes::$propuestaC);
    Route::get(\App\Http\Constantes::$propuests,
        [ 'uses' => 'PropuestaController@indexPropuestasConsejo', 'as' => 'consejo.propuestas.index' ]);
    Route::get(\App\Http\Constantes::$verPropuest,
        [ 'uses' => 'PropuestaController@showPropuestaConsejo', 'as' => 'consejo.propuesta.ver' ]);

    //======== opciones del trabajo de grado ==========//
    Route::resource(\App\Http\Constantes::$trabajograd, \App\Http\Constantes::$trabajogradoC);
    Route::get(\App\Http\Constantes::$trabajosgrado,
        [ 'uses' => 'TrabajogradoController@indexTrabajosgradoConsejo', 'as' => 'consejo.trabajosgrado.index' ]);
    Route::get(\App\Http\Constantes::$verTrabajograd,
        [ 'uses' => 'TrabajogradoController@showTrabajogradoConsejo', 'as' => 'consejo.trabajogrado.ver' ]);

    //======== opciones de los comentarios ==========//
    Route::post('comentarios', [ 'uses' => 'ComentariosController@store', 'as' => 'consejo.comentarios.store' ]);

    //======== opciones de los jurados ==========//
    Route::get('jurados', [ 'uses' => 'JuradosController@indexJurados', 'as' => 'consejo.jurados.index' ]);

    //======== opciones de las notificaciones ==========//
    Route::get(\App\Http\Constantes::$notifications, [
        'as' => 'consejo.notificaciones.index',
        function () {
            return view('consejo.notificaciones.index');
        }
    ]);

    Route::get(\App\Http\Constantes::$notificationsA,
        [ 'uses' => \App\Http\Constantes::$notificationC, 'as' => 'consejo.notificaciones.archivar' ]);

    //======== opciones del calendario ==========//
    Route::get(\App\Http\Constantes::$calendar,
        [ 'uses' => 'CalendarioController@indexConsejo', 'as' => 'consejo.calendario.index' ]);


});

/*
|--------------------------------------------------------------------------
| rutas del jurado
|--------------------------------------------------------------------------
*/

Route::group([ \App\Http\Constantes::$midd   => [ 'web', 'role:jurado', 'throttle:30' ],
               \App\Http\Constantes::$prefix => 'jurado'
], function () {

    Route::get('/', [
        'as' => 'jurado.index',
        function () {
            return view('jurado.index');
        }
    ]);
    //======== opciones de la cuenta ==========//
    Route::get(\App\Http\Constantes::$cuent, [
        'as' => 'jurado.cuenta',
        function () {
            return view('jurado.cuenta.index');
        }
    ]);
    Route::get(\App\Http\Constantes::$help, [
        'as' => 'jurado.ayuda',
        function () {
            return view('jurado.cuenta.ayuda');
        }
    ]);
    Route::post(\App\Http\Constantes::$cuentaid,
        [ 'uses' => \App\Http\Constantes::$cuentaCont, 'as' => 'jurado.cuenta.update' ]);
    Route::post(\App\Http\Constantes::$passw,
        [ 'uses' => \App\Http\Constantes::$passwUpdate, 'as' => 'jurado.password.update' ]);

    //======== opciones de la propuesta ==========//
    Route::resource(\App\Http\Constantes::$propuest, \App\Http\Constantes::$propuestaC);
    Route::get(\App\Http\Constantes::$propuests,
        [ 'uses' => 'PropuestaController@indexPropuestasJurado', 'as' => 'jurado.propuestas.index' ]);
    Route::get(\App\Http\Constantes::$verPropuest,
        [ 'uses' => 'PropuestaController@showPropuestaJurado', 'as' => 'jurado.propuesta.ver' ]);
    Route::get('evaluacion/{id}',
        [ 'uses' => 'PropuestaController@showEvaluacion', 'as' => 'jurado.propuesta.evaluacion' ]);
    Route::post('propuesta/{id}/evaluar', [ 'uses' => 'JuradoController@evaluar', 'as' => 'jurado.propuesta.evaluar' ]);

    //======== opciones del trabajo de grado ==========//
    Route::resource(\App\Http\Constantes::$trabajograd, \App\Http\Constantes::$trabajogradoC);
    Route::get(\App\Http\Constantes::$trabajosgrado,
        [ 'uses' => 'TrabajogradoController@indexTrabajosgradoJurado', 'as' => 'jurado.trabajosgrado.index' ]);
    Route::get(\App\Http\Constantes::$verTrabajograd,
        [ 'uses' => 'TrabajogradoController@showTrabajogradoJurado', 'as' => 'jurado.trabajogrado.ver' ]);
    Route::get('evaluaciontrabajogrado/{id}',
        [ 'uses' => 'TrabajogradoController@showEvaluacion', 'as' => 'jurado.trabajogrado.evaluacion' ]);
    Route::post('trabajogrado/{id}/evaluar',
        [ 'uses' => 'JuradoController@evaluarTrabajogrado', 'as' => 'jurado.trabajogrado.evaluar' ]);

    //======== opciones de los documentos ==========//
    Route::get(\App\Http\Constantes::$comments, [
        'as' => 'jurado.documentos.index',
        function () {
            return view('jurado.documentos.index');
        }
    ]);

    //======== opciones de los comentarios ==========//
    Route::post('comentarios', [ 'uses' => 'JuradoController@comentar', 'as' => 'jurado.propuesta.comentar' ]);
    Route::post('comentariosTrabajogrado',
        [ 'uses' => 'JuradoController@comentarTrabajogrado', 'as' => 'jurado.trabajogrado.comentar' ]);

    //======== opciones de las notificaciones ==========//
    Route::get(\App\Http\Constantes::$notifications, [
        'as' => 'jurado.notificaciones.index',
        function () {
            return view('jurado.notificaciones.index');
        }
    ]);

    Route::get(\App\Http\Constantes::$notificationsA,
        [ 'uses' => \App\Http\Constantes::$notificationC, 'as' => 'jurado.notificaciones.archivar' ]);

    //======== opciones del calendario ==========//
    Route::get(\App\Http\Constantes::$calendar,
        [ 'uses' => 'CalendarioController@indexJurado', 'as' => 'jurado.calendario.index' ]);

});
