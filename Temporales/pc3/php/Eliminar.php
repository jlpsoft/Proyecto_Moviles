<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'conexion.php';
	Eliminar();
}
function Eliminar()
{
	global $connect;
	
	//$nom=$_POST["nombre"];//nombre
	//$apell = $_POST["apellido"];	//apellido
	$DNI = $_POST["DNI"];//DNI
	
	$query = " DELETE FROM persona where DNI ='$DNI';";
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
}
?>