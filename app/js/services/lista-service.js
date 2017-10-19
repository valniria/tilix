angular.module('meusServicos', ['ngResource'])
	.factory('listaService', function($resource) {

		return $resource('http://localhost:8000/api/listar');
	})
	.factory('headerService', function($resource, $q) {

		return $resource('http://localhost:8000/api/header/:idUsuario');


	});
