<form>
	<fieldset class="fieldset">
		<legend class="legend">Escriba el Error producido | <a href="../tabla/Error.php" title="Ver errores" target='_blank'>Ver todos los errores</a></legend>
		<div class="inputT">
			<span class="label">Titulo del error</span>
			<input type="text" id="TituloError" placeholder="Use palabras claves" size="30" required>
		</div>
		<div class="inputT">
			<span class="label">Error</span><br>
			<textarea id="Error" cols="45" rows="10" required></textarea>
		</div>
		<div class="inputT">
			<hr>
			<input type="submit" name="" value="Guardar error" onclick="GuardarError();return false" class="btn-primary">
		</div>
	</fieldset>
</form>