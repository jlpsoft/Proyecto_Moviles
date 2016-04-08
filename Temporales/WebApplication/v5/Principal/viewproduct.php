<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  require '..\conexion2.php';
}
$products = $_POST["name"];
$query = "SELECT * FROM product WHERE name LIKE '$products%';";
$sql = mysql_query($query, $link); 
?>

<div class="container">
  <div class="col s12">
          <form action="principal/viewproduct.php" method="post">
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
  </div>
</div>