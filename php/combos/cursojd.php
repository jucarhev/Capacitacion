<?php 
	include("../conf/conf.php");
	$rubro=$_POST['rubro'];
	$unid=$_POST['unid'];
	$query="SELECT * from unidad  where nombre='$unid'";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) 
	{
		$id=$fila['id'];
	}
	$query="SELECT * from normas as n join rubro as r on n.idrubro=r.id where rubro='$rubro' and idunidad=$id ";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) 
	{
		echo "<option value='".$fila['codigo']."'>".$fila['codigo']."</option>";
	}
?>