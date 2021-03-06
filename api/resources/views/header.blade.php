@extends('principal')

@section('conteudo')
<div class="header">
	<div class="placa-branca">
		<!-- <div class="container">	 -->
			<div class="row">
				<div class="col-xs-1">
					<img width="100px" class="img-circle" src="/img/<?php echo $usuario->foto ?>">
				</div>
				<div class="col-xs-3 campo">
					<h3><strong><?=$usuario->nome .'</strong></h3><br>
					<p>'.$usuario->email .'</p><br>'.
					'<button class="btn btn-success envolvimento">'.$usuario->envolvimento .'</button>';
					?>
				</div>
				<!-- <div class="col-xs-9"></div> -->
			</div>
			<br />
			<div class="row">
				<div class="col-xs-2">
					<strong>CPF</strong><br>
					<?= $usuario->cpf ?>
				</div>
				<div class="col-xs-2">
					<strong>Data de cadastro</strong><br>
					{{ date('d/m/Y - g:i a',  strtotime($usuario->data_cadastro)) }}
				</div>
				<div class="col-xs-2">
					<strong>Último Envolvimento</strong><br>
					{{ date('d/m/Y - g:i a',  strtotime($usuario->ultimo_envolvimento)) }}
				</div>
				<div class="botoes-alinhados">
					<a href="/" class="btn botao-voltar">Voltar</a>
					<a class="btn botao-editar" href="/usuario/editar/<?= $usuario->id ?>">Editar dados</a>
					<a class="btn botao-enviar" href="/titulo/enviar/<?=$usuario->id ?>">Enviar Título</a>
				</div>
			</div>
		<!-- </div> -->
	</div>
</div>
@stop