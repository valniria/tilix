<?php 

namespace serve\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use serve\Usuario;
use serve\Titulo;

class TituloController extends Controller {
	
	public function index() {

		header("Access-Control-Allow-Origin: *");

		// $usuarios = Usuario::all();

		$usuarios = DB::table('usuarios')
            ->join('titulos', 'titulos.id_usuario', '=', 'usuarios.id')
            ->groupBy('titulos.id_usuario')
            ->select('usuarios.*', 'titulos.id_usuario', 'titulos.data_vencimento', 'titulos.valor')
            ->get();

        
    	return response()->json($usuarios);

        // return Usuario::all();
	}

	public function enviarTitulo($id) {
		return view('enviar')->with('id', $id);
	}

	public function salvarTitulo() {

		header("Access-Control-Allow-Origin: *");
		// header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');

		$usuarios = Usuario::all();
		
		$params = Request::all();
		// $params = array_add($params, 'id_usuario', $id);
		$titulo = new Titulo($params);

		$titulo->save();

		return response()->json(["ok" => true]); 
		// return view('lista', compact('mensagem', 'tipoMensagem', 'usuarios'));
	}

	public function excluir($id) {
		header("Access-Control-Allow-Origin: *");
		$usuario = Usuario::find($id);
		
		$usuario->delete();

		return response()->json(["ok" => true]); 
	}
}