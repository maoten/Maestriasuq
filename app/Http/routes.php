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
	return view('layouts.cuenta.configuracion');
	}]);

	Route::get('/ayuda',['as'=>'layaouts.cuenta.ayuda', function () {
	return view('layouts.cuenta.ayuda');
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
	
	Route::get('/registrar', 'UsuariosController@registrar');
	Route::get('/editar', 'UsuariosController@editar');
	
	});
	
	/*
	|--------------------------------------------------------------------------
	| rutas del aspirante // cambiar web por auth 
	|--------------------------------------------------------------------------
	*/
	
	Route::group(['prefix'=>'aspirante','middleware'=>'web'], function(){
	
	Route::get('/',['as'=>'aspirante.index', function () {
	return view('aspirante.index');
	}]);
	
		Route::get('/propuesta',['as'=>'propuesta.index', function () {
	return view('propuesta.index');
	}]);
	
	});