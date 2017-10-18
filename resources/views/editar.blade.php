@extends('principal')

@section('conteudo')
<div class="header">
	<div class="placa-branca">
		<h2>Editar Dados</h2>
		<form method="post" action="/usuarios/salvarEdicao/">
			<div class="row">
				<div class="form-group">
					<input type="date" class="form-control" name="nome" >
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="email">
				</div>
				<div class="form-group">
					<input type="date" class="form-control" name="envolvimento">
				</div>
				<div class="form-group">
					<input type="file" class="form-control" name="foto">
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<input type="date" class="form-control" name="cpf" >
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="data_cadastro">
				</div>
				<div class="form-group">
					<input type="date" class="form-control" name="ultimo_envolvimento">
				</div>
			</div>
			<button class="btn botao-enviar" type="submit">Enviar</button>
			<a href="/" class="btn botao-voltar">Voltar</a>
		</form>	
	</div>
</div>
@stop
