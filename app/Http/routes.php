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
	
	Route::get('/', function () {
	//return view('welcome');
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
	
	Route::group(['middleware'=>'web'], function(){
		Route::auth(); // pendiente	

	});
	
	
	/*
	|--------------------------------------------------------------------------
	| rutad del panel de administrador 
	|--------------------------------------------------------------------------
	*/
	
	Route::group(['middleware'=>['web','role:admin'], 'prefix'=>'admin'], function(){

		Route::get('/',['as'=>'admin.index', function () {
			return view('admin.index');
		}]);

	    //======== opciones de la cuenta ==========//
		Route::get('cuenta', ['as'=>'admin.cuenta',function () {
			return view('admin.cuenta.index');
		}]);
		Route::get('ayuda', ['as'=>'admin.ayuda',function () {
			return view('admin.cuenta.ayuda');
		}]);
		Route::post('cuenta/{id}/update',['uses'=>'CuentaController@update','as'=>'admin.cuenta.update']);
		Route::post('password/{id}/update',['uses'=>'CuentaController@updatePassword','as'=>'admin.password.update']);

	    //======== opciones de los estudiantes ==========//
		Route::resource('estudiantes','EstudiantesController');
		Route::get('estudiantes/{id}/destroy',['uses'=>'EstudiantesController@destroy','as'=>'admin.estudiantes.destroy']);
		Route::get('estudiantes/{id}/update',['uses'=>'EstudiantesController@update','as'=>'admin.estudiantes.update']);
        //======== opciones de los jurados ==========//
		Route::get('jurados',['uses'=>'JuradosController@indexJurados','as'=>'admin.jurados.index']);

	    //======== opciones de los directores de grado ==========//
		Route::resource('directores','DirectoresController');
		Route::get('directores/{id}/destroy',['uses'=>'DirectoresController@destroy','as'=>'admin.directores.destroy']);
		Route::get('directores/{id}/update',['uses'=>'DirectoresController@update','as'=>'admin.directores.update']);

	    //======== opciones del consejo curricular ==========//
		Route::resource('consejo','ConsejoController');
		Route::get('consejo/{id}/destroy',['uses'=>'ConsejoController@destroy','as'=>'admin.consejo.destroy']);
		Route::get('consejo/{id}/update',['uses'=>'ConsejoController@update','as'=>'admin.consejo.update']);

	    //======== opciones de las propuestas ==========//
		Route::get('propuestas',['uses'=>'PropuestaController@indexPropuestas','as'=>'admin.propuestas.index']);

	});
	/*
	|--------------------------------------------------------------------------
	| rutas del estudiante 
	|--------------------------------------------------------------------------
	*/

	Route::group(['middleware'=>['web','role:estudiante'], 'prefix'=>'estudiante'], function(){

		Route::get('/',['as'=>'estudiante.index', function () {
			return view('estudiante.index');
		}]);	

		//======== opciones de la cuenta ==========//
		Route::get('cuenta', ['as'=>'estudiante.cuenta',function () {
			return view('estudiante.cuenta.index');
		}]);
		Route::get('ayuda', ['as'=>'estudiante.ayuda',function () {
			return view('estudiante.cuenta.ayuda');
		}]);
		Route::post('cuenta/{id}/update',['uses'=>'CuentaController@update','as'=>'estudiante.cuenta.update']);
		Route::post('password/{id}/update',['uses'=>'CuentaController@updatePassword','as'=>'estudiante.password.update']);

        //======== opciones de la propuesta ==========//
		Route::resource('propuesta','PropuestaController');
		Route::get('verpropuesta/{id}',['uses'=>'PropuestaController@show_propuesta','as'=>'estudiante.propuesta.ver']);
		Route::get('seguimiento/{id}',['uses'=>'PropuestaController@showSeguimiento','as'=>'estudiante.propuesta.seguimiento']);

		//======== opciones de los documentos ==========//
		Route::get('documentos', ['as'=>'estudiante.documentos.index',function () {
			return view('estudiante.documentos.index');
		}]);

		//======== opciones de las notificaciones ==========//
		Route::get('notificaciones', ['as'=>'estudiante.notificaciones.index',function () {
			return view('estudiante.notificaciones.index');
		}]);

		Route::get('notificaciones/archivar/{id}',['uses'=>'NotificacionesController@archivar','as'=>'estudiante.notificaciones.archivar']);

	});

	/*
	|--------------------------------------------------------------------------
	| rutas del director de grado 
	|--------------------------------------------------------------------------
	*/

	Route::group(['middleware'=>['web','role:director_grado'], 'prefix'=>'director'], function(){

		Route::get('/',['as'=>'director.index', function () {
			return view('director.index');
		}]);
        //======== opciones de la cuenta ==========//
		Route::get('cuenta', ['as'=>'director.cuenta',function () {
			return view('director.cuenta.index');
		}]);
		Route::get('ayuda', ['as'=>'director.ayuda',function () {
			return view('director.cuenta.ayuda');
		}]);
		Route::post('cuenta/{id}/update',['uses'=>'CuentaController@update','as'=>'director.cuenta.update']);
		Route::post('password/{id}/update',['uses'=>'CuentaController@updatePassword','as'=>'director.password.update']);

        //======== opciones de la propuesta ==========//
		Route::resource('propuesta','PropuestaController');
		Route::get('propuestas',['uses'=>'PropuestaController@indexPropuestasDir','as'=>'director.propuestas.index']);
		Route::get('verpropuesta/{id}',['uses'=>'PropuestaController@show_propuesta_dir','as'=>'director.propuesta.ver']);

		//======== opciones de los documentos ==========//
		Route::get('documentos', ['as'=>'director.documentos.index',function () {
			return view('director.documentos.index');
		}]);

		//======== opciones de las notificaciones ==========//
		Route::get('notificaciones', ['as'=>'director.notificaciones.index',function () {
			return view('director.notificaciones.index');
		}]);

		Route::get('notificaciones/archivar/{id}',['uses'=>'NotificacionesController@archivar','as'=>'director.notificaciones.archivar']);		


	});

	/*
	|--------------------------------------------------------------------------
	| rutas del consejo curricular
	|--------------------------------------------------------------------------
	*/

	Route::group(['middleware'=>['web','role:consejo_curricular'], 'prefix'=>'consejo'], function(){

		Route::get('/',['as'=>'consejo.index', function () {
			return view('consejo.index');
		}]);
        //======== opciones de la cuenta ==========//
		Route::get('cuenta', ['as'=>'consejo.cuenta',function () {
			return view('consejo.cuenta.index');
		}]);
		Route::get('ayuda', ['as'=>'consejo.ayuda',function () {
			return view('consejo.cuenta.ayuda');
		}]);
		Route::post('cuenta/{id}/update',['uses'=>'CuentaController@update','as'=>'consejo.cuenta.update']);
		Route::post('password/{id}/update',['uses'=>'CuentaController@updatePassword','as'=>'consejo.password.update']);

		//======== opciones de los documentos ==========//
		Route::get('documentos', ['as'=>'consejo.documentos.index',function () {
			return view('consejo.documentos.index');
		}]);
       //======== opciones de la propuesta ==========//
		Route::resource('propuesta','PropuestaController');
		Route::get('propuestas',['uses'=>'PropuestaController@indexPropuestasConsejo','as'=>'consejo.propuestas.index']);
		Route::get('verpropuesta/{id}',['uses'=>'PropuestaController@show_propuesta_consejo','as'=>'consejo.propuesta.ver']);

		Route::get('propuesta/{id}/asignar_jurados',['uses'=>'PropuestaController@asignar_jurados','as'=>'consejo.propuesta.asignar_jurados']);

		//======== opciones de los comentarios ==========//
		Route::post('comentarios',['uses'=>'ComentariosController@store','as'=>'consejo.comentarios.store']);

        //======== opciones de los jurados ==========//
		Route::resource('jurados','JuradosController');
		Route::get('jurados/{id}/destroy',['uses'=>'JuradosController@destroy','as'=>'consejo.jurados.destroy']);
		Route::get('jurados/{id}/update',['uses'=>'JuradosController@update','as'=>'consejo.jurados.update']);
		
		//======== opciones de las notificaciones ==========//
		Route::get('notificaciones', ['as'=>'consejo.notificaciones.index',function () {
			return view('consejo.notificaciones.index');
		}]);

		Route::get('notificaciones/archivar/{id}',['uses'=>'NotificacionesController@archivar','as'=>'consejo.notificaciones.archivar']);		


	});

	/*
	|--------------------------------------------------------------------------
	| rutas del jurado
	|--------------------------------------------------------------------------
	*/

	Route::group(['middleware'=>['web','role:jurado'], 'prefix'=>'jurado'], function(){

		Route::get('/',['as'=>'jurado.index', function () {
			return view('jurado.index');
		}]);
        //======== opciones de la cuenta ==========//
		Route::get('cuenta', ['as'=>'jurado.cuenta',function () {
			return view('jurado.cuenta.index');
		}]);
		Route::get('ayuda', ['as'=>'jurado.ayuda',function () {
			return view('jurado.cuenta.ayuda');
		}]);
		Route::post('cuenta/{id}/update',['uses'=>'CuentaController@update','as'=>'jurado.cuenta.update']);
		Route::post('password/{id}/update',['uses'=>'CuentaController@updatePassword','as'=>'jurado.password.update']);

        //======== opciones de la propuesta ==========//
		Route::resource('propuesta','PropuestaController');
		Route::get('propuestas',['uses'=>'PropuestaController@indexPropuestasJurado','as'=>'jurado.propuestas.index']);
		Route::get('verpropuesta/{id}',['uses'=>'PropuestaController@show_propuesta_jurado','as'=>'jurado.propuesta.ver']);

		//======== opciones de los documentos ==========//
		Route::get('documentos', ['as'=>'jurado.documentos.index',function () {
			return view('jurado.documentos.index');
		}]);

		//======== opciones de los comentarios ==========//
		Route::post('comentarios',['uses'=>'ComentariosController@store','as'=>'jurado.comentarios.store']);

		//======== opciones de los comentarios ==========//
		Route::post('comentarios',['uses'=>'ComentariosController@store','as'=>'jurado.comentarios.store']);

        //======== opciones de las notificaciones ==========//
		Route::get('notificaciones', ['as'=>'jurado.notificaciones.index',function () {
			return view('jurado.notificaciones.index');
		}]);

		Route::get('notificaciones/archivar/{id}',['uses'=>'NotificacionesController@archivar','as'=>'jurado.notificaciones.archivar']);

	});
