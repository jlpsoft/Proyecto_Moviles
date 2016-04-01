<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'conexion.php';
	Insertar();
}
function Insertar()
{
	global $connect;
	
	$nom=$_POST["nombre"];//nombre
	$apell = $_POST["apellido"];	//apellido
	$DNI = $_POST["DNI"];//DNI
	
	$query = "INSERT INTO persona(nombre,apellido,DNI) VALUES ('$nom','$apell','$DNI');";
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
}
?>