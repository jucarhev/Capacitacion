<?php 
	include("../conf/conf.php");
	$id=$_POST['x'];
	$query="SELECT * from presupuestado where id=$id";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) {
			$id=$fila['id'];
			$nombre=$fila['nombre'];
			$imparte=$fila['imparte'];
			$lugar=$fila['lugar'];
			$duracion=$fila['duracion'];
			$objetivos=$fila['objetivos'];
			$costocurso=$fila['costocurso'];
			$transporte=$fila['transporte'];
			$alimentacion=$fila['alimentacion'];
			$hospedaje=$fila['hospedaje'];
			$otros=$fila['otros'];
			$invpersona=$fila['invpersona'];
			$invtotal=$fila['invtotal'];
			$status=$fila['status'];
			$departamento=$fila['departamento'];
			$unidad=$fila['unidad'];
			$anio=$fila['anio'];
			$numpersonas=$fila['numpersonas'];
		}
 ?>
<div style="height:400px;overflow: scroll;">
<form onsubmit="ActualizarCotizacion();return false" id="formpres" style="display:block;">
	<div class="inputT">
		<input type="hidden" id="id" class="inputTT" value="<?php echo $id; ?>" required>
	</div>
	<div class="inputT">
		<span class="label">Capacitaci&oacute;n solicitada:</span>
		<input type="text" id="nombre" class="inputTT" value="<?php echo $nombre; ?>" required>
	</div>
	<div class="inputT">
		<span class="label">Imparte:</span>
		<input type="text" id="imparte" class="inputTT" value="<?php echo $imparte; ?>" required>
	</div>
	<div class="inputT">
		<span class="label">Lugar:</span>
		<input type="text" id="lugar" class="inputTT" value="<?php echo $lugar; ?>" required>
	</div>
	<div class="inputT">
		<span class="label">Duraci&oacute;n:</span>
		<input type="text" id="duracion" class="inputTT" value="<?php echo $duracion; ?>" required>
	</div>
	<div class="inputT">
		<span class="label">Objetivos:</span>
		<input type="text" id="objetivos" class="inputTT" value="<?php echo $objetivos; ?>" required >
	</div>
	<div class="inputT">
		<span class="label">N&uacute;mero de personas:</span>
		<input type="text" id="numpersonas" class="inputTT" value="<?php echo $numpersonas; ?>" required disabled>
	</div>
	<div class="inputT">
		<span class="label">Costo del curso:</span>
		<input type="text" id="costocurso" class="inputTT" value="<?php echo $costocurso; ?>" required>
	</div>
	<div class="inputT">
		<span class="label">Transporte:</span>
		<input type="text" id="transporte" class="inputTT" value="<?php echo $transporte; ?>" required>
	</div>
	<div class="inputT">
		<span class="label">Alimentaci&oacute;n:</span>
		<input type="text" id="alimentacion" class="inputTT" value="<?php echo $alimentacion; ?>" required>
	</div>
	<div class="inputT">
		<span class="label">Hospedaje:</span>
		<input type="text" id="hospedaje" class="inputTT" value="<?php echo $hospedaje; ?>" required>
	</div>
	<div class="inputT">
		<span class="label">Otros:</span>
		<input type="text" id="otros" class="inputTT" value="<?php echo $otros; ?>" required>
	</div>
	<div class="inputT">
		<span class="label">Inversi&oacute;n por persona:</span>
		<input type="text" id="invpersona" class="inputTT" value="<?php echo $invpersona; ?>" required disabled>
	</div>
	<div class="inputT">
		<span class="label">Inversi&oacute;n total:</span>
		<input type="text" id="invtotal" class="inputTT" value="<?php echo $invtotal; ?>" required>
	</div>
	<div class="inputT">
		<span class="label">A&ntilde;io:</span>
		<input type="text" id="anio" class="inputTT" value="<?php echo $anio; ?>" required>
	</div>
	<div class="inputT">
		<input type="submit" class="btn-primary">
	</div>
</form>


<form style="display:none;" id="formpersasist" onsubmit="AgregarTrabPres();return false">
	<fieldset clas="fieldset">
		<legend class="legend">Captura de asistente</legend>
		<div class="inputT">
			<span class="label">Asistentes:</span>
			<input type="text" id="TrabajadorCurPre" class="inputTT" value="" list="Trabajador" required>
			<input type="submit" class="btn-primary" value="A&ntilde;adir">
		</div>
		<hr>
		<div id="asistpres">
			d
		</div>
	</fieldset>
</form>
 </div>


 <?php 
	$query="SELECT * FROM trabajador WHERE  unidad='$unidad' and departamento='$departamento'";
	$res=$db->query($query);
	echo "<datalist id='Trabajador'>";
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			$id=$fila['id'];
			$nc=$fila['numerocobro'];
			$no=$fila['nombre'];
			$ap=$fila['apaterno'];
			$am=$fila['amaterno'];
			echo "<option value='".$id."'>".$nc." ".$no." ".$ap." ".$am."</option>";
		}
	}
	echo "</datalist>";
?>