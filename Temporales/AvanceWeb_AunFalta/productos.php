<?php
 		session_start();
		include_once('php_conexion.php'); 
		include_once('Class/funciones.php'); 
		include_once('Class/class_Employe.php');
		if($_SESSION['tipo_usu']=='ADMINISTRADOR' or $_SESSION['tipo_usu']=='USUARIO'){
		}else{
			header('location:error.php');
		}
		
		#estado
		if(!empty($_GET['estado'])){
			$nit=limpiar($_GET['estado']);
			$cans=mysql_query("SELECT * FROM product WHERE  id='$nit'");
			if($dat=mysql_fetch_array($cans)){
				$xSQL="Update salones Set estado='n' Where id='$nit'";
				mysql_query($xSQL);
				header('location:productos.php');
			}else{
				$xSQL="Update salones Set estado='s' Where id='$nit'";
				mysql_query($xSQL);
				header('location:productos.php');
			}
		
                        
                        }
		
		#paginar
		$maximo=5;
		if(!empty($_GET['pag'])){
			$pag=limpiar($_GET['pag']);
		}else{
			$pag=1;
		}
		$inicio=($pag-1)*$maximo;
		
		$cans=mysql_query("SELECT COUNT(name)as total FROM employee");
		if($dat=mysql_fetch_array($cans)){
			$total=$dat['total']; #inicializo la variable en 0
		}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blanco</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/application.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
<table width="90%" border="0">
  <tr>
    <td>
    
    <table class="table table-bordered">
      <tr class="success">
        <td>
       	    <div class="row-fluid">
	            <div class="span6">
                	<h3><img src="img/curso.jpg" class="img-circle img-polaroid" width="70" height="65"> 
                        	Registro & Control de Productos</h3>
                </div>
    	        <div class="span6">
                	<div align="right">
                	<div class="btn-group">
                    	<a href="#nuevo" role="button" class="btn" data-toggle="modal">
                            	<strong><i class="icon-user"></i> Ingresar Nuevo</strong>
                        </a> 
                    	<button class="btn" data-toggle="dropdown">
                        	<i class="icon-search"></i> <strong>Ordenar por </strong> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <?php
							$c=mysql_query("SELECT * FROM salones GROUP BY curso");
							while($d=mysql_fetch_array($c)){
								echo '<li><a href="productos.php?cursos='.$d['curso'].'">'.$d['curso'].'</a></li>';	
							}
						?>
                            <li><a href="productos.php?cursos=0">Todos</a></li>
                        </ul>
                    </div><br><br>
                	<form name="form1" method="post" action="">
                    	<div class="input-prepend">
                        	<span class="add-on"><i class="icon-search"></i></span>
                            <input name="bus" type="text" placeholder="Buscar Producto" class="input-xlarge" autocomplete="off" autofocus>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </td>
      </tr>
    </table>
    
    </td>
  </tr>
  <tr>
    <td>
    <?php 
		if(!empty($_POST['nombre']) and !empty($_POST['curso'])){
			$nombre=limpiar($_POST['nombre']);
			$curso=limpiar($_POST['curso']);
			
			if(empty($_POST['id'])){
				$c_curso = new Proceso_Producto($nombre,$curso,'');
				$c_curso->crear();
				echo '	<div class="alert alert-info" align="center">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>
								El Curso / Salon "'.$nombre.'" Registrado con Exito en la Base de Datos							
							</strong>
						</div>';
			}else{
				$id=limpiar($_POST['id']);
				$c_curso = new Proceso_Producto($nombre,$curso,$id);
				$c_curso->actualizar();
				echo '	<div class="alert alert-info" align="center">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>
								El Curso / Salon "'.$nombre.'" Actualizado con Exito en la Base de Datos							
							</strong>
						</div>';
			}
		}
	?>
    <table class="table table-bordered table table-hover">
      <tr class="success">
        <td><strong>Nombre del Producto</strong></td>
        <td><strong>Precio</strong></td>
        <td><strong>stock</strong></td>
        <td><center><strong>Categoria</strong></center></td>
        <td><center><strong>Brand</strong></center></td>
       <td><center><strong>Size</strong></center></td>
      <td><center><strong>Color</strong></center></td>
        <td>&nbsp;</td>
      </tr>
      <?php
	  	if(empty($_GET['productos'])){
			if(empty($_POST['bus'])){
				$sql="SELECT * FROM product ORDER BY name LIMIT $inicio, $maximo";
			}else{
				$bus=limpiar($_POST['bus']);
				$sql="SELECT * FROM product WHERE name LIKE '%$bus%' or stock LIKE '%$bus%'ORDER BY name LIMIT $inicio, $maximo";
			}
	 	}else{
			$bus=limpiar($_GET['productos']);
			$sql="SELECT * FROM product WHERE name='$bus' ORDER BY name LIMIT $inicio, $maximo";
		}
			  	
		$can=mysql_query($sql);
		while($dato=mysql_fetch_array($can))
                {	                $salones = new Consultar_category($dato['idFkCategory']);
                                        $brand= new Consultar_brand($dato['idFkCategory']);
                                        $size= new Consultar_size($dato['idFkSize']);
                                        $color= new Consultar_color($dato['idFkColor']);
                                        

	?>
      <tr>
        <td><i class="icon-shopping-cart"></i> <?php echo $dato['name']; ?></td>
        <td><?php echo $dato['price']; ?></td>
        <td><?php echo $dato['stock']; ?></td>
        
        <td>
        	<center><?php echo $salones->consultar('description'); ?></center>
        </td>
        <td>
        	<center><?php echo $brand->consultar('name'); ?></center>
        </td>
        <td>
        	<center><?php echo $size->consultar('name'); ?></center>
        </td>
        <td>
        	<center><?php echo $color->consultar('name'); ?></center>
        </td>
        <td>
        	<center>
        	<a href="#actualizar<?php echo $dato['id']; ?>" role="button" class="btn btn-mini" data-toggle="modal" title="Actualizar Informacion">
            	<i class="icon-edit"></i>
            </a>
            </center>
        </td>
      </tr>
       
      <?php } ?>
    </table>
    <center>
	<div class="pagination">
        <ul>
        	<?php
			if(empty($_GET['cursos']) and empty($_POST['bus'])){
				$tp = ceil($total/$maximo);#funcion que devuelve entero redondeado
         		for	($n=1; $n<=$tp ; $n++){
					if($pag==$n){
						echo '<li class="active"><a href="productos.php?pag='.$n.'">'.$n.'</a></li>';	
					}else{
						echo '<li><a href="productos.php?pag='.$n.'">'.$n.'</a></li>';	
					}
				}
				
			}
			?>
        </ul>
    </div>  
    </center>  
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
    
</div   >
</body>
</html>