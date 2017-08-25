<?php 
	include("../conf/conf.php");
	$x=$_POST['id'];
	$query="SELECT * FROM rubro where id=$x ";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) 
	{
		$id=$fila['id'];
		$rubro=$fila['rubro'];
	}
?>
<input type="hidden" id="id" value="<?php echo $id; ?>">
<form action="" method="" accept-charset="utf-8" onsubmit="ActualizarRubro();return false">
	<div class="inputT">
		<span class="label">Nombre del rubro:</span>
		<input type="text" id="rubro" class="inputTT" value="<?php echo $rubro; ?>" required>
	</div>
	<hr>
	<div>
		<input type="submit" name="" value="Actualizar dato" class="btn-primary">
	</div>
</form>