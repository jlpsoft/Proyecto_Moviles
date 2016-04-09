<?php

require '../conexion2.php'; 

$sql = "SELECT * FROM product"; 
$sql = mysql_query($sql, $link); 
?> 


<div class="titleBox teal darken-4 white-text">
    <h3 class="center-align">Listar Producto</h3>
</div><br/>

<div class="container">
  <table  class="highlight centered responsive-table">
      <thead>
          <tr>
            <th data-field="id">Id</th>
            <th data-field="name">Nombre</th>
            <th data-field="price">Precio</th>
            <th data-field="stock">Cantidad</th>
            <th data-field="category">Categoria</th>
            <th data-field="brand">Marca</th>
            <th data-field="size">Tamaño</th>
            <th data-field="color">Color</th>
          </tr>
           </thead> 
      <tbody>
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
      </tbody>       
  </table>   
</div>