 <?php 
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$depa=$_POST['depa'];
	$buscar=$_POST['buscar'];
	$query="SELECT  * FROM curso WHERE unidad='$unidad' and departamento='$depa' and terminado='No' and nombre like '%$buscar%'";
	$res=$db->query($query);
?>
 	<hr class="margen">
<table>
	<tr>
		<th><a href=""  onclick="cursosjd(0);return false" title="Regresar"><img src="../../img/salir-de-mi-perfil-icono-3964-96.png" alt=""></a></th>
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
		<td colspan="2" class="Cabeza">Operaciones</td>
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
			echo "<td><a href='' onclick='CursoOk(".$fila['id'].");return false' title='Dar de alta el registros'><img src='../../img/si.gif'></a></td>";
			echo "<td><a href='' onclick='EliminarCurso(".$fila['id'].");return false' title='Dar de baja el registros'><img src='../../img/del.png'></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>