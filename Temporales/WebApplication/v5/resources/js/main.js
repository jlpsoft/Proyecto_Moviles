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
			templateUrl : 'Principal/viewproduct.php',
			controller 	: 'mainController'
		})
		.when('/modifyproduct', {
			templateUrl : 'Principal/modifyproduct.html',
			controller 	: 'mianController'
		})
		.when('/DelectProduct', {
			templateUrl	: 'Principal/DelectProduct.html',
			controller 	: 'mainController1'
		})
		.when('/InfoProduct1', {
			templateUrl	: 'Principal/InfoProduct1.php',
			controller 	: 'mainController1'
		})
		.when('/employee', {
			templateUrl	: 'Principal/employee.php',
			controller 	: 'mainController1'
		})
		.otherwise({
			redirectTo: '/'
		});
});


angularRoutingApp.controller('mainController', function($scope) {
	$scope.message = '';
});
