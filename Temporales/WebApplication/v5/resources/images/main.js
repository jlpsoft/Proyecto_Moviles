// Creación del módulo
var angularRoutingApp = angular.module('angularRoutingApp', ['ngRoute']);

// Configuración de las rutas
angularRoutingApp.config(function($routeProvider) {

	$routeProvider
		.when('/addproduct', {
			templateUrl	: 'Principal/addproduct.html',
			controller 	: 'mainController'
		})
		.when('/informe', {
			templateUrl : 'Principal/informeproduct.html',
			controller 	: 'aboutController'
		})
		.when('/employee', {
			templateUrl : 'Principal/employee.html',
			controller 	: 'contactController'
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