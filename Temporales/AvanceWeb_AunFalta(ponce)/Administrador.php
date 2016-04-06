<?php
		session_start();
		include('php_conexion.php'); 
		if($_SESSION['tipo_usu']=='ADMINISTRADOR' or $_SESSION['tipo_usu']=='USUARIO'){
		}else{
			header('location:error.php');
		}
		if($_SESSION['tipo_usu']=='ADMINISTRADOR'){
			$titulo='Administrador';
		}else{
			$titulo='USUARIO/o';
		}
		$usuario=limpiar($_SESSION['usuario']);
		$sqll=mysql_query("SELECT employee.name, employee.lastname, login.username, login.estado ,login.id ,login.password
FROM employee,login
WHERE employee.idFkLogin=login.id");
		if($dato=mysql_fetch_array($sqll)){
			$nombre=$dato['name'];
                        $apellido=$dato['lastname'];
			$palabra=explode(" ", $nombre);
                        $palabra2=explode(" ", $apellido);
			$nomb=$palabra[0];
                        $ap=$palabra2[0];
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="js/jquery.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/materialize.min.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/application.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	background-color: #FFF;
	background-image: url(img/fondoP.png);
}
</style>
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
<table width="98%" border="0">
  <tr>
    <td>
    <div id="navbar-example" class="navbar navbar-static">
      <div class="navbar-inner">
        <div class="container" style="width: auto;">
          <a class="brand" href="inicio.php" target="admin"><?php echo $titulo; ?></a>
          <ul class="nav" role="navigation">
            <li class="dropdown">
              <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Registros <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="empleado.php" target="admin"><i class="icon-user"></i>Empleado</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="productos.php" target="admin"><i class="icon-shopping-cart"></i>Producto</a></li>
                <!--<li role="presentation" class="divider"></li>-->  
              </ul>
            </li>
            <!--
            <li class="dropdown">
              <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Caja<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="contable.php" target="admin">Entrada y Salida de Dinero</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="cierre_caja.php" target="admin">Cierre de Caja</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="detalle.php?fecha=" target="admin">Detalle de Efectivo</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="crear_usu.php" target="admin">Registrar Cajeros</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="compras.php" target="admin">Compras</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="listado_compras.php" target="admin">Listado Compras</a></li>
                <!-- <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="conceptos.php" target="admin">Administrar Conceptos</a></li>
              </ul>
            </li>
            -->
            <li class="dropdown">
              <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Reportes <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="reporte_empleado.php" target="admin"><i class="icon-th-list"></i> 
                Listado de Empleados</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav pull-right">
            <li id="fat-menu" class="dropdown">
              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Hola! <?php echo $nomb." ".$ap; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
              	<li role="presentation"><a role="menuitem" tabindex="-1" href="bd.php" target="admin"><i class="icon-refresh"></i> Iniciar BD</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="cambiar_clave.php" target="admin"><i class="icon-refresh"></i> Cambiar Contraseña</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="cambiar_clave.php" target="admin"><i class="icon-refresh"></i> Agregar Usuario</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="php_cerrar.php"><i class="icon-off"></i> Salir</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </td>
  </tr>
  <tr>
    <td><iframe src="inicio.php" frameborder="0" scrolling="yes" name="admin" width="100%" height="500"></iframe></td>
  </tr>
  <tr>
    <td>
    <pre><center><strong><a href="https://www.facebook.com/GimnasioMillenium1" target="_blank" style="color:#000">Inventarline</a></strong></center></pre>
    </td>
  </tr>
</table>
</body>
</html>