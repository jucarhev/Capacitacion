 <?php 
	include("../conf/conf.php");
	$limite=$_POST['limite'];
	$unidad=$_POST['unidad'];
	$depa=$_POST['depa'];
	$anio=$_POST['anio'];
	$query="SELECT * FROM curso WHERE unidad='$unidad' and departamento='$depa' and terminado='Si' and anio='$anio' and planeado='planeado'";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT  * FROM curso WHERE unidad='$unidad' and departamento='$depa' and terminado='Si' and anio='$anio' and planeado='planeado' LIMIT $limite, 20";
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontradoss
 	<hr class="margen">
<table  width="100%" cellspacing="0" >
	<tr>
		<td colspan="6" class="center"><h1 class="h1">Cursos terminados</h1></td>
	</tr>
	<tr>
		<td colspan="5">
			<div class="espacio">
				<form action="" method="post" onsubmit="buscadorCursoTerminado();return false">
					<input type="text" id="buscaCursoTerminado" value="" placeholder="Ingrese el nombre del usuario" class="espacio1" required>
					<input type="submit" name="" value="Buscar" class="espacio2">
				</form>
			</div>
		</td>
		<td class="center">
			<a href="" title="Agregar nuevo dato" onclick="ventanajd(1);return false"><img src="../../img/add.png" alt=""></a>
			<a href="" title="Ver datos terminados" onclick="cursosterminador(0);return false"><img src="../../img/archivos.png" alt=""></a>
			<a href="" title="Cursos no planeados" onclick="cursosNP(0);return false"><img src="../../img/curso.jpg" alt=""></a>
		</td>
	</tr>
</table>
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
		echo "<aside class=\"anterior\" onclick=\"cursosterminador(".$limit.")\"><img src='../../img/anterior.png'></aside>";
	}else
	{
		echo "<aside class=\"anteriorvacio\"></aside>";
	}
	
	if ($limite<$total- 20) {
		$limit=$limite+ 20;
		echo "<aside class=\"siguiente\" onclick=\"cursosterminador(".$limit.")\"><img src='../../img/siguiente.png'></aside>";
	}
	else{
		echo "<aside class=\"siguientevacio\"></aside>";
	}
?>