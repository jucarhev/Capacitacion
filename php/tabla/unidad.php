<?php 
	include("../conf/conf.php");
	$limite=$_POST['limite'];
	$query="SELECT * FROM unidad WHERE nombre NOT LIKE '%Administrador%'";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT  * FROM unidad  WHERE nombre NOT LIKE '%Administrador%' LIMIT $limite, 20  ";
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontrados
 	<hr class="margen">
<table  width="100%" cellspacing="0" >
	<tr>
		<td colspan="6" class="center"><h1 class="h1">Unidades</h1></td>
	</tr>
	<tr>
		<td colspan="5">
			<div class="espacio">
				<form action="" method="post" onsubmit="buscadorP();return false">
					<input type="text" id="buscadorUnidad" value="" placeholder="Ingrese el nombre de la unidad" class="espacio1" required>
					<input type="submit" name="" value="Buscar" class="espacio2">
				</form>
			</div>
		</td>
		<td class="center">
			<a href="" title="" onclick="abrirventana(1);return false"><img src="../../img/add.png" alt=""></a>
		</td>
	</tr>
</table>
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">Unidad</td>
		<td class="Cabeza">Localidad</td>
		<td class="Cabeza">Municipio</td>
		<td class="Cabeza">Estado</td>
		<td class="Cabeza">Actividad</td>
		<td colspan="3" class="Cabeza">Operaciones</td>
	</tr>
<?php
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			echo "<td>".$fila['nombre']."</td>";
			echo "<td>".$fila['localidad']."</td>";
			echo "<td>".$fila['municipio']."</td>";
			echo "<td>".$fila['estado']."</td>";
			echo "<td>".$fila['actividad']."</td>";
			echo "<td><a href='' onclick='ventana2(".$fila['id'].",1);return false' title='Ver registros'><img src='../../img/lupa.png'></a></td>";
			echo "<td><a href='' onclick='ventana(".$fila['id'].",1);return false' title='Editar registro'><img src='../../img/pencil.png'></a></td>";
			echo "<td><a href='' onclick='EliminarUnidad(".$fila['id'].");return false' title='Dar de baja el registros'><img src='../../img/del.png'></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "<hr>";
	if ($limite>0) {
		$limit=$limite- 20;
		echo "<aside class=\"anterior\" onclick=\"tablaUnidad(".$limit.")\"><img src='../../img/anterior.png'></aside>";
	}else
	{
		echo "<aside class=\"anteriorvacio\"></aside>";
	}
	
	if ($limite<$total- 20) {
		$limit=$limite+ 20;
		echo "<aside class=\"siguiente\" onclick=\"tablaUnidad(".$limit.")\"><img src='../../img/siguiente.png'></aside>";
	}
	else{
		echo "<aside class=\"siguientevacio\"></aside>";
	}
?>