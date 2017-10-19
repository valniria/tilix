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
		$usuarios = Usuario::find(1);
		
		// return view('header')->with('usuario', $usuarios);
		return response()->json(array($usuarios));
	}

	public function editar($id) {
		return view('editar')->with('id', $id);
	}

	public function enviarTitulo($id) {
		return view('enviar')->with('id', $id);
	}

	public function salvarEdicao() {

		

		$usuario = Usuario::find($id);

		$params = Request::all();


		if($usuario->save()){

			$mensagem = "Título Enviado com Sucesso!";
			$tipoMensagem ="alert-success";
			
		} else {
			$mensagem = "Ocorreu um Erro ao Salvar!";
			$tipoMensagem = "alert-danger";
		
		}

		return view('lista', compact('mensagem', 'tipoMensagem', 'usuarios'));
	}
}