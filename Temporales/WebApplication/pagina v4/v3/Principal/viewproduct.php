<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  require '..\conexion1.php';
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
 
echo "<table class='striped'>";
 
 
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

//mysqli_close($connect);
?>

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
          <form action="Principal/viewproduct.php" method="post">
              <div class="titleBox light-blue darken-4 white-text">
                <h3 class="center-align">Listar Producto</h3>
              </div><br/>

              <div class="row">
                <div class="input-field col s12">
                  <input id="nameproduct" type="text" class="validate" name="name">
                  <label for="nameproduct">Nombre del Producto</label>
                </div>
              </div> 

                  <div class="modal-footer grey lighten-3">
              <div class="col s12">
                <a class="left  margin-left btn waves-effect waves-light lime darken-3" href="index.html">INICIO<i class="material-icons left">replay</i></a>
                <button class="right margin-right btn waves-effect waves-light lime darken-3" type="submit">Procesar<i class="material-icons right">spellcheck</i> </button> 
                <p id="demo"></p>


              </div>  
            </div> 
          </form>
          <div>
          <?php
          
          Buscar();
            ?>
</div>
  </div>
</div>

    <!--Import jQuery before materialize.js--> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>
	<script src="resources/js/materialize.js"></script>
    <script src="resources/js/init.js"></script>

</body>
</html>