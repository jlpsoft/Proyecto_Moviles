<?php

	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("bdinventarline",$conexion);
	
	date_default_timezone_set("America/Bogota");
	
	function limpiar($tags){
		$tags = strip_tags($tags);
		$tags = stripslashes($tags);
		$tags = htmlentities($tags);
		$tags = mysql_real_escape_string($tags);
		return $tags;
	}
?>