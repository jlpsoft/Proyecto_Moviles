<?php
	#####fechas
	function fecha($fecha){
		$meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
		$a=substr($fecha, 0, 4); 	
		$m=substr($fecha, 5, 2); 
		$d=substr($fecha, 8);
		return $d." / ".$meses[$m-1]." / ".$a;
	}
	#####formato de estados
	function estado($estado){
		if($estado=='s'){
			return '<span class="label label-important">No activo</span>';
		}else{
			return '<span class="label label-success">Activo</span>';
		}
	}
	
?>