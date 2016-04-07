<?php 
function conectarse($host,$usuario,$password,$BBDD){ 
   $link=mysql_connect($host,$usuario,$password) or die (mysql_error()); 
   mysql_select_db($BBDD,$link) or die (mysql_error()); 
   return $link; 
 
} 
$link=conectarse("localhost","root","","u145018390_bdinv");  

$sql = "SELECT * FROM product"; 
$sql = mysql_query($sql, $link); 
?> 
<html> 
<head> 
<title>ALgo</title> 
</head> 
<body> 

<table> 
<?php 
  while($rs=mysql_fetch_array($sql)) 
  { 
    echo "<tr>" 
           ."<td>".$rs['id']."</td>" 
           ."<td>".$rs['name']."</td>"
           ."<td>".$rs['price']."</td>"
           ."<td>".$rs['stock']."</td>" 
           ."</tr>"; 
  } 
?> 
</table> 

</body> 
</html>