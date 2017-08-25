<?php 
	include("../conf/conf.php");
	$id=$_POST['id'];
	$unidad=$_POST['unidad'];
	$depa=$_POST['depa'];
	$query="SELECT * from unidad where nombre='$unidad'";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) {
		$logo=$fila['logo'];
	}

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
<div class="centro-cot">
	<div class="header2">
		<div class="cuadro20">
			<img src="../photos/<?php echo $logo;?>">
		</div>
		<div class="cuadro60 centro1">
			<span class="titulo">Necesidades de capacitaci&oacute;n</span>
		</div>
		<div class="cuadro20"></div>
	</div>
	<div class="limpio">
		<div style="width: 80%;">
			<div class="inputT">
				<span class="label">Capacitaci&oacute;n solicitada:</span>
				<input type="text" id="nombre" class="center" value="<?php echo $nombre; ?>" size="60">
			</div>
		</div>
		<div style="width: 80%;">
			<div class="inputT">
				<span class="label">Imparte:</span>
				<input type="text" id="imparte" class="center" value="<?php echo $imparte; ?>" size="60">
			</div>
		</div>
		<div style="width: 80%;">
			<div class="inputT">
				<span class="label">Lugar:</span>
				<input type="text" id="lugar" class="center" value="<?php echo $lugar; ?>" size="60">
			</div>
		</div>
		<div style="width: 44%;">
			<div class="inputT">
				<span class="label">Duraci&oacute;n:</span>
				<input type="text" id="duracion" class="center" value="<?php echo $duracion; ?>" size="10">
			</div>
		</div>
		<div style="width: 44%;">
			<div class="inputT">
				<span class="label">N&uacute;mero de personas:</span>
				<input type="text" id="numpersonas" class="center" value="<?php echo $numpersonas; ?>" size="10">
			</div>
		</div>
		<div style="width: 44%;">
			<div class="inputT">
				<span class="label">Nombres:</span>
				<input type="text" id="numpersonas" class="center" value="<?php echo $numpersonas; ?>" size="10">
			</div>
		</div>
	</div>
	<div class="limpio">
		<div class="mitad">
			<div class="center">
				<span class="titulo">Inversi&oacute;n</span>
			</div>
			<div class="inputT">
				<span class="label">Costo del curso:</span>
				<input type="text" id="costocurso" class="center" value="<?php echo $costocurso; ?>" required size="10">
			</div>
			<div class="inputT">
				<span class="label">Transporte:</span>
				<input type="text" id="transporte" class="center" value="<?php echo $transporte; ?>" required size="10">
			</div>
			<div class="inputT">
				<span class="label">Alimentaci&oacute;n:</span>
				<input type="text" id="alimentacion" class="center" value="<?php echo $alimentacion; ?>" required size="10">
			</div>
			<div class="inputT">
				<span class="label">Hospedaje:</span>
				<input type="text" id="hospedaje" class="center" value="<?php echo $hospedaje; ?>" required size="10">
			</div>
			<div class="inputT">
				<span class="label">Otros:</span>
				<input type="text" id="otros" class="center" value="<?php echo $otros; ?>" required size="10">
			</div>
			<div class="inputT">
				<span class="label">Inversi&oacute;n por persona:</span>
				<input type="text" id="invpersona" class="center" value="<?php echo $invpersona; ?>" required size="10" >
			</div>
			<div class="inputT">
				<span class="label">Inversi&oacute;n total:</span>
				<input type="text" id="invtotal" class="center" value="<?php echo $invtotal; ?>" required size="10">
			</div>
		</div>
		<div class="mitad">
			<div class="center">
				<span class="titulo">Beneficios</span>
			</div>
			<div style="text-align: left;">
				<textarea value="" rows="10" cols="50"><?php echo $objetivos; ?></textarea>
			</div>
		</div>
	</div>
</div>