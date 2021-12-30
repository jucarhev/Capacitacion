 <?php 
	include("../conf/conf.php");
	$anio=$_POST['anio'];
	$unidad=$_POST['unidad'];
	$departamento=$_POST['departamento'];
	$query="SELECT * FROM presupuestado where status='0' or status='no' and unidad='$unidad' and departamento='$departamento'";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT * FROM presupuestado where status='0' or status='no' and unidad='$unidad' and departamento='$departamento'";
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontrados
 	<hr class="margen">
<table  width="100%" cellspacing="0" >
	<tr>
		<td class="center"><h1 class="h1">Cursos para presupuesto</h1></td>
	</tr>
	<tr>
		<td class="center">
			<a href="" title="Generar reporte" onclick="ventana3(5);return false"><img src="../../assets/img/icono_cotice.gif" alt=""></a>
			<a href="" title="Ver cursos aprobados" onclick="CursosPreoK();return false"><img src="../../assets/img/archivos.png" alt=""></a>
		</td>
	</tr>
</table>
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">nombre</td>
		<td class="Cabeza">imparte</td>
		<td class="Cabeza">lugar</td>
		<td class="Cabeza">duracion</td>
		<td class="Cabeza">numpersonas</td>
		<td class="Cabeza">objetivos</td>
		<td class="Cabeza">costocurso</td>
		<td class="Cabeza">A&ntilde;o</td>
		<td colspan="3" class="Cabeza">Operaciones</td>
	</tr>
<?php
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			echo "<td>".$fila['nombre']."</td>";
			echo "<td>".$fila['imparte']."</td>";
			echo "<td>".$fila['lugar']."</td>";
			echo "<td>".$fila['duracion']."</td>";
			echo "<td>".$fila['numpersonas']."</td>";			
			echo "<td>".$fila['objetivos']."</td>";
			echo "<td>".$fila['costocurso']."</td>";
			echo "<td>".$fila['anio']."</td>";
			echo "<td><a href='' onclick='VerCursoP(".$fila['id'].");return false' title='Ver registro'><img src='../../img/lupa.png'></a></td>";
			echo "<td><a href='' onclick='ventana4(".$fila['id'].");return false' title='Editar registro'><img src='../../img/pencil.png'></a></td>";
			echo "<td><a href='' onclick='EliminarCursoPres(".$fila['id'].");return false' title='Dar de baja el registros'><img src='../../img/del.png'></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>