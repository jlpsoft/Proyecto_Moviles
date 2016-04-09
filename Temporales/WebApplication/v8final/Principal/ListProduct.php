<!DOCTYPE html>
<html ng-app='angularRoutingApp' lang="es">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>   
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="resources/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link type="text/css" rel="stylesheet" href="resources/css/styles.css "/>
  
  <title>Listado de Producto</title>
  <link rel="shortcut icon" href="resources/images/logo.ico"/>
</head>

<body class="grey lighten-3">

<div>
    <div class="container">
        <div>
         <a class="left btn waves-effect waves-light lime darken-3" href="../principal.php#/inicio">INICIO<i class="material-icons right">replay</i></a> 
        </div>
        <br/><br/>
    </div>
    <div class="container">    
        <div class="col s12">
            <div class="titleBox light-blue darken-4 white-text">
                <h3 class="center-align">Lista de Producto de <?php echo $_POST["name"]?></h3>
            </div><br/>
        </div>  
    </div>
<div>


<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../conexion1.php';
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
echo "<div class='container'>";
echo "<hr/>";
 
echo "<table class='highlight centered responsive-table'>";
echo "<thead>";
echo         "<tr>";
echo 			"<th data-field='id'>Id</th>";
echo            "<th data-field='name'>Nombre</th>";
echo            "<th data-field='price'>Anexo</th>";
echo            "<th data-field='stock'>Observacion</th>";
echo            "<th data-field='category'>Codigo de Registro</th>";
echo            "<th data-field='brand'>CodigoModular</th>";
echo            "<th data-field='size'>Longitud</th>";
echo            "<th data-field='color'>Placa</th>";
echo          "</tr>";
echo "</thead>";

echo "<tbody>"; 
 
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

echo "</tbody>";
echo "</table>";
echo "</div>";
}
mysqli_close($connect);
?>

	
	

    <!--Import jQuery before materialize.js--> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>
    <script src="resources/js/materialize.js"></script>
    <script src="resources/js/init.js"></script>
    <script src="resources/js/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.3/angular-route.js"></script>
    <script src="resources/js/main.js"></script>
</body>
</html>