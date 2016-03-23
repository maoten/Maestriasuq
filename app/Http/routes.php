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
		Route::resource('consejo','ConsejoController');
		Route::resource('directores','DirectoresController');
		Route::resource('jurados','JuradosController');

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

		/*Route::get('getfile/{id}',function($id)
		{
			$file = Attachment::find(1); //pendiente
			$data = $file->doc_attachment;
			return Response::make($data, 200, array('Content-type' => $file->mime, 'Content-length' => $file->size));
			echo 'ok';
		});*/

	});
