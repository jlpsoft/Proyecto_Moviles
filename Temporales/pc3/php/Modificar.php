<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'conexion.php';
	Modificar();
}
function Modificar()
{
	global $connect;
	
	$query = "UPDATE persona SET nombre='$_POST[nombre]', apellido='$_POST[apellido]'WHERE DNI='$_POST[DNI]';";
	
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
	
}
?>