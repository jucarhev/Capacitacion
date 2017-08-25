<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Errores</title>
	<link rel="shortcut icon" href="../../img/free-office-Icons.ico" type="image/x-icon" />
	<link rel="stylesheet" href="../../css/estilos.css">
</head>
<body>
	<div class="tablaError">
		<div class="tituloerror">
			<span class="label">La siguiente tabla contiene los errores recopilados por parte de los usuarios.
			Guarde los resultados en PDF mediante la opcion imprimir del navegador(CTRL + P). En el lado izquierdo
			encontrara la opcion de <i>Destino</i> click en ese boton y coloque la opcion <i>Guardar como pdf</i> 
			por ultimo se cerrara la ventana y en la parte izquierda aparecera la opcion de guardar de click ahi y
			envie el archivo con el perconal a cargo del matenimiento.
			</span>
		</div>
		<table  width="100%" cellspacing="0" border="1">
		<tr>
			<td class="Cabeza">No.</td>
			<td class="Cabeza">clave</td>
			<td class="Cabeza">descripcion</td>
			<td class="Cabeza">tipouser</td>
			<td class="Cabeza">unidad</td>
			<td class="Cabeza">fecha</td>
		</tr>
		<?php
			include("../conf/conf.php");
			$query="SELECT * FROM errores";
			$res=$db->query($query);
			if ($res->num_rows>0) {
				$numb=0;
				while ($fila=$res->fetch_array()) {
					$numb=$numb+1;
					echo "<tr>";
					echo "<td>".$numb."</td>";
					echo "<td>".$fila['clave']."</td>";
					echo "<td>".$fila['descripcion']."</td>";
					echo "<td>".$fila['tipouser']."</td>";
					echo "<td>Administrador</td>";
					echo "<td>".$fila['fecha']."</td>";
					echo "</tr>";
				}
			}
			echo "</table>";
			echo "<hr>";
		?>
	</div>
	
</body>
</html>