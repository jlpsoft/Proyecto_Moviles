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
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'conexion1.php';
	Insertar();
}
function Insertar(){

	global $connect;

if(isset($_POST['name'])		&& !empty($_POST['name'])		&&
	isset($_POST['lastname'])	&& !empty($_POST['lastname'])	&&
	isset($_POST['email'])		&& !empty($_POST['email'])		&&
	isset($_POST['username'])	&& !empty($_POST['username'])	&&
	isset($_POST['password'])	&& !empty($_POST['password'])	&&
	isset($_POST['dni'])		&& !empty($_POST['dni'])		&&
	isset($_POST['dateborn'])	&& !empty($_POST['dateborn'])	&&
	isset($_POST['datestart'])	&& !empty($_POST['datestart'])	&&
	isset($_POST['city'])		&& !empty($_POST['city'])		&&
	isset($_POST['address'])	&& !empty($_POST['address']))

{
	

	$name = $_POST['name'];
	$last = $_POST['lastname'];
	$ema = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$dni = $_POST['dni'];
	$dateb = $_POST['dateborn'];
	$dates = $_POST['datestart'];
	$cit = $_POST['city'];
	$addr = $_POST['address'];

	$query = "INSERT INTO employee(name,lastname,email,username,password,dni,dateborn,datestart,city,address) 	
		VALUES ('$name','$last','$ema','$user','$pass','$dni','$dateb','$dates','$cit','$addr');";

	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);

	//mysql_query("INSERT INTO login 		(username,password) 									VALUES ('$_POST[name1]','$_POST[password1]')",$con);
	/*$con=mysql_connect($host,$user,$pass) or die("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectar con la bd");
	mysql_query($con,$query);*/	
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
}
?>


  	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>
