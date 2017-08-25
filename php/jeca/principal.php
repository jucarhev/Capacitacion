
<div class="izquierda">
		<a href="" title="Reporte" onclick="ventana3(6);return false">
			<img src="../../img/Reporte_I.png" class="icop">
		</a>
		<a href="" title="Reporte" onclick="verunid();return false">
			<img src="../../img/images.jpg" class="icop">
		</a>
		<hr>
</div>
<div class="derecha">
	<div>
		<form action="" method="post" onsubmit="avisojc();return false">
			<input type="text" id="Aviso"  placeholder="Escriba un aviso" class="" size="50" required> 
			<select id="destino" required>
				<option value="">-Seleccion un destino-</option>
				<option value="Administrador">Administrador</option>
				<option value="Jefe de departamento">Jefe de departamento</option>
			</select>
			<input type="submit" name="" value="Enviar aviso" >			
		</form>
		<input type="submit" name="" value="Recargar" onclick="AvisosJCs();return false">
	</div>
	<hr>
	<div id="avisos"></div>
</div>