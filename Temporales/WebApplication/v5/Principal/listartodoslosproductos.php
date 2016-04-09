

<?php
		class conexion{
			function recuperarDatos(){
				$host = "localhost";
				$user = "root";
				$pw = "";
				$db = "bdinventarline";

			$con = mysql_connect($host, $user, $pw) or die("No se pudo conectar a la base de datos ");
			mysql_select_db($db, $con) or die ("No se encontro la base de datos. ");
			$query = "SELECT * FROM product WHERE name LIKE '$product%';";
			
			$resultado = mysql_query($query);

			while ($fila = mysql_fetch_array($resultado)) {
				
				//echo '<table class="highlight centered">';
					echo "<tr>";
					echo "	<td> $fila[id]</td> 
							<td> $fila[name]</td>
							<td> $fila[price]</td> 
							<td> $fila[stock]</td>
							<td> $fila[idFkBrand]</td>
							<td> $fila[idFkSize]</td>
							<td> $fila[idFkColor]</td>";
					echo "</tr>";
					
				//	echo '</table>' ;
			}
		}
	}
?>

