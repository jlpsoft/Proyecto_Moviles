<!DOCTYPE html>
<html ng-app='angularRoutingApp' lang="es">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>   
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="resources/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link type="text/css" rel="stylesheet" href="resources/css/styles2.css "/>
  
  <title>INVENTARIO</title>
  <link rel="shortcut icon" href="resources/images/logo.ico"/>
</head>

<body class="grey lighten-3">
  <header>
    <div class="navbar-fixed" role="navigation">
      <nav class="blue darken-4">
      <div class="nav-wrapper container">
        <a  id="logo-container" class="center brand-logo">Inventarline Bienvenido <?php session_start(); 
                                      ob_start(); echo $_SESSION['usuario'];?></a>
        
        <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="material-icons">menu</i></a></div>
        
        <ul id="slide-out" class="side-nav">
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header  waves-effect waves-teal">Productos</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#addproduct">Agregar Producto</a></li>
                  <li><a href="#viewproduct">Listar Producto</a></li>
                  <li><a href="#modifyproduct">Modificar Producto</a></li>
                  <li><a href="#DelectProduct">Eliminar Producto</a></li>
                  <li><a href="#InfoProduct1">Informe de Producto</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header  waves-effect waves-teal">Empleados</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#employee">Informe de Empleados</a></li>
                  <li><a href="#empleado">Empleado</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        </ul>
        <!-- vista de la barra vertical -->
        <ul id="nav-mobile" class="side-nav">
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header  waves-effect waves-teal">Productos</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#addproduct">Agregar Producto</a></li>
                  <li><a href="#viewproduct">Listar Producto</a></li>
                  <li><a href="#modifyproduct">Modificar Producto</a></li>
                  <li><a href="#DelectProduct">Eliminar Producto</a></li>
                  <li><a href="#InfoProduct1">Informe de Producto</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header  waves-effect waves-teal">Empleados</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#employee">Informe del Empleado</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        </ul>
        <!-- iconos de la derecha e izquierda -->
        <div>
          <ul  class="left hide-on-med-and-down">
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">view_list</i></a>
          </ul>
          <ul  class="right hide-on-med-and-down">
            <li><a href="#"><i class="material-icons">power_settings_new</i></a></li>
          </ul>
        </div>                  
      </div>
      </nav>
    </div>
</header>

 
    <div class="container">
    <div class="section">
    <!-- Aquí inyectamos las vistas -->
      <div ng-view></div> 
    </div>
    </div>


    <!--Import jQuery before materialize.js--> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>
    <script src="resources/js/materialize.js"></script>
    <script src="resources/js/init.js"></script>
    <script src="resources/js/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.3/angular-route.js"></script>
    <script src="resources/js/main.js"></script>
</body>
</html>