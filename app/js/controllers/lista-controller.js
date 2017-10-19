'use strict';
angular.module('tilix').controller('ListaController', function($scope, listaService, tokenService,excluirTituloService) {

	$scope.usuarios = [];

	tokenService.query(function(token){
		angular.module('tilix').constant("CSRF_TOKEN", token[0].token);
	});

	listaService.query(function(usuarios) {
		$scope.usuarios = usuarios;
		console.log(usuarios);
	}, function(erro) {
		console.log(erro);
	});


	$scope.excluir = function(id){
		if(confirm("Tem certeza que deseja excluir?")){
			excluirTituloService.delete({idTitulo : id}, function(){
				alert('deletou');
			}, function(){
				alert("Não exclui kk");
			});
		}
	}

});