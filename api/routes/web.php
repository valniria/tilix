<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['post', 'options'], 'api/...', 'Api\XController@method')->middleware('cors');

Route::group(array('prefix' => 'api'), function()
{

  Route::post('/', function () {
      return response()->json(array(['message' => 'Tilix API', 'status' => 'Connected']));
  });

  Route::get('/csrf', function() {
  	header("Access-Control-Allow-Origin: *");
    // return Session::token();
    return response()->json(array(['tolken' => Session::token()]));
});

  Route::resource('/listar', 'TituloController');
  Route::get('/header/{id}', 'UsuarioController@header');
  Route::post('/titulo', 'TituloController@salvarTitulo');
  Route::put('/editarUsuario/{id}', 'UsuarioController@salvarEdicao');
  Route::delete('/excluirTitulo/{id}', 'TituloController@excluir');
  Route::options('/titulo', function(){
  	header("Access-Control-Allow-Origin: *");
  	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, Set-Cookie');
  	return response()->json();
  });

  Route::options('/editarUsuario/{id}', function(){
  	header("Access-Control-Allow-Origin: *");
  	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
  	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, Set-Cookie');
  	return response()->json();
  });

  Route::options('/excluirTitulo/{id}', function(){
  	header("Access-Control-Allow-Origin: *");
  	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
  	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, Set-Cookie');
  	return response()->json();
  });

});




// Route::get('breweries', ['middleware' => 'cors', function()
// {
//     return \Response::json(\App\Brewery::with('beers', 'geocode')->paginate(10), 200);
// }]);



	// Route::get('/', 'TituloController@listar');
	// Route::get('/usuario/header/{id}', 'UsuarioController@header');
	// Route::get('/usuario/editar/{id}', 'UsuarioController@editar');
	// Route::post('/usuario/salvarEdicao/{id}', 'UsuarioController@salvarEdicao');
	// Route::get('/titulo/enviar/{id}', 'TituloController@enviarTitulo');
	// Route::post('/titulo/salvarEnvio/{id}', 'TituloController@salvarEnvio');
	// Route::get('/titulo/excluir/{id}', 'TituloController@excluir');









// Route::get('/usuarios/editar', 'UsuarioController@editar');

Route::get('/usuario/editar/{id}', 'UsuarioController@editar');

Route::post('/usuario/salvarEdicao/{id}', 'UsuarioController@salvarEdicao');




Route::get('/titulo/enviar/{id}', 'TituloController@enviarTitulo');


Route::post('/titulo/salvarEnvio/{id}', 'TituloController@salvarEnvio');

Route::get('/titulo/excluir/{id}', 'TituloController@excluir');