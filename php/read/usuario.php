<?php 
	include("../conf/conf.php");
	$x=$_POST['x'];
	$query="SELECT * FROM usuario WHERE id=$x ";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) 
	{
		$id=$fila['id'];
		$nombreuser=$fila['nombreuser'];
		$usuario=$fila['usuario'];
		$password=$fila['password'];
		$unidad=$fila['unidad'];
	}
	$query="SELECT * FROM unidad where nombre not like '%Administrador%'";
	$res=$db->query($query);
?>
<input type="hidden" id="id" value="<?php echo $id; ?>">
<form action="" method="" accept-charset="utf-8">
	<div class="inputT">
		<span class="label">Nombre del usuario:</span>
		<input type="text" id="Nombre" class="inputTT" autofocus required value="<?php echo $nombreuser; ?>">
	</div>
	<div class="inputT">
		<span class="label">Usuario:</span>
		<input type="text" id="Usuario" class="inputTT"  required value="<?php echo $usuario; ?>">
	</div>
	<div class="inputT">
		<span class="label">Password:</span>
		<input type="text" id="Password" class="inputTT"  required value="<?php echo $password; ?>">
	</div>
	<div class="inputT">
		<span class="label">Unidad:</span>
		<input type="text" id="unidad" value="<?php echo $unidad; ?>" placeholder="" class="inputTT">
	</div>
	<hr>
</form>