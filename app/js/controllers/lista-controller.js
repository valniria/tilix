'use strict';
angular.module('tilix').controller('ListaController', function($scope, listaService) {

	$scope.usuarios = [];

	listaService.query(function(usuarios) {
		$scope.usuarios = usuarios;
		console.log(usuarios);
	}, function(erro) {
		console.log(erro);
	});

});