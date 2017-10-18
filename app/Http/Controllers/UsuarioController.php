<?php 

namespace serve\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class UsuarioController extends Controller {
	
	public function header() {
		$id = Request::route('id');
		$usuarios = DB::select('select * from usuarios where id ='. $id);
		
		return view('header')->with('usuario', $usuarios[0]);
	}

	public function lista() {
		$usuarios = DB::select('select * from usuarios');
		// $usuarios = DB::table('usuarios')
  //           ->join('titulos', 'usuarios.id', '=', 'titulos.id_usuario')
  //           ->select('usuarios.*', 'titulos.*')
  //           // ->groupBy('usuarios.id')
  //           ->get();


		return view('lista')->with('usuarios', $usuarios);
	}

	public function editar() {
		// $usuarios = DB::select('select * from usuarios');
		// return view('editar')->with('usuario', $usuarios[0]);

		// $id = Request::route('id');
		return view('editar');
	}

	public function enviarTitulo() {
		$id = Request::route('id');

		return view('enviar')->with('id', $id);
	}

	public function salvarEnvio() {
		
		$dados = array(
			'data_vencimento' 	=> Request::input('data_vencimento'),
			'valor' 			=> Request::input('valor'),
			'id_usuario'		=> Request::route('id'),
		);

		$usuarios = DB::select('select * from usuarios');
		
		if(DB::table('titulos')->insert($dados)){

			$mensagem = "Título Enviado com Sucesso!";
			$tipoMensagem ="alert-success";
			
		} else {
			$mensagem = "Ocorreu um Erro ao Salvar!";
			$tipoMensagem = "alert-danger";
		
		}

		// return view('lista')->with('retorno', $retorno);
		return view('lista', compact('mensagem', 'tipoMensagem', 'usuarios'));
	}

	public function salvarEdicao() {
		return "Salvo com sucesso!";
	}

	public function excluir() {
		return "Excluído com sucesso!";
	}
}