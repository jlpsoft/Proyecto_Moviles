<div class="container">
  <div class="col s12">
    <form action="principal/a.php" method="post">
      <div class="titleBox teal darken-4 white-text">
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
          <a class="left btn waves-effect waves-light lime darken-3" href="index.html"><i class="material-icons left">replay</i></a>
          <button class="right btn waves-effect waves-light lime darken-3" type="submit"><i class="material-icons">done_all</i> </button> 
        </div>  
      </div> 
    </form>
  </div>
</div>

<div>
  <table  class="striped">
    <thead>
      <tr>
        <th data-field="id">Id</th>
        <th data-field="name">Nombre</th>
        <th data-field="price">Precio</th>
        <th data-field="stock">Cantidad</th>
        <th data-field="idFkBrand">Marca</th>
        <th data-field="idFkSize">Tamaño</th>
        <th data-field="idFkColor">Color</th>
      </tr>
    </thead> 
 
    <tbody>       
           <?php
              include("listartodoslosproductos.php");
              $Con = new conexion();
              $Con->recuperarDatos();
          ?>
          </tbody>
      </table>   
    </div>