<?php 
	include("../conf/conf.php");
	$x=$_POST['id'];
	$query="SELECT n.id,codigo,nombrenorma,rubro,idrubro FROM normas as n join rubro as r on n.idrubro=r.id where n.id=$x ";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) 
	{
		$id=$fila['id'];
		$codigo=$fila['codigo'];
		$nombrenorma=$fila['nombrenorma'];
		$rubro=$fila['rubro'];
		$idrubro=$fila['idrubro'];
	}
?>
<input type="hidden" id="id" value="<?php echo $x; ?>">
<form action="" method="" accept-charset="utf-8" onsubmit="EditarNormaJC();return false">
	<div class="inputT">
		<span class="label">Codigo de la norma:</span>
		<input type="text" id="Codigon" class="inputTT" value="<?php echo $codigo; ?>">
	</div>
	<div class="inputT">
		<span class="label">Nombre de la norma:</span>
		<input type="text" id="Nombren" class="inputTT" value="<?php echo $nombrenorma; ?>">
	</div>
	<div class="inputT">
		<span class="label">Rubro:</span>
		<select id="rubro" required>
			<option value='<?php echo $idrubro; ?>'><?php echo $rubro; ?></option>";
			<?php
				$unidad=$_POST['unidad'];
				$query="SELECT rubro, r.id FROM rubro as r join unidad as u on r.idunidad=u.id where nombre='$unidad'";

				$res=$db->query($query);
				while ($fila=$res->fetch_array()) 
				{
					$nombre=$fila['rubro'];
					$idnombre=$fila['id'];
					echo "<option value='".$idnombre."'>".$nombre."</option>";
				}
			?>
		</select>
	</div>
	<hr>
	<div>
		<input type="submit" class="btn-primary" value="Guardar datos" >
	</div>
</form>