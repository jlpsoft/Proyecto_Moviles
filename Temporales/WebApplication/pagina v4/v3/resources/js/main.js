// Creación del módulo
var angularRoutingApp = angular.module('angularRoutingApp', ['ngRoute']);

// Configuración de las rutas
angularRoutingApp.config(function($routeProvider) {

	$routeProvider
		.when('/addproduct', {
			templateUrl	: 'Principal/addproduct.html',
			controller 	: 'mainController'
		})
		.when('/viewproduct', {
			templateUrl : 'Principal/viewproduct.html',
			controller 	: 'aboutController'
		})
		.when('/modifyproduct', {
			templateUrl : 'Principal/modifyproduct.html',
			controller 	: 'contactController'
		})
		.when('/DelectProduct', {
			templateUrl	: 'Principal/DelectProduct.html',
			controller 	: 'mainController1'
		})
		.when('/InfoProduct', {
			templateUrl	: 'Principal/InfoProduct.html',
			controller 	: 'mainController1'
		})
		.otherwise({
			redirectTo: '/'
		});
});


angularRoutingApp.controller('mainController', function($scope) {
	$scope.message = 'Hola, Mundo!';
});

angularRoutingApp.controller('aboutController', function($scope) {
	$scope.message = 'Esta es la página "Acerca de"';
});

angularRoutingApp.controller('contactController', function($scope) {
	$scope.message = 'Esta es la página de "Contacto", aquí podemos poner un formulario';
});
