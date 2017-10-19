'use strict';
angular.module('tilix').controller('HeaderController', function($scope, headerService, $routeParams) {

	$scope.usuario = {};



	headerService.query({ idUsuario : $routeParams.idUsuario }, function(usuario) {
		$scope.usuario = usuario[0];
		console.log(usuario);
	}, function(erro) {
		console.log(erro);
	});

	$scope.editar = function(data){
		$scope.lista = data;
		$('#myModal').modal('show');
	}

	$scope.salvar = function(){
		if($scope.lista.id){
			listaService.edita($scope.lista).success(function(res){
				$scope.listar();
				$('#myModal').modal('hide');
			});
		}else{
			listaService.cadastra($scope.lista).success(function(res){
				$scope.listar();
				$('#myModal').modal('hide');
			});
		}
	}

	$scope.excluir = function(data){
		if(confirm("Tem certeza que deseja excluir?")){
			listaService.exclui(data.id).success(function(res){
				$scope.listar();
			});
		}
	}
});