<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'conexion.php';
	createStudent();
}
function createstudent()
{
	global $connect;
	
	$name = $_POST["name"];	
	$price = $_POST["price"];
	$stock = $_POST["stock"];
	$category = $_POST["category"];
	$Brand = $_POST["Brand"];
	$size = $_POST["size"];
	$color = $_POST["color"];

	$query = " INSERT INTO product(`id`,`name`,`price`,`stock`,`idFkcategory`,`idfkBrand`,`idFkSize`,`idFkColor`)
	VALUES (NULL,'$name','$price','$stock','$category','$Brand','$size','$color');";
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
}
?>