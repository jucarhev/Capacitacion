<?php 
	include("../conf/conf.php");
	$buscar=$_POST['buscar'];
	$unidad=$_POST['unidad'];
	$query="SELECT d.id,departamento,u.unidad,nombreuser,usuario,password,tipouser 
	FROM usuario AS u join departamento AS d ON u.idDepartamento=d.id 
	where tipouser like '%Jefe de departamento%' and u.unidad='$unidad' and departamento like '%$buscar%'";
	$res=$db->query($query);
?>
<table>
	<tr>
		<th><a href=""  onclick="DepartamentoUser(0);return false" title="Regresar"><img src="../../img/salir-de-mi-perfil-icono-3964-96.png" alt=""></a></th>
	</tr>
</table>
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">Departamento</td>
		<td class="Cabeza">Unidad</td>
		<td class="Cabeza">Nombre usuario</td>
		<td class="Cabeza">Usuario</td>
		<td class="Cabeza">Password</td>
		<td class="Cabeza">Tipo de usuario</td>
		<td colspan="3" class="Cabeza">Operaciones</td>
	</tr>
<?php
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			echo "<td>".$fila['departamento']."</td>";
			echo "<td>".$fila['unidad']."</td>";
			echo "<td>".$fila['nombreuser']."</td>";
			echo "<td>".$fila['usuario']."</td>";
			echo "<td>".$fila['password']."</td>";			
			echo "<td>".$fila['tipouser']."</td>";
			echo "<td><a href='' onclick='ventana2(".$fila['id'].",2);return false' title='Ver registros'><img src='../../img/lupa.png'></a></td>";
			echo "<td><a href='' onclick='ventana(".$fila['id'].",2);return false' title='Editar registro'><img src='../../img/pencil.png'></a></td>";
			echo "<td><a href='' onclick='EliminarUsuarioJD(".$fila['id'].");return false' title='Dar de baja el registros'><img src='../../img/del.png'></a></td>";
			echo "</tr>";
		}
	}
	else{
			echo "<tr><td colspan='8'>No hay datos</td></tr>";
		}
	echo "</table>";
?>