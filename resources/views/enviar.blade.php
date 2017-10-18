@extends('principal')


@section('conteudo')
<div class="header">
	<div class="placa-branca">
		<h2>Enviar Título</h2>
		<!-- <form method="post" action='/usuarios/salvarEnvio/<?php echo $id; ?>'> -->
		<form action="/usuarios/salvarEnvio/<?php echo $id; ?>" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="form-group">
					<input type="date" class="form-control" name="data_vencimento" placeholder="Insira a Data de Vencimento">
				</div>
				<div class="form-group">
					<input type="text" class="form-control real" name="valor" placeholder="Insira o Valor">
				</div>
				<button class="btn botao-enviar" type="submit">Enviar</button>
				<a href="/usuarios/header/<?php echo $id; ?>" class="btn botao-voltar">Voltar</a>
			</div>
		</form>			
	</div>
</div>
@stop
