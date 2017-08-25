 <?php 
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$buscar=$_POST['buscar'];
	$depa=$_POST['depa'];
	$anio=$_POST['anio'];
	$query="SELECT * FROM listas where unidad='$unidad' and status='Completo' and departamento='$depa' and anio='$anio' and nombrecurso like '%$buscar%'";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT * FROM listas where unidad='$unidad' and status='Completo' and departamento='$depa' and anio='$anio' and nombrecurso like '%$buscar%'";
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontrados
<table  width="100%" cellspacing="0" >
	<tr>
		<td colspan="6" class="center"><h1 class="h1">Listas</h1></td>
	</tr>
	<tr>
		<td colspan="5">
			<div class="espacio">
				<form action="" method="post" onsubmit="buscadorListas();return false">
					<input type="text" id="buscarLista" value="" placeholder="Ingrese el nombre del usuario" class="espacio1" required>
					<input type="submit" name="" value="Buscar" class="espacio2">
				</form>
			</div>
		</td>
		<td class="center">
			<a href="" title="Agregar nueva lista" onclick="ventanajd(6);return false"><img src="../../img/add.png" alt=""></a>
			<a href="" title="Ver listas anteriores" onclick="ListasOk(0);return false"><img src="../../img/listas.jpg" alt=""></a>
		</td>
	</tr>
</table>
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">Id</td>
		<td class="Cabeza">Unidad</td>
		<td class="Cabeza">Curso</td>
		<td class="Cabeza">Lugar</td>
		<td class="Cabeza">Instructor</td>
		<td class="Cabeza">duracion</td>
		<td class="Cabeza">Departamento</td>
		<td class="Cabeza">Operaciones</td>
	</tr>
	<?php
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			echo "<td>".$fila['id']."</td>";
			echo "<td>".$fila['unidad']."</td>";
			echo "<td>".$fila['nombrecurso']."</td>";
			echo "<td>".$fila['lugar']."</td>";
			echo "<td>".$fila['instructor']."</td>";
			echo "<td>".$fila['duracion']."</td>";
			echo "<td>".$fila['departamento']."</td>";
			echo "<td><a href='' onclick='VerListas(".$fila['id'].");return false' title='Ver registros'><img src='../../img/lupa.png'></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>