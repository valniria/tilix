<?php 

namespace serve\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use serve\Usuario;
use serve\Titulo;

class TituloController extends Controller {
	
	public function index() {

		header("Access-Control-Allow-Origin: *");

		// return view('principal')->with('usuarios', $usuarios);
		// $usuarios = Usuario::all();

		$usuarios = DB::table('usuarios')
            ->join('titulos', 'titulos.id_usuario', '=', 'usuarios.id')
            ->groupBy('titulos.id_usuario')
            ->get();

        
    	return response()->json($usuarios);

        // return Usuario::all();
	}

	public function enviarTitulo($id) {
		return view('enviar')->with('id', $id);
	}

	public function salvarEnvio($id) {

		$usuarios = Usuario::all();
		
		$params = Request::all();
		$params = array_add($params, 'id_usuario', $id);
		$titulo = new Titulo($params);

		if($titulo->save()){

			$mensagem = "Título Enviado com Sucesso!";
			$tipoMensagem ="alert-success";
			
		} else {
			$mensagem = "Ocorreu um Erro ao Salvar!";
			$tipoMensagem = "alert-danger";
		
		}

		return view('lista', compact('mensagem', 'tipoMensagem', 'usuarios'));
	}

	public function excluir($id) {
		$usuario = Usuario::find($id);
		
		if($usuario->delete()){

			$mensagem = "Usuário Excluído com Sucesso!";
			$tipoMensagem ="alert-success";
			
		} else {
			$mensagem = "Ocorreu um Erro ao Excluir!";
			$tipoMensagem = "alert-danger";
		
		}

		$usuarios = Usuario::all();

		return view('lista', compact('mensagem', 'tipoMensagem', 'usuarios'));
	}
}