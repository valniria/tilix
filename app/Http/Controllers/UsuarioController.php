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
		return view('lista')->with('usuarios', $usuarios);
	}

	public function editar() {
		// $usuarios = DB::select('select * from usuarios');
		// return view('editar')->with('usuario', $usuarios[0]);

		// $id = Request::route('id');
		return view('editar');
	}

	public function enviarTitulo() {
		// $id = Request::route('id');
		return view('enviar');
	}

	public function salvarEnvio() {
		return "Salvo com sucesso!";
	}

	public function salvarEdicao() {
		return "Salvo com sucesso!";
	}

	public function excluir() {
		return "Excluído com sucesso!";
	}
}