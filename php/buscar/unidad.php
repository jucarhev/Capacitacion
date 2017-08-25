<?php 
	include("../conf/conf.php");
	$buscar=$_POST['buscar'];
	$query="SELECT * FROM unidad WHERE nombre='$buscar'";
	$res=$db->query($query);
?>
<table>
	<tr>
		<th><a href=""  onclick="tablaUnidad(0);return false" title="Regresar"><img src="../../img/salir-de-mi-perfil-icono-3964-96.png" alt=""></a></th>
	</tr>
</table>
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">Unidad</td>
		<td class="Cabeza">Localidad</td>
		<td class="Cabeza">Municipip</td>
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
	else{
			echo "<tr><td colspan='8'>No hay datos</td></tr>";
		}
	echo "</table>";
?>