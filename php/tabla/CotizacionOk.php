 <?php 
	include("../conf/conf.php");
	$anio=$_POST['anio'];
	$unidad=$_POST['unidad'];
	$departamento=$_POST['depa'];
	$query="SELECT * FROM presupuestado where status='Si' and unidad='$unidad' and departamento='$departamento'";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT * FROM presupuestado where status='Si' and unidad='$unidad' and departamento='$departamento'";
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontrados
 	<hr class="margen">
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
		<td colspan="1" class="Cabeza">Opci&oacute;n</td>
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
			echo "</tr>";
		}
	}
	echo "</table>";
?>