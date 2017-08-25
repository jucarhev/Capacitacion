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
	$unidad=$_POST['unidad'];
	$depa=$_POST['depa'];
	$curso=$_POST['curso']; 

	$query="SELECT l.id from listas as l join curso as c on l.nombrecurso=c.nombre where c.departamento='$depa' and c.unidad='$unidad'";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) {
		$id=$fila['id'];
	}

	$query="SELECT tc.id,nombre, numerocobro, numeroficha from trabajadorcurso as tc join trabajador as t on tc.idtrabajador=t.id where status='No' and tc.idlista=$id";
	$res=$db->query($query);
	$num=0;
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			$num=$num+1;
			$idpl=$fila['id'];
			echo "<tr>";
			echo "<td>".$num."</td>";
			echo "<td>".$fila['numerocobro']."</td>";
			echo "<td>".$fila['numeroficha']."</td>";
			echo "<td>".$fila['nombre']."</td>";
			echo "<td><a href='' title='Eliminar' onclick='EliminarPL(".$idpl.");return false'><img src='../../img/del.png'></a></td>";
			echo "</tr>";
		}
	}
 ?>
 </table>