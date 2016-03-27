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

	    //======== opciones de los directores de grado ==========//
		Route::resource('directores','DirectoresController');
		Route::get('directores/{id}/destroy',['uses'=>'DirectoresController@destroy','as'=>'admin.directores.destroy']);
		Route::get('directores/{id}/update',['uses'=>'DirectoresController@update','as'=>'admin.directores.update']);

	    //======== opciones del consejo curricular ==========//
		Route::resource('consejo','ConsejoController');
		Route::get('consejo/{id}/destroy',['uses'=>'ConsejoController@destroy','as'=>'admin.consejo.destroy']);
		Route::get('consejo/{id}/update',['uses'=>'ConsejoController@update','as'=>'admin.consejo.update']);

	    //======== opciones de los jurados ==========//
		Route::resource('jurados','JuradosController');
		Route::get('jurados/{id}/destroy',['uses'=>'JuradosController@destroy','as'=>'admin.jurados.destroy']);
		Route::get('jurados/{id}/update',['uses'=>'JuradosController@update','as'=>'admin.jurados.update']);

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
	});
