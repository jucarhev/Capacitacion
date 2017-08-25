<?php 
include("../conf/conf.php");
	$query="SELECT * FROM fotos";
?>
<form>
	<style type="text/css" media="screen">
		.nlabel{
			margin:2px;
		}
	</style>
	<fieldset class="fieldset">
		<legend class="legend">Cambiar contrase&ntilde;a</legend>
		<div class="center">
			<input type="password" id="conant" class="nlabel center" placeholder="Contrase&ntilde;a anterior" required><br>
			<input type="password" id="conact" class="nlabel center" placeholder="Nueva contrase&ntilde;a" required>
			<input type="password" id="repact" class="nlabel center" placeholder="Repetir contrase&ntilde;a nueva" required><br>
			<input type="submit" name="" value="Cambiar" class="boton-tool" onclick="cambiarpas();return false">
		</div>
	</fieldset>
</form>
<div>
	<form>
		<fieldset class="fieldset">
			<legend class="legend">Cambiar logo del sistema</legend>
			<div class="center">
				<label>Elija una imagen: </label>
				<select id="logotipo" required>
					<?php
					    $res=$db->query($query);
					    while ($fila=$res->fetch_array()) {
					        echo "<option value='".$fila['nombre_foto']."'>".$fila['nombre_foto']."</option>";
					    }
					?>
				</select>
				<input type="submit" name="" value="Cambiar" onclick="logosistema();return false">
			</div>			
		</fieldset>
	</form>
</div>
<div>
	<form>
		<fieldset class="fieldset">
			<legend class="legend">Vaciar los avisos</legend>
			<div class="center">
				<input type="submit" name="" value="Vaciar avisos" class="boton-tool"  onclick="vaciarAvisos();return false">
			</div>
		</fieldset>
	</form>
</div>
<div>
	<form>
		<fieldset class="fieldset">
			<legend class="legend">Vaciar los errores</legend>
			<div class="center">
			<p>Todos los errores han sido guardados en la base de datos pero pueden ser eliminados. Solo tiene que 
			Oprimir el siguiente boton y todos los errores registrados seran eliminados, asgurese de haber enviando esos errores.</p>
				<input type="submit" name="" value="Vaciar errores" class="boton-tool" onclick="vaciarErrores();return false">
			</div>
		</fieldset>
	</form>
</div>