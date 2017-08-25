<?php 
	include("../conf/conf.php");
	$x=$_POST['x'];
	$query="SELECT * FROM trabajador WHERE id=$x";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) 
	{
		$unidad=$fila['unidad'];
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
<input type="hidden" id="id" value="<?php echo $x; ?>">
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
		<select id="genero" required>
			<option value="<?php echo $genero; ?>"><?php echo $genero; ?></option>
			<option value="Hombre">Hombre</option>
			<option value="Mujer">Mujer</option>
		</select>
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
		<select id="estadocivil">
			<option value="<?php echo $estadocivil; ?>"><?php echo $estadocivil; ?></option>
			<option value="Soltero(a)">Soltero(a)</option>
			<option value="Casado(a)">Casado(a)</option>
			<option value="union libre">Uni&oacute;n libre</option>
			<option value="Separado(a)">Separado(a)</option>
			<option value="Viudo(a)">Viudo(a)</option>
		</select>
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
		<select id="discapacidad">
			<option value="<?php echo $discapacidad; ?>"><?php echo $discapacidad; ?></option>
			<option value="Ninguna">Ninguna</option>
			<option value="Motriz">Motriz</option>
			<option value="Visual">Visual</option>
			<option value="Mental">Mental</option>
			<option value="Auditiva">Auditiva</option>
			<option value="De Lenguaje">De Lenguaje</option>
		</select>
	</div>
	<div class="inputT">
		<span class="label">Municipio:</span>
		<input type="text" id="municipio" class="inputTT" value="<?php echo $municipio; ?>">
	</div>
	<div class="inputT">
		<span class="label">Estado:</span>
		<select id='estado'>
			<option value='<?php echo $estado; ?>'><?php echo $estado; ?></option>
			<option value='Hidalgo'>Hidalgo</option>
			<option value='Aguascalientes'>Aguascalientes</option>
			<option value='Baja California Norte'>Baja California Norte</option>
			<option value='Baja California Sur'>Baja California Sur</option>
			<option value='Campeche'>Campeche</option>
			<option value='Coahuila'>Coahuila</option>
			<option value='Chiapas'>Chiapas</option>
			<option value='Chihuahua'>Chihuahua</option>
			<option value='Durango'>Durango</option>
			<option value='Estado de Mexico'>Estado de Mexico</option>
			<option value='Guanajuato'>Guanajuato</option>
			<option value='Guerrero'>Guerrero</option>
			<option value='Jalisco'>Jalisco</option>
			<option value='Michoacan'>Michoacan</option>
			<option value='Morelos'>Morelos</option>
			<option value='D.F.'>D.F.</option>
			<option value='Nayarit'>Nayarit</option>
			<option value='Nuevo Leon'>Nuevo Leon</option>
			<option value='Oaxaca'>Oaxaca</option>
			<option value='Puebla'>Puebla</option>
			<option value='Queretaro'>Queretaro</option>
			<option value='Quintana Roo'>Quintana Roo</option>
			<option value='San Luis Potosi'>San Luis Potosi</option>
			<option value='Sinaloa'>Sinaloa</option>
			<option value='Sonora'>Sonora</option>
			<option value='Tabasco'>Tabasco</option>
			<option value='Tamaulipas'>Tamaulipas</option>
			<option value='Tlaxcala'>Tlaxcala</option>
			<option value='Veracruz'>Veracruz</option>
			<option value='Yucatan'>Yucatan</option>
			<option value='Zacatecas'>Zacatecas</option>
		</select>
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
		<select id="departamento">
			<option value="<?php echo $departamento; ?>"><?php echo $departamento; ?></option>
			<?php 
				$query="SELECT * FROM departamento as d join unidad as u on d.unidad=u.id where u.nombre='$unidad'";

				$res=$db->query($query);
				while ($fila=$res->fetch_array()) 
				{
					$nombre=$fila['departamento'];
					echo "<option value='".$nombre."'>".$nombre."</option>";
				}
			?>
		</select>
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
		<select id="tipotrabajador" required>
			<option value="<?php echo $tipotrabajador; ?>"><?php echo $tipotrabajador; ?></option>
			<option value="Sindicalizado">Sindicalizado</option>
			<option value="No sindicalizado">No sindicalizado</option>
		</select>
	</div>	
	<div class="inputT">
		<span class="label">Fecha de ingreso:</span>
		<input type="date" id="fechaingreso" class="inputTT" value="<?php echo $fechaingreso; ?>">
	</div>
	<hr>
	<input type="submit" name="" value="Actualizar" class="btn-primary">
</form>

