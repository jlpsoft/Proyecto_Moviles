<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'conexion.php';
	Modificar();
}
function Modificar()
{
	global $connect;
	
	$query = "UPDATE product SET name='$_POST[name]', price='$_POST[price]', stock='$_POST[stock]',
	 category = '$_POST[idFkCategory]', brand='$_POST[idFkBrand]' idFkSize = '$_POST[idFkSize]',
	 idFkColor='$_POST[idFkColor]' WHERE DNI='$_POST[id]';";
	
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
	
}
?>