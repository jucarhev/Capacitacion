<?php 
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$anio=$_POST['anio'];
	$depa=$_POST['depa'];
	$mes=$_POST['mes'];
	$query="SELECT distinct t.id from trabajador as t join dnc as d on t.numerocobro=d.nocobro 
	where mes='$mes' and anio='$anio' and d.unidad='$unidad' and d.departamento='$depa'";
	$res=$db->query($query);
	$total=$res->num_rows;
	$res=$db->query($query);
 ?>
<div class="cuerpo-form">
	<table width="100%">
		<tr>
			<td class="Cabeza">Numero</td>
			<td class="Cabeza">Sindicalizado</td>
			<td class="Cabeza">No sindicalizado</td>
		</tr>
<?php
	$num=1;
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			$idt=$fila['id'];

			$rel="SELECT * from trabajador where id=$idt";
			$re=$db->query($rel);
			while ($fil=$re->fetch_array()) {
				$nombre=$fil['nombre'];
				$tipotrabajador=$fil['tipotrabajador'];
			}
			echo "<tr>";
			echo "<td>".$num."</td>";
			echo "<td>";
				if ($tipotrabajador == "Sindicalizado") {
					echo $nombre;
				}
			echo "</td>";
			echo "<td>";
				if ($tipotrabajador != "Sindicalizado") {
					echo $nombre;
				}
			echo "</td>";
			echo "</tr>";
			$num=$num+1;
		}
	}
	echo "</table>";
?>
</div>