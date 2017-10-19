angular.module('meusServicos', ['ngResource'])
	.factory('listaService', function($resource) {

		return $resource('http://localhost:8000/api/listar');
	})
	.factory('headerService', function($resource) {

		return $resource('http://localhost:8000/api/header/:idUsuario');
	})
	.factory('tituloService', function($resource) {

		return $resource('http://localhost:8000/api/titulo/:idTitulo');
	})
	.factory('tokenService', function($resource) {

		return $resource('http://localhost:8000/api/csrf');
	})
	.factory('editarUsuarioService', function($resource) {

		return $resource('http://localhost:8000/api/editarUsuario/:idUsuario', null, {
			'update' : { 
				method: 'PUT'
			}
		});
	})
	.factory('excluirTituloService', function($resource) {

		return $resource('http://localhost:8000/api/excluirTitulo/:idTitulo');
	});
