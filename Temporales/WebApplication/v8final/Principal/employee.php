<?php
require '../conexion2.php'; 
$sql = "SELECT * FROM employee"; 
$sql = mysql_query($sql, $link); 
?>                                                       

 <div class="grey lighten-3 ">
    <div class="titleBox teal darken-4 white-text">
      <h3 class="center-align">Lista de todos los Empleado</h3>
    </div><br/>
              

  <div>
      <table  class="highlight centered responsive-table">
        <thead>
          <tr>
            <th data-field="id">Id</th>
            <th data-field="name">Nombre</th>
            <th data-field="lastname">Apellido</th>
            <th data-field="email">Email</th>
            <th data-field="username">Username</th>
            <th data-field="dni">DNI</th>
            <th data-field="datestart">Fecha de Inicio</th>
            <th data-field="dateborn">Fecha de nacimiento</th>
            <th data-field="city">Ciudad</th>
            <th data-field="address">Direccion</th>
          </tr>
        </thead> 
        <tbody>
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
        </tbody>           
      </table> 
    </div>
  </div>