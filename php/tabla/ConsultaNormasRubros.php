<hr class="margen">
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">Rubro</td>
		<td colspan="2" class="Cabeza">Normas</td>
	</tr>
<?php
include("../conf/conf.php");
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
			while ($filas=$ress->fetch_array()) {
				echo "<td>".$filas['codigo']."</td>";
				echo "<td>".$filas['nombrenorma']."</td>";
				echo "</tr>";
			}
		}
	echo "</table>";
?>