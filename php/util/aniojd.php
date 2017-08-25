<?php 
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$depa=$_POST['depa'];
	$user=$_POST['user'];
	$query="SELECT * FROM usuario where idDepartamento=$depa and unidad='$unidad' and usuario='$user'";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) {
		echo "<input type='hidden' id='AnioSistemaJD' value='".$fila['anio']."'>";
	}
 ?>
