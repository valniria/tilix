'use strict';
angular.module('tilix').controller('HeaderController', function($scope, $location, headerService, $routeParams, tituloService, editarUsuarioService) {

	$scope.usuario = {
		'id' : "",
		'nome':"",
		'email' : "",
		'envolvimento' : "",
		'cpf' : "",
		'data_cadastro' : "",
		'ultimo_envolvimento' : ""
	};
	$scope.titulo = {
		'data_vencimento' : "",
		'valor' : "",
		'id_usuario': $routeParams.idUsuario
	};
	$scope.showTitulo = false;
	$scope.showUsuario = false;

	$scope.openTitulo = function(){
		$scope.showTitulo = true;
	}

	$scope.openEditar = function(){
		$scope.showUsuario = true;
	}


	headerService.query({ idUsuario : $routeParams.idUsuario }, function(usuario) {
		$scope.usuario = usuario[0];
		console.log(usuario);
	}, function(erro) {
		console.log(erro);
	});

	$scope.salvar = function(){
		tituloService.save($scope.titulo, function(resposta) {
		$scope.showTitulo = false;

		alert("Salvo com sucesso");
		$location.path( "/" );
		}, function(erro) {
			console.log(erro);
		});
	}
	
	$scope.update = function(usuario){
		editarUsuarioService.update({ idUsuario : $routeParams.idUsuario }, $scope.usuario, function(resposta) {
		$scope.showUsuario = false;

		alert("Atualizado com sucesso");
		$location.path( "/" );
		}, function(erro) {
			console.log(erro);
		});
	}

});