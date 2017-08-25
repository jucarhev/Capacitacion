<?php 
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$buscar=$_POST['buscar'];
	$query="SELECT * FROM trabajador WHERE  unidad='$unidad' and numerocobro like '%$buscar%'";
	$res=$db->query($query);
?>
<table>
	<tr>
		<th><a href=""  onclick="trabajador(0);return false" title="Regresar"><img src="../../img/salir-de-mi-perfil-icono-3964-96.png" alt=""></a></th>
	</tr>
</table>
 	<hr class="margen">
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">N. Cobro</td>
		<td class="Cabeza">N. Ficha</td>
		<td class="Cabeza">Nombre</td>
		<td class="Cabeza">A. Paterno</td>
		<td class="Cabeza">A. Materno</td>
		<td class="Cabeza">Departamento</td>
		<td colspan="3" class="Cabeza">Operaciones</td>
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
			echo "<td><a href='' onclick='ventana(".$fila['id'].",4);return false' title='Editar registro'><img src='../../img/pencil.png'></a></td>";
			echo "<td><a href='' onclick='EliminarTrabajador(".$fila['id'].");return false' title='Dar de baja el registros'><img src='../../img/del.png'></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>