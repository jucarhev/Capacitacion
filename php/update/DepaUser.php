<?php 
	include("../conf/conf.php");
	$x=$_POST['x'];
	$query="SELECT * FROM usuario as us join departamento as de on us.idDepartamento=de.id WHERE idDepartamento=$x ";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) 
	{
		$id=$fila['id'];
		$nombreuser=$fila['nombreuser'];
		$usuario=$fila['usuario'];
		$password=$fila['password'];
		$departamento=$fila['departamento'];
	}
	$query="SELECT * FROM unidad where nombre not like '%Administrador%'";
	$res=$db->query($query);
?>
<input type="hidden" id="id" value="<?php echo $id; ?>">
<form action="" method="" accept-charset="utf-8" onsubmit="ActualizarUserDepa();return false">
	<div class="inputT">
		<span class="label">Departamento:</span>
		<input type="text" id="Departamento" class="inputTT" value="<?php echo $departamento; ?>" autofocus required>
	</div>
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
	<hr>
	<input type="submit" name="" value="Actualizar" class="btn-primary">
</form>