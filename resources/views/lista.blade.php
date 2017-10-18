@extends('principal')

@section('conteudo')
<div class="header">
	<div class="placa-branca">
		<div class="lista">	
			<?php
	        if (!empty($mensagem)){ 
		        echo '<div class="alert alert-success alert-dismissible" role="alert">'; ?>
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		            </button>
		            <?php echo $mensagem; ?>
		        </div>
	    	<?php } ?>
			<div class="row">
				<div class="col-xs-1">
					<input class="" type="checkbox" id="checkAll" name="check">
				</div>
				<div class="col-xs-2">
					<i class="fa fa-user-o" aria-hidden="true"></i>
				</div>
				<div class="col-xs-2">
					<label>NAME</label>
				</div>
				<div class="col-xs-2">
					<label>EMAIL</label>
				</div>
				<div class="col-xs-2">
					<label>VENCIMENTO</label>
				</div>
				<div class="col-xs-2">
					<label>VALOR</label>
				</div>
			</div>
			<?php foreach ($usuarios as $usuario) { 
				$row = DB::select('select * from titulos where id_usuario ='. $usuario->id);
			?>
			<div class="row">
				<hr>
				<div class="col-xs-1">
					<input type="checkbox" id="checkItem" name="check">
				</div>
				<div class="col-xs-2">
					<img width="100px" class="img-circle image-list" src="/img/<?php echo $usuario->foto ?>">
				</div>
				<div class="col-xs-2">
					<label>{{ date('d/m/Y - g:i a',  strtotime($usuario->nome)) }}</label>
				</div>
				<div class="col-xs-2">
					{{ date('d/m/Y - g:i a',  strtotime($usuario->email)) }}
				</div>
				<div class="col-xs-2">
					{{ date('d/m/Y - g:i a',  strtotime($row[0]->data_vencimento)) }}
				</div>
				<div class="col-xs-2">
					{{ date('d/m/Y - g:i a',  strtotime($row[0]->valor)) }}
				</div>
				<div class="col-xs-1">
					<!-- <a href="/usuarios/header/<?= $usuario->id ?>"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
					<a href="/usuarios/header/<?= $usuario->id ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
					<a href="/usuarios/editar/<?= $usuario->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="/usuarios/excluir/<?= $usuario->id ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<script>
	$("#checkAll").click(function(){
	    $('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>
@stop