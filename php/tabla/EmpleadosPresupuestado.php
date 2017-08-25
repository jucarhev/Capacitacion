<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">No.</td>
		<td class="Cabeza">N. cobro</td>
		<td class="Cabeza">N. ficha</td>
		<td class="Cabeza"> Nombre completo</td>
		<td class="Cabeza">Opc.</td>
	</tr>
<?php 
include("../conf/conf.php");
	$id=$_POST['id'];

	$query="SELECT ep.id,nombre, numerocobro, numeroficha from emplpres as ep join trabajador as t on ep.idEmpl=t.id where id_presupuestado=$id";
	$res=$db->query($query);
	$num=0;
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			$num=$num+1;
			$idep=$fila['id'];
			echo "<tr>";
			echo "<td>".$num."</td>";
			echo "<td>".$fila['numerocobro']."</td>";
			echo "<td>".$fila['numeroficha']."</td>";
			echo "<td>".$fila['nombre']."</td>";
			echo "<td><a href='' title='Eliminar' onclick='EliminarEmpPre(".$idep.");return false'><img src='../../img/del.png'></a></td>";
			echo "</tr>";
		}
	}
 ?>
 </table>