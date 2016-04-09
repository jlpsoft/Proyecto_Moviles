// Creación del módulo
var angularRoutingApp = angular.module('angularRoutingApp', ['ngRoute']);

// Configuración de las rutas
angularRoutingApp.config(function($routeProvider) {

	$routeProvider
		.when('/inicio', {
			templateUrl	: 'Principal/inicio.html',
			controller 	: 'mainController'
		})
		.when('/addproduct', {
			templateUrl	: 'Principal/addproduct.html',
			controller 	: 'mainController'
		})
		.when('/viewproduct', {
			templateUrl : 'Principal/viewproduct.html',
			controller 	: 'mainController'
		})
		.when('/modifyproduct', {
			templateUrl : 'Principal/modifyproduct.html',
			controller 	: 'mianController'
		})
		.when('/DelectProduct', {
			templateUrl	: 'Principal/DelectProduct.html',
			controller 	: 'mainController'
		})
		.when('/InfoProduct1', {
			templateUrl	: 'Principal/InfoProduct1.php',
			controller 	: 'mainController'
		})
		.when('/employee', {
			templateUrl	: 'Principal/employee.php',
			controller 	: 'mainController'
		})
		.when('/empleado', {
			templateUrl	: 'Principal/empleado.php',
			controller 	: 'mainController'
		})
		.otherwise({
			redirectTo: '/'
		});
});


angularRoutingApp.controller('mainController', function($scope) {
	$scope.message = '';
});
