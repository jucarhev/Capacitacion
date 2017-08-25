<form action="" method="" accept-charset="utf-8" onsubmit="Ntrabajador();return false" style="height:400px;overflow: scroll;">
	<div class="inputT">
		<span class="label">Nombre:</span>
		<input type="text" id="nombre" class="inputTT" placeholder="Nombre">
	</div>
	<div class="inputT">
		<span class="label">Apellido paterno:</span>
		<input type="text" id="apaterno" class="inputTT" placeholder="Apellido paterno">
	</div>
	<div class="inputT">
		<span class="label">Apellido materno:</span>
		<input type="text" id="amaterno" class="inputTT" placeholder="Apellido materno">
	</div>
	<div class="inputT">
		<span class="label">Fecha de nacimiento:</span>
		<input type="date" id="fechanacimiento" class="inputTT" placeholder="Municipio de la unidad">
	</div>
	<div class="inputT">
		<span class="label">G&eacute;nero:</span>
		<select id="genero" required>
			<option value="Hombre">Hombre</option>
			<option value="Mujer">Mujer</option>
		</select>
	</div>
	<div class="inputT">
		<span class="label">CURP:</span>
		<input type="text" id="curp" class="inputTT" placeholder="CURP">
	</div>
	<div class="inputT">
		<span class="label">RFC:</span>
		<input type="text" id="rfc" class="inputTT" placeholder="RFC">
	</div>
	<div class="inputT">
		<span class="label">Estado civil:</span>
		<select id="estadocivil">
			<option value="Soltero(a)">Soltero(a)</option>
			<option value="Casado(a)">Casado(a)</option>
			<option value="union libre">Uni&oacute;n libre</option>
			<option value="Separado(a)">Separado(a)</option>
			<option value="Viudo(a)">Viudo(a)</option>
		</select>
	</div>
	<div class="inputT">
		<span class="label">N&uacute;mero de hijos:</span>
		<input type="number" id="hijos" class="inputTT" placeholder="N&uacute;mero de hijos">
	</div>
	<div class="inputT">
		<span class="label">IMSS:</span>
		<input type="text" id="imss" class="inputTT" placeholder="IMSS">
	</div>
	<div class="inputT">
		<span class="label">Discapacidad:</span>
		<select id="discapacidad">
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
		<input type="text" id="municipio" class="inputTT" placeholder="Municipio">
	</div>
	<div class="inputT">
		<span class="label">Estado:</span>
		<select id='estado'>
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
		<input type="text" id="estudios" class="inputTT" placeholder="Estudios">
	</div>
	<div class="inputT">
		<span class="label">Carrera:</span>
		<input type="text" id="carrera" class="inputTT" placeholder="Carrera">
	</div>
	<div class="inputT">
		<span class="label">Documento probatorio:</span>
		<input type="text" id="documentoprobatorio" class="inputTT" placeholder="Documento probatorio">
	</div>
	<div class="inputT">
		<span class="label">A&ntilde;o del documento:</span>
		<input type="number" id="aniodocumento" class="inputTT" placeholder="A&ntilde;o del documento">
	</div>
	<div class="inputT">
		<span class="label">Instituci&oacute;n:</span>
		<input type="text" id="institucion" class="inputTT" placeholder="Instituci&oacute;n">
	</div>
	<div class="inputT">
		<span class="label">N&uacute;mero cobro:</span>
		<input type="number" id="numerocobro" class="inputTT" placeholder="N&uacute;mero cobro" required>
	</div>
	<div class="inputT">
		<span class="label">N&uacute;mero ficha:</span>
		<input type="text" id="numeroficha" class="inputTT" placeholder="N&uacute;mero ficha">
	</div>
	<div class="inputT">
		<span class="label">Sueldo:</span>
		<input type="number" id="sueldo" class="inputTT" placeholder="Sueldo" required>
	</div>
	<div class="inputT">
		<span class="label">Departamento:</span>
		<select id="departamento">
			<?php  
				include("../conf/conf.php");
				$unidad=$_POST['unidad'];
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
		<input type="text" id="categoria" class="inputTT" placeholder="Categoria">
	</div>	
	<div class="inputT">
		<span class="label">Ocupaci&oacute;n:</span>
		<input type="text" id="ocupacion" class="inputTT" placeholder="Ocupaci&oacute;n">
	</div>
	<div class="inputT">
		<span class="label">Tipo de trabajador:</span>
		<select id="tipotrabajador" required>
			<option value="Sindicalizado">Sindicalizado</option>
			<option value="No sindicalizado">No sindicalizado</option>
		</select>
	</div>	
	<div class="inputT">
		<span class="label">Fecha de ingreso:</span>
		<input type="date" id="fechaingreso" class="inputTT" placeholder="Fecha de ingreso">
	</div>
	<hr>
	<div>
		<input type="submit" class="btn-primary" value="Guardar datos">
	</div>
</form>

