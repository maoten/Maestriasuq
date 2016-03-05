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
	
	Route::group(['middleware' => 'web'], function () {
		Route::auth();
		Route::get('/home', 'HomeController@index');

	});
	
	/*
	|--------------------------------------------------------------------------
	| ruta de configuración de la cuenta // cambiar web por auth 
	|--------------------------------------------------------------------------
	*/
	
	Route::group(['middleware'=>'web'], function(){

		Route::get('/cuenta',['as'=>'layaouts.cuenta.configuracion', function () {
			return view('layouts.general.configuracion');
		}]);

		Route::get('/ayuda',['as'=>'layaouts.cuenta.ayuda', function () {
			return view('layouts.general.ayuda');
		}]);

	});
	
	
	/*
	|--------------------------------------------------------------------------
	| rutad del panel de administrador // cambiar web por auth 
	|--------------------------------------------------------------------------
	*/
	
	Route::group(['prefix'=>'admin','middleware'=>'web'], function(){

		Route::get('/',['as'=>'admin.index', function () {
			return view('admin.index');
		}]);

		Route::get('estudiantes',['uses'=>'estudiantesController@index']);
		Route::get('estudiantes/registrar',['uses'=>'estudiantesController@create','as'=>'admin.estudiantes.registrar']);
		Route::post('estudiantes/guardar',['uses'=>'estudiantesController@store','as'=>'admin.estudiantes.guardar']);


	});
	
	/*
	|--------------------------------------------------------------------------
	| rutas del estudiante // cambiar web por auth 
	|--------------------------------------------------------------------------
	*/
	
	Route::group(['prefix'=>'estudiante','middleware'=>'web'], function(){

		Route::get('/',['as'=>'estudiante.index', function () {
			return view('estudiante.index');
		}]);

	/*Route::get('/propuesta',['as'=>'propuesta.index', function () {
	return view('propuesta.index');
	}]);

	Route::get('/calendario',['as'=>'estudiante.index', function () {
	return view('layouts.general.calendario');
}]);*/

});