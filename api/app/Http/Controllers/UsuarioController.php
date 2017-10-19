<?php 

namespace serve\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use serve\Usuario;
use serve\Titulo;
use Validator;

class UsuarioController extends Controller {

	public function header($id) {
		header("Access-Control-Allow-Origin: *");
		$usuarios = Usuario::find($id);
		
		// return view('header')->with('usuario', $usuarios);
		return response()->json(array($usuarios));
	}

	public function editar($id) {
		return view('editar')->with('id', $id);
	}

	public function enviarTitulo($id) {
		return view('enviar')->with('id', $id);
	}

	public function salvarEdicao($id) {

		header("Access-Control-Allow-Origin: *");

		$usuario = Usuario::find($id);
		$arrayDados = Request::all();

		$usuario->nome = $arrayDados['nome'];
		$usuario->email = $arrayDados['email'];
		$usuario->envolvimento = $arrayDados['envolvimento'];
		$usuario->cpf = $arrayDados['cpf'];
		$usuario->data_cadastro = $arrayDados['data_cadastro'];
		$usuario->ultimo_envolvimento = $arrayDados['ultimo_envolvimento'];
		$usuario->foto = $arrayDados['foto'];

		$usuario->save();

		return response()->json(["ok" => true]); 
	}
}