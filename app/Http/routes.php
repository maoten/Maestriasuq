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

		Route::get('/cuenta',['as'=>'layaouts.cuenta.configuracion', function () {
			return view('layouts.general.configuracion');
		}]);

		Route::get('/ayuda',['as'=>'layaouts.cuenta.ayuda', function () {
			return view('layouts.general.ayuda');
		}]);		

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

		Route::resource('estudiantes','EstudiantesController');
		Route::get('estudiantes/{id}/destroy',['uses'=>'EstudiantesController@destroy','as'=>'admin.estudiantes.destroy']);
		Route::get('estudiantes/{id}/update',['uses'=>'EstudiantesController@update','as'=>'admin.estudiantes.update']);

		Route::resource('directores','DirectoresController');
		Route::get('directores/{id}/destroy',['uses'=>'DirectoresController@destroy','as'=>'admin.directores.destroy']);
		Route::get('directores/{id}/update',['uses'=>'DirectoresController@update','as'=>'admin.directores.update']);

		Route::resource('consejo','ConsejoController');
		Route::get('consejo/{id}/destroy',['uses'=>'ConsejoController@destroy','as'=>'admin.consejo.destroy']);
		Route::get('consejo/{id}/update',['uses'=>'ConsejoController@update','as'=>'admin.consejo.update']);

		Route::resource('jurados','JuradosController');
		Route::get('jurados/{id}/destroy',['uses'=>'JuradosController@destroy','as'=>'admin.jurados.destroy']);
		Route::get('jurados/{id}/update',['uses'=>'JuradosController@update','as'=>'admin.jurados.update']);

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

		Route::resource('propuesta','PropuestaController');

		Route::get('getfile/{id}',['uses'=>'PropuestaController@edit','as'=>'estudiante.propuesta.ver']);

	});
