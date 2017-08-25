 <?php 
	include("../conf/conf.php");
	$limite=$_POST['limite'];
	$unidad=$_POST['unidad'];
	$departamento=$_POST['departamento'];
	$t="Jefe de departamento";
	$query="SELECT * FROM trabajador WHERE  unidad='$unidad' and departamento='$departamento'";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT * FROM trabajador WHERE  unidad='$unidad' and departamento='$departamento'";
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontrados
 	<hr class="margen">
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">N. Cobro</td>
		<td class="Cabeza">N. Ficha</td>
		<td class="Cabeza">Nombre</td>
		<td class="Cabeza">A. Paterno</td>
		<td class="Cabeza">A. Materno</td>
		<td class="Cabeza">Departamento</td>
		<td colspan="1" class="Cabeza">Operaciones</td>
	</tr>
<?php
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			echo "<td>".$fila['numerocobro']."</td>";
			echo "<td>".$fila['numeroficha']."</td>";
			echo "<td>".$fila['nombre']."</td>";
			echo "<td>".$fila['apaterno']."</td>";
			echo "<td>".$fila['amaterno']."</td>";
			echo "<td>".$fila['departamento']."</td>";
			echo "<td><a href='' onclick='ventana2(".$fila['id'].",4);return false' title='Ver registros'><img src='../../img/lupa.png'></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>