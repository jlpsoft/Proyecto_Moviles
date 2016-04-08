<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '..\conexion1.php';
	Modificar();
}
function Modificar()
{
	global $connect;
	
	$query = "UPDATE product SET name='$_POST[name]', price='$_POST[price]', stock='$_POST[stock]',
								 idFkCategory='$_POST[idFkCategory]', idFkBrand='$_POST[idFkBrand]', 
								 idFkSize='$_POST[idFkSize]', idFkColor='$_POST[idFkColor]'WHERE id='$_POST[id]';";
	
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
	header("location:../principal.html");
	
}
?>