<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
	<title>Aceptacion de Usuario</title>
	 <link rel="shortcut icon" href="images/logo.ico"/>
</head>
<body class="principal">



<?php
include ("conexion.php");

if(isset($_POST['name'])		&& !empty($_POST['name'])		&&
	isset($_POST['password'])	&& !empty($_POST['password'])	&&
	isset($_POST['fname'])		&& !empty($_POST['fname'])		&&
	isset($_POST['lastname'])	&& !empty($_POST['lastname'])	&&
	isset($_POST['correo'])		&& !empty($_POST['correo'])		&&
	isset($_POST['dni'])		&& !empty($_POST['dni'])		&&
	isset($_POST['dateborn'])	&& !empty($_POST['dateborn'])	&&
	isset($_POST['city'])		&& !empty($_POST['city'])		&&
	isset($_POST['address'])	&& !empty($_POST['address']))

{
	$con=mysql_connect($host,$user,$pass) or die("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectar con la bd");

	mysql_query("INSERT INTO login 		(username,password) 									VALUES ('$_POST[name1]','$_POST[password1]')",$con);
	mysql_query("INSERT INTO employee	(name,lastname,dni,dateborn,datestart,city,address) 	VALUES ('$_POST[fname]','$_POST[lastname]',
	'$_POST[correo]','$_POST[dni]','$_POST[dateborn]','$_POST[city]','$_POST[address]')",$con);
	
	echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';

		echo '<h4 class="center col s12 m6">Usuario Registrado</h4>';
		echo "<br>";

		echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="index.html">Regresar</a>';
		echo $regresar;
		echo '</div>';
	echo '</div>';
	
}
else
	{
	echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';
	echo '<h4 class="center col s12 m6">Problemas al insertar datos.</h4>';
	echo "<br>";
	
	echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="index.html">Regresar</a>';
	echo $regresar;
	echo '</div>';
	echo '</div>';
	}

?>


  	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>
