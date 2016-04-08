<?php
/*define('hostname', 'localhost');
define('user', 'root');
define('password', '');
define('databaseName', 'u145018390_bdinv');
$connect = mysqli_connect(hostname, user, password, databaseName);*/

function conectarse($host,$usuario,$password,$BBDD){ 
   $link=mysql_connect($host,$usuario,$password) or die (mysql_error()); 
   mysql_select_db($BBDD,$link) or die (mysql_error()); 
   return $link; 
} 
$link=conectarse("localhost","root","","bdinventarline"); 

?>