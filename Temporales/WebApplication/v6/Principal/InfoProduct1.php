<?php

require '../conexion2.php'; 

$sql = "SELECT * FROM product"; 
$sql = mysql_query($sql, $link); 
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

	<title>Informe de Producto</title>
	<link rel="shortcut icon" href="resources/images/logo.ico"/>

         </head>
        <body class="grey lighten-3 ">

	       <div>

          <table  class="striped">
          <thead>
          <tr>
            <th data-field="id">id</th>
            <th data-field="name">nombre</th>
            <th data-field="price">precio</th>
            <th data-field="name">cantidad</th>
            <th data-field="name">Categoria</th>
            <th data-field="name">Marca</th>
            <th data-field="name">Tamaño</th>
            <th data-field="name">Color</th>
          </tr>
           </thead> 
        <?php 
        while($rs=mysql_fetch_array($sql)) 
        { 
        echo "<tr>" 
           ."<td>".$rs['id']."</td>" 
           ."<td>".$rs['name']."</td>"
           ."<td>".$rs['price']."</td>"
           ."<td>".$rs['stock']."</td>" 
           ."<td>".$rs['idFkCategory']."</td>" 
           ."<td>".$rs['idFkBrand']."</td>" 
           ."<td>".$rs['idFkSize']."</td>" 
           ."<td>".$rs['idFkColor']."</td>" 
           ."</tr>"; 
        } 
      ?> 

         
      </table> 
  
    </div>

    <!--Import jQuery before materialize.js--> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>
	<script src="resources/js/materialize.js"></script>
    <script src="resources/js/init.js"></script>

</body>
</html>