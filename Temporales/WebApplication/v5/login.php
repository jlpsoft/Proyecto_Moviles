<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="resources/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="resources/css/styles.css" rel="stylesheet" type="text/css">
	<title>Aceptacion de Usuario</title>
	 <link rel="shortcut icon" href="resources/images/logo.ico"/>
</head>
<body class="principal">

<?php
include ("conexion.php");

if (isset($_POST['username']) && !empty($_POST['username']) &&
	isset($_POST['password']) && !empty($_POST['password']))

{
$con=mysql_connect($host,$user,$pass) or die ("problemas al conectar");
mysql_select_db($db, $con) or die ("problemas al conectar con la bd");
$estandar=mysql_query("SELECT * FROM employee where username='$_POST[username]' AND password='$_POST[password]' ",$con);
}

if($row=mysql_fetch_array($estandar)){
	header("location:principal.html");
}


else{
		echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';
		echo '<h4 class="center col s12 m6">Error en el usuario o contrasena incorrecto </h4>';
		echo "<br>";
		echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="index.html">Regresar</a>';
		echo $regresar;
		echo '</div>';
		echo '</div>';
}

?>

   	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>

</body>
</html>

