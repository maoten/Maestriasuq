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
	| rutad del panel de administrador  //pendiente apra middleware
	|--------------------------------------------------------------------------
	*/
	
	Route::group(['middleware'=>['web'], 'prefix'=>'admin'], function(){

		Route::get('/',[
			'as'=>'admin.index', function () {
				return view('admin.index');
			}]);

		Route::resource('estudiantes','EstudiantesController');
		Route::get('estudiantes/create',['uses'=>'EstudiantesController@create']);
		Route::post('estudiantes/store',['uses'=>'EstudiantesController@store']);
		Route::resource('consejo','ConsejoCurricularController');


	});
	/*
	|--------------------------------------------------------------------------
	| rutas del estudiante //pendiente apra middleware
	|--------------------------------------------------------------------------
	*/

	Route::group(['middleware'=>['web'], 'prefix'=>'estudiante'], function(){

		Route::get('/',['as'=>'estudiante.index', function () {
			return view('estudiante.index');
		}])->middleware('auth');;

	});
