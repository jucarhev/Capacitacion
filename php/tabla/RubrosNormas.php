<hr class="margen">
<table  width="100%" cellspacing="0" >
	<tr>
		<td colspan="6" class="center"><h1 class="h1">Rubros y normas</h1></td>
	</tr>
	<tr>
		<td colspan="5">
		</td>
		<td class="center">
			<input type="submit" value="Nuevo rubro" onclick="abrirventanajc(2);return false" class="btn-primary">
			<input type="submit" value="Nueva norma" onclick="abrirventanajc(3);return false" class="btn-primary">
		</td>
	</tr>
</table>
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">Rubro</td>
		<td colspan="2" class="Cabeza">Operacion</td>
		<td colspan="4" class="Cabeza">Normas</td>
	</tr>
<?php
include("../conf/conf.php");
	$limite=$_POST['limite'];
	$unidad=$_POST['unidad'];

	$query="SELECT r.id,rubro from rubro as r join unidad as u on r.idunidad=u.id where u.nombre='$unidad'";
	$res=$db->query($query);
	
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			$idRubro=$fila['id'];
			$querys="SELECT * from normas where idrubro=$idRubro";
			$ress=$db->query($querys);
			$total=$ress->num_rows;
			echo "<td rowspan='".$total."'>".$fila['rubro']."</td>";
			echo "<td rowspan='".$total."'>
				<a href='' onclick='ventana(".$idRubro.",5);return false' title='Dar de baja el registros'><img src='../../img/pencil.png'></a>
			</td>";
			echo "<td rowspan='".$total."'>
				<a href='' onclick='EliminarRubro(".$idRubro.");return false' title='Dar de baja el registros'><img src='../../img/del.png'></a>
			</td>";
			while ($filas=$ress->fetch_array()) {
				echo "<td>".$filas['codigo']."</td>";
				echo "<td>".$filas['nombrenorma']."</td>";
				echo "<td>
					<a href='' onclick='ventana(".$filas['id'].",6);return false' title='Dar de baja el registros'><img src='../../img/pencil.png'></a>
				</td>";
				echo "<td>
						<a href='' onclick='EliminarNorma(".$filas['id'].");return false' title='Dar de baja el registros'><img src='../../img/del.png'></a>
					</td>";
				echo "</tr>";
			}
		}
	echo "</table>";
?>