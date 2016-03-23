<?php
	session_start();
	include_once('php_conexion.php'); 
	include_once('Class/funciones.php'); 
	include_once('Class/class_Employe.php');
	
	if($_SESSION['tipo_usu']=='ADMINISTRADOR' or $_SESSION['tipo_usu']=='USUARIO'){
	}else{
		header('location:error.php');
	}
	
	$id_curso=$_POST['curso'];
	if($_POST['curso']<>'X'){
	$obj_curso=new Consultar_Producto($id_curso);
		$nombre_curso=$obj_curso->consultar('nombre');
		$descri_curso=$obj_curso->consultar('curso');
	}else{
		$nombre_curso='Todos';
		$descri_curso='';
	}
	header("Content-Disposition: attachment; filename=Empleado_".$nombre_curso.".xls"); 
	header("Pragma: no-cache");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte Empleados</title>
</head>

<body>
<table width="100%" border="1">
  <tr>
    <td colspan="7">
    	<center><strong><?php echo $nombre_curso.' | '.$descri_curso; ?></strong></center>
    </td>
  </tr>
  <tr>
    <td width="5%"><center><strong>No.</strong></center></td>
    <td width="27%"><strong>Apellido y Nombre</strong></td>
                <td width="12%"><center><strong>DNI</strong></center></td>
                <td width="12%"><center><strong>Email</strong></center></td>
                <td width="12%"><center><strong>Data Start</strong></center></td>
                <td width="15%"><center><strong>Departamento</strong></center></td>
                <td width="30%"><center><strong>Address</strong></center></td>
                <td width="14%"><center><strong>Estado</strong></center></td>
                <td width="10%"><center><strong>pay</strong></center></td>
                <td width="32%"><center><strong>role</strong></center></td>
  </tr>
  <?php
  	$n=0;
  	if($_POST['curso']='X'){
  		$sql="SELECT * FROM employee ";		  	
	}else{
		$sql="SELECT * FROM employee WHERE estado='s'";		  	
	}
	$can=mysql_query($sql);
	while($dato=mysql_fetch_array($can)){
		$n++;
		$producto = new Consultar_Producto($dato['idFkRole']);
  ?>
  <tr>
    <td><center><strong><?php echo $n; ?></strong></center></td>
    <td><i class="icon-user"></i> <?php echo trim($dato['lastname']).' '.trim($dato['name']); ?></td>
                    <td><center><?php echo $dato['dni']; ?></center></td>
                <td><center><?php echo $dato['email']; ?></center></td>
                <td><center><?php echo $dato['datestart']; ?></center></td>
                <td><center><?php echo $dato['city']; ?></center></td>
                <td><center><?php echo $dato['address']; ?></center></td>
                    <td>
                    	<center>
                        <a href="empleado.php?estado=<?php echo $dato['id']; ?>" title="Cambiar Estado">
							<?php echo estado($dato['idFkRole']); ?>
                        </a>
                        </center>
                    </td>
                  <td><center><?php echo $producto->consultar('pay'); ?></center></td>  
                
                <td><center><?php echo $producto->consultar('description'); ?></center></td>
                    <td>
                    	<a href="#actualizar<?php echo $dato['id']; ?>" role="button" class="btn btn-mini" data-toggle="modal" title="Actualizar Informacion">
                    		<i class="icon-edit"></i>
                        </a>
                    </td>
                  </tr>
  <?php } ?>
</table>
</body>
</html>