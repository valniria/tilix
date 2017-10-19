<?php 

namespace serve\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use serve\Usuario;
use serve\Titulo;

class TituloController extends Controller {
	
	public function index() {

		header("Access-Control-Allow-Origin: *");

		$usuarios = Usuario::all();
		if(isset($usuarios[0]->titulo[0]))
		$usuarios->titulos = $usuarios[0]->titulo[0];

		// var_dump($usuarios[0]->titulo[0]);die;

		// foreach ($usuarios as $user) {

		// 	var_dump($user);die;

		// 	$tudo = array_merge($user, $user->titulo[0]);
		// }

    	// return response()->json($usuarios);
    	return  json_encode($usuarios);
	}

	public function enviarTitulo($id) {
		return view('enviar')->with('id', $id);
	}

	public function salvarTitulo() {

		header("Access-Control-Allow-Origin: *");
		// header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');

		$usuarios = Usuario::all();
		
		$params = Request::all();
		$titulo = new Titulo($params);

		$titulo->save();

		return response()->json(["ok" => true]);
	}

	public function excluir($id) {
		header("Access-Control-Allow-Origin: *");
		$titulo = Titulo::find($id);
		
		$titulo->delete();

		return response()->json(["ok" => true]); 
	}
}