angular.module('tilix', ['ngAnimate', 'ngRoute', 'ngResource', 'meusServicos'])
.config(function($routeProvider, $locationProvider, $httpProvider) {

	$locationProvider.html5Mode(true);

	$httpProvider.defaults.useXDomain = true;
	delete $httpProvider.defaults.headers.common['X-Requested-With'];

	$routeProvider.when('/', {
		templateUrl: 'partial/lista.html',
		controller: 'ListaController'
	});

	$routeProvider.when('/header/:idUsuario', {
		templateUrl: 'partial/header.html',
		controller: 'HeaderController'
	});
	
});