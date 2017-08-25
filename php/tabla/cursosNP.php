 <?php 
	include("../conf/conf.php");
	$limite=$_POST['limite'];
	$unidad=$_POST['unidad'];
	$depa=$_POST['depa'];
	$anio=$_POST['anio'];
	$query="SELECT * FROM curso WHERE unidad='$unidad' and departamento='$depa' and terminado='Si' and anio='$anio' and planeado='No planeada'";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT  * FROM curso WHERE unidad='$unidad' and departamento='$depa' and terminado='Si' and anio='$anio' and planeado='No planeada' LIMIT $limite, 20";
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontradoss
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
	echo "<hr>";
	if ($limite>0) {
		$limit=$limite- 20;
		echo "<aside class=\"anterior\" onclick=\"cursosNP(".$limit.")\"><img src='../../img/anterior.png'></aside>";
	}else
	{
		echo "<aside class=\"anteriorvacio\"></aside>";
	}
	
	if ($limite<$total- 20) {
		$limit=$limite+ 20;
		echo "<aside class=\"siguiente\" onclick=\"cursosNP(".$limit.")\"><img src='../../img/siguiente.png'></aside>";
	}
	else{
		echo "<aside class=\"siguientevacio\"></aside>";
	}
?>