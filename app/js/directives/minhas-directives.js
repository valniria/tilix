angular.module('minhasDiretivas', [])
	.directive('editarUsuario', function() {
		return {
			restrict : "E",
			scope: {
				usuario: "=",
				salvar: "="
			},
			templateUrl: "js/directives/editar-usuario.html"

		}
	})
	.directive('enviarTitulo', function() {
		return {
			restrict : "E",
			scope: {
				usuario: "=",
				salvar: "=",
				titulo: "="
			},
			templateUrl: "js/directives/enviar-titulo.html"

		}
	});