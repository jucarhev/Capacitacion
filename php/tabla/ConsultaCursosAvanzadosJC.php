 <?php 
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$anio=$_POST['anio'];
	$depa=$_POST['depa'];
	$plan=$_POST['plan'];
	$query="SELECT * FROM curso WHERE unidad='$unidad' and departamento='$depa' and anio='$anio' and planeado='$plan'";
	$res=$db->query($query);
	$total=$res->num_rows;
	// echo $paginas;
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontrados
 	<hr class="margen">
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">Departamento</td>
		<td class="Cabeza">Unidad</td>
		<td class="Cabeza">Nombre</td>
		<td class="Cabeza">Objetivos</td>
		<td class="Cabeza">Instructor</td>
		<td class="Cabeza">A&ntilde;o</td>
		<td class="Cabeza">Rubro</td>
	</tr>
<?php
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			echo "<td>".$fila['departamento']."</td>";
			echo "<td>".$fila['unidad']."</td>";
			echo "<td>".$fila['nombre']."</td>";
			echo "<td>".$fila['objetivos']."</td>";
			echo "<td>".$fila['instructor']."</td>";			
			echo "<td>".$fila['anio']."</td>";
			echo "<td>".$fila['rubro']."</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>