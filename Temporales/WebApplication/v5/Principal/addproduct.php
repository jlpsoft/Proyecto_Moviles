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
<div class="container">

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '..\conexion1.php';
	addProduct();
}
function addProduct(){

	global $connect;

if(isset($_POST['name'])			&& !empty($_POST['name'])			&&
	isset($_POST['price'])			&& !empty($_POST['price'])			&&
	isset($_POST['stock'])			&& !empty($_POST['stock'])			&&
	isset($_POST['idFkCategory'])	&& !empty($_POST['idFkCategory'])	&&
	isset($_POST['idFkBrand'])		&& !empty($_POST['idFkBrand'])		&&
	isset($_POST['idFkSize'])		&& !empty($_POST['idFkSize'])		&&
	isset($_POST['idFkcolor'])		&& !empty($_POST['idFkcolor']))
{
	
	$name = $_POST['name'];
	$pric = $_POST['price'];
	$stock = $_POST['stock'];
	$idCate = $_POST['idFkCategory'];
	$idBrand = $_POST['idFkBrand'];
	$idSize = $_POST['idFkSize'];
	$idcolor = $_POST['idFkcolor'];

	$query = "INSERT INTO product(name,price,stock,idFkCategory,idFkBrand,idFkSize,idFkcolor) 	
		VALUES ('$name','$pric','$stock','$idCate','$idBrand','$idSize','$idcolor');";

	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);

	echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';

		echo '<h4 class="center col s12 m6">Producto Registrado</h4>';
		echo "<br>";

		echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="principal.html">Regresar</a>';
		echo $regresar;
		echo '</div>';
	echo '</div>';
	echo '<script>alert("USUARIO REGISTRADO")</script>';
	echo "<script>location.href='../principal.html'</script>;";
	header("location:../principal.html");
	
}
else
	{
	echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';
	echo '<h4 class="center col s12 m6">Problemas al insertar datos.</h4>';
	echo "<br>";
	
	echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="..\principal.html">Regresar</a>';
	echo $regresar;
	echo '</div>';
	echo '</div>';
	}
}
?>

</div>

   	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>
</body>
</html>