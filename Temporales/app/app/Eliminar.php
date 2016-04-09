<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'conexion.php';
	Eliminar();
}
function Eliminar()
{
	global $connect;
	
	$ID = $_POST["id"];//ID
	$query = " DELETE FROM product where id ='$ID';";
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
}
?>