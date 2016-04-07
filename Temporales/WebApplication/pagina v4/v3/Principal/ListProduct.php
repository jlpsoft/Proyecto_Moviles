<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '..\conexion1.php';
	Buscar();
}
function Buscar()
{
	global $connect;

	$product = $_POST["name"];

	$query = "SELECT * FROM product WHERE name LIKE '$product%';";
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[]= $row;
		}
	}
	//header('Content-Type: application/json');
	build_table(json_decode(json_encode($temp_array),true));
	

}
function build_table($temp_array){

	$keys_arr=array_keys($temp_array[0]);

echo "<hr/>";
 
echo "<table border='1'>";
 
 
echo "<tr>";
    echo "<th>id</th>";
    foreach ($keys_arr as $key_3 => $value_key)
    {
        echo "<th>".$value_key."</th>";
    }
echo "</tr>";
 
foreach ($temp_array as $key => $usuario)
{
    echo "<tr>";
        echo "<td>".$key."</td>";
        foreach ($usuario as $key2 => $values)
        {
            //echo "<pre>".$key2;
            echo "<td>";
            print_r($values);
            echo "</td>";
            //echo "</pre>";
        }
    echo "</tr>";    }
echo "</table>";
}
mysqli_close($connect);
?>



