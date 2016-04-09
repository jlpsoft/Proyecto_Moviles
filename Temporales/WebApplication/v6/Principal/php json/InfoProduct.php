<?php
	require '..\conexion1.php';
	Buscar();
function Buscar()
{
	global $connect;

	//$product = $_POST["name"];

	//$query = "SELECT * FROM product WHERE name LIKE '$product%';";
	$query = "SELECT * FROM product";
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[]= $row;
		}
	}
	print_r ($temp_array);
	//header('Content-Type: application/json');
	echo json_encode(array("product"=>$temp_array));
	mysqli_close($connect);

}
?>



