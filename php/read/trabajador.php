<?php 
	include("../conf/conf.php");
	$x=$_POST['x'];
	$query="SELECT * FROM trabajador WHERE id=$x";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) 
	{
	    $numerocobro=$fila['numerocobro'];
	    $numeroficha=$fila['numeroficha'];
	    $nombre=$fila['nombre'];
	    $apaterno=$fila['apaterno'];
	    $amaterno=$fila['amaterno'];
	    $curp=$fila['curp'];
	    $rfc=$fila['rfc'];
	    $sueldo=$fila['sueldo'];
	    $departamento=$fila['departamento'];
	    $categoria=$fila['categoria'];
	    $fechanacimiento=$fila['fechanacimiento'];
	    $activo=$fila['activo'];
	    $estadocivil=$fila['estadocivil'];
	    $hijos=$fila['hijos'];
	    $discapacidad=$fila['discapacidad'];
	    $estado=$fila['estado'];
	    $municipio=$fila['municipio'];
	    $ocupacion=$fila['ocupacion'];
	    $estudios=$fila['estudios'];
	    $documentoprobatorio=$fila['documentoprobatorio'];
	    $aniodocumento=$fila['aniodocumento'];
	    $institucion=$fila['institucion'];
	    $carrera=$fila['carrera'];
	    $imss=$fila['imss'];
	    $tipotrabajador=$fila['tipotrabajador'];
	    $genero=$fila['genero'];
	    $fechaingreso=$fila['fechaingreso'];
	}
?>
<form action="" method="" accept-charset="utf-8" onsubmit="Editartrabajador();return false" style="height:400px;overflow: scroll;">
	<div class="inputT">
		<span class="label">Nombre:</span>
		<input type="text" id="nombre" class="inputTT" value="<?php echo $nombre; ?>">
	</div>
	<div class="inputT">
		<span class="label">Apellido paterno:</span>
		<input type="text" id="apaterno" class="inputTT" value="<?php echo $apaterno; ?>">
	</div>
	<div class="inputT">
		<span class="label">Apellido materno:</span>
		<input type="text" id="amaterno" class="inputTT" value="<?php echo $amaterno; ?>">
	</div>
	<div class="inputT">
		<span class="label">Fecha de nacimiento:</span>
		<input type="date" id="fechanacimiento" class="inputTT" value="<?php echo $fechanacimiento; ?>">
	</div>
	<div class="inputT">
		<span class="label">G&eacute;nero:</span>
		<input type="text" id="genero" class="inputTT" value="<?php echo $genero; ?>">
	</div>
	<div class="inputT">
		<span class="label">CURP:</span>
		<input type="text" id="curp" class="inputTT" value="<?php echo $curp; ?>">
	</div>
	<div class="inputT">
		<span class="label">RFC:</span>
		<input type="text" id="rfc" class="inputTT" value="<?php echo $rfc; ?>">
	</div>
	<div class="inputT">
		<span class="label">Estado civil:</span>
		<input type="text" id="estadocivil" class="inputTT" value="<?php echo $estadocivil; ?>">
	</div>
	<div class="inputT">
		<span class="label">N&uacute;mero de hijos:</span>
		<input type="number" id="hijos" class="inputTT" value="<?php echo $hijos; ?>">
	</div>
	<div class="inputT">
		<span class="label">IMSS:</span>
		<input type="text" id="imss" class="inputTT" value="<?php echo $imss; ?>">
	</div>
	<div class="inputT">
		<span class="label">Discapacidad:</span>
		<input type="text" id="discapacidad" class="inputTT" value="<?php echo $discapacidad; ?>">
	</div>
	<div class="inputT">
		<span class="label">Municipio:</span>
		<input type="text" id="municipio" class="inputTT" value="<?php echo $municipio; ?>">
	</div>
	<div class="inputT">
		<span class="label">Estado:</span>
		<input type="text" id="estado" class="inputTT" value="<?php echo $estado; ?>">
	</div>
	<div class="inputT">
		<span class="label">Estudios:</span>
		<input type="text" id="estudios" class="inputTT" value="<?php echo $estudios; ?>">
	</div>
	<div class="inputT">
		<span class="label">Carrera:</span>
		<input type="text" id="carrera" class="inputTT" value="<?php echo $carrera; ?>">
	</div>
	<div class="inputT">
		<span class="label">Documento probatorio:</span>
		<input type="text" id="documentoprobatorio" class="inputTT" value="<?php echo $documentoprobatorio; ?>">
	</div>
	<div class="inputT">
		<span class="label">A&ntilde;o del documento:</span>
		<input type="number" id="aniodocumento" class="inputTT" value="<?php echo $aniodocumento; ?>">
	</div>
	<div class="inputT">
		<span class="label">Instituci&oacute;n:</span>
		<input type="text" id="institucion" class="inputTT" value="<?php echo $institucion; ?>">
	</div>
	<div class="inputT">
		<span class="label">N&uacute;mero cobro:</span>
		<input type="number" id="numerocobro" class="inputTT" value="<?php echo $numerocobro; ?>">
	</div>
	<div class="inputT">
		<span class="label">N&uacute;mero ficha:</span>
		<input type="text" id="numeroficha" class="inputTT" value="<?php echo $numeroficha; ?>">
	</div>
	<div class="inputT">
		<span class="label">Sueldo:</span>
		<input type="number" id="sueldo" class="inputTT" value="<?php echo $sueldo; ?>">
	</div>
	<div class="inputT">
		<span class="label">Departamento:</span>
		<input type="text" id="departamento" class="inputTT" value="<?php echo $departamento; ?>">
	</div>
	<div class="inputT">
		<span class="label">Categoria:</span>
		<input type="text" id="categoria" class="inputTT" value="<?php echo $categoria; ?>">
	</div>	
	<div class="inputT">
		<span class="label">Ocupaci&oacute;n:</span>
		<input type="text" id="ocupacion" class="inputTT" value="<?php echo $ocupacion; ?>">
	</div>
	<div class="inputT">
		<span class="label">Tipo de trabajador:</span>
		<input type="text" id="tipotrabajador" class="inputTT" value="<?php echo $tipotrabajador; ?>">
	</div>	
	<div class="inputT">
		<span class="label">Fecha de ingreso:</span>
		<input type="date" id="fechaingreso" class="inputTT" value="<?php echo $fechaingreso; ?>">
	</div>
	<hr>
</form>

