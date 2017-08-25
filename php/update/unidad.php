<?php 
	include("../conf/conf.php");
	$x=$_POST['x'];
	$query="SELECT * FROM unidad WHERE id=$x";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) 
	{
		$id=$fila['id'];
		$NombreUnidad=$fila['nombre'];
		$CURPUnidad=$fila['curp'];
		$RFCUnidad=$fila['rfc'];
		$IMSSUnidad=$fila['imss'];
		$CalleUnidad=$fila['calle'];
		$ExteriorUnidad=$fila['noexterior'];
		$InteriorUnidad=$fila['nointerior'];
		$ColoniaUnidad=$fila['colonia'];
		$CPUnidad=$fila['codigopostal'];
		$LocalidadUnidad=$fila['localidad'];
		$MunicipioUnidad=$fila['municipio'];
		$EstadoUnidad=$fila['estado'];
		$TelefonoUnidad=$fila['telefono'];
		$EmailUnidad=$fila['email'];
		$FaxUnidad=$fila['fax'];
		$ActividadUnidad=$fila['actividad'];
		$logo=$fila['logo'];
	}
?>
<input type="hidden" id="id" value="<?php echo $id; ?>">
<form action="" method="" accept-charset="utf-8" onsubmit="EditarUnidad();return false">
	<div class="inputT">
		<span class="label">Nombre:</span>
		<input type="text" id="NombreUnidad" class="inputTT" value="<?php echo $NombreUnidad; ?>" autofocus required>
	</div>
	<div class="inputT">
		<span class="label">CURP:</span>
		<input type="text" id="CURPUnidad" class="inputTT" value="<?php echo $CURPUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">RFC:</span>
		<input type="text" id="RFCUnidad" class="inputTT" value="<?php echo $RFCUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">IMSS:</span>
		<input type="text" id="IMSSUnidad" class="inputTT" value="<?php echo $IMSSUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Calle:</span>
		<input type="text" id="CalleUnidad" class="inputTT" value="<?php echo $CalleUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Numero Exterior:</span>
		<input type="text" id="ExteriorUnidad" class="inputTT" value="<?php echo $ExteriorUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Numero Interior:</span>
		<input type="text" id="InteriorUnidad" class="inputTT" value="<?php echo $InteriorUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Colonia:</span>
		<input type="text" id="ColoniaUnidad" class="inputTT" value="<?php echo $ColoniaUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Codigo Postal:</span>
		<input type="text" id="CPUnidad" class="inputTT" value="<?php echo $CPUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Localidad:</span>
		<input type="text" id="LocalidadUnidad" class="inputTT" value="<?php echo $LocalidadUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Municipio:</span>
		<input type="text" id="MunicipioUnidad" class="inputTT" value="<?php echo $MunicipioUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Estado:</span>
		<input type="text" id="EstadoUnidad" class="inputTT" value="<?php echo $EstadoUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Telefono:</span>
		<input type="text" id="TelefonoUnidad" class="inputTT" value="<?php echo $TelefonoUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">E-mail:</span>
		<input type="text" id="EmailUnidad" class="inputTT" value="<?php echo $EmailUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Fax:</span>
		<input type="text" id="FaxUnidad" class="inputTT" value="<?php echo $FaxUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Actividad:</span>
		<input type="text" id="ActividadUnidad" class="inputTT" value="<?php echo $ActividadUnidad;?>">
	</div>
	<div class="inputT">
		<span class="label">Logotipo:</span>
		<select id="LogoUnidad" >
			<option value="<?php echo $logo;?>"><?php echo $logo;?></option>
			<?php 
			include("../conf/conf.php");
			$query="SELECT * FROM fotos";
			$res=$db->query($query);
				while ($fila=$res->fetch_array()) {
					echo "<option value='".$fila['nombre_foto']."'>".$fila['nombre_foto']."</option>";
				}
			 ?>
		</select>
	</div>
	<hr>
	<div>
		<input type="submit" name="" value="Guardar datos" class="btn-primary">
	</div>
</form>