<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../conexion1.php';
	Eliminar();
}
function Eliminar()
{
	global $connect;
	
	$id = $_POST["id"];//DNI
	
	$query = " DELETE FROM product where id ='$id';";
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
	header("location:../principal.php#/inicio");
}
?>