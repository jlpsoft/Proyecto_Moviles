<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'conexion.php';
	Buscar();
}
function Buscar()
{
	global $connect;

	$nombre = $_POST["nombre"];

	$query = " Select * FROM persona WHERE nombre LIKE '$nombre%'; ";
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[]= $row;
		}
		
	}
	
	header('Content-Type: application/json');
	echo json_encode(array("personas"=>$temp_array));
	mysqli_close($connect);
	
}
?>