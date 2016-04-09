<?php
require '../conexion2.php';
session_start(); 
ob_start(); 

$sql = "SELECT * FROM employee where username='$_SESSION[usuario]';"; 
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

  <title>Informe del Empleado</title>
  <link rel="shortcut icon" href="resources/images/logo.ico"/>

</head>
 <body class="grey lighten-3 ">

  <div>

          <table  class="striped">
          <thead>
          <tr>
            <th data-field="id">id</th>
            <th data-field="name">nombre</th>
            <th data-field="lastname">apellido</th>
            <th data-field="email">email</th>
            <th data-field="name">username</th>
            <th data-field="name">dni</th>
            <th data-field="name">Fecha de Inicio</th>
            <th data-field="name">Fecha de nacimiento</th>
            <th data-field="name">Ciudad</th>
            <th data-field="name">Direccion</th>
          </tr>
           </thead> 
        <?php 
        while($rs=mysql_fetch_array($sql)) 
        { 
        echo "<tr>" 
           ."<td>".$rs['id']."</td>" 
           ."<td>".$rs['name']."</td>"
           ."<td>".$rs['lastname']."</td>"
           ."<td>".$rs['email']."</td>" 
           ."<td>".$rs['username']."</td>" 
           ."<td>".$rs['dni']."</td>" 
           ."<td>".$rs['dateborn']."</td>" 
           ."<td>".$rs['datestart']."</td>"
           ."<td>".$rs['city']."</td>" 
           ."<td>".$rs['address']."</td>"  
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