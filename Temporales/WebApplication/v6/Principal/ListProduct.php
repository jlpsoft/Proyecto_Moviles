<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="resources/css/materialize.min.css"  media="screen,projection"/>
    <link href="resources/css/styles.css" rel="stylesheet" type="text/css">

	<title>Visualizar Producto</title>
	<link rel="shortcut icon" href="resources/images/logo.ico"/>

</head>
<body class="grey lighten-3 ">

<div class="container">
  <div class="col s12 M6">
              <div class="titleBox light-blue darken-4 white-text">
                <h3 class="center-align">Lista de Producto de <?php echo $_POST["name"]?></h3>
              </div><br/>

              </div>  
            </div> 
          <div>


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

	//$keys_arr=array_keys($temp_array[0]);

echo "<hr/>";
 
echo "<table class='striped'>";
echo "<thead>";
echo         "<tr>";
echo 			"<th data-field='id'>id</th>";
echo            "<th data-field='name'>nombre</th>";
echo            "<th data-field='price'>precio</th>";
echo            "<th data-field='name'>cantidad</th>";
echo            "<th data-field='name'>Categoria</th>";
echo            "<th data-field='name'>Marca</th>";
echo            "<th data-field='name'>Tamaño</th>";
echo            "<th data-field='name'>Color</th>";
echo          "</tr>";
echo           "</thead>";
 
 
/*echo "<tr>";
    echo "<th>orden</th>";
    foreach ($keys_arr as $key_3 => $value_key)
    {
        echo "<th>".$value_key."</th>";
    }
echo "</tr>";*/
 
foreach ($temp_array as $key => $usuario)
{
    echo "<tr>";
      //  echo "<td>".$key."</td>";
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

	</div>
	<div>
		 <a class="right  margin-right btn waves-effect waves-light lime darken-3" href="../principal.php">INICIO<i class="material-icons right">replay</i></a> 
	</div>

    <!--Import jQuery before materialize.js--> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>
	<script src="resources/js/materialize.js"></script>
    <script src="resources/js/init.js"></script>

</body>
</html>