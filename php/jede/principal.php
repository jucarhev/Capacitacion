<div class="izquierda">
	<div class="tool center" style="cursor: pointer;" onclick="ventanajd2(4);return false">
		<div><img src="../../assets/img/iconocalendario.png" alt=""></div>
		<div>Seguimiento de los cursos</div>
	</div>
	<div class="tool center" style="cursor: pointer;"  onclick="ventanajd2(6);return false">
		<div><img src="../../assets/img/agenda.jpg" alt=""></div>
		<div>Consulta de cursos</div>
	</div>
	<div style="clear: both;">
		<hr>
		<div id="Estanv">
			
		</div>
	</div>
</div>
<div class="derecha">
	<div>
		<form action="" method="post" onsubmit="avisojd();return false">
			<input type="text" id="Aviso"  placeholder="Escriba un aviso" class="" size="50" required> 
			<select id="destino" required>
				<option value="Jefe de capacitacion">Jefe de capacitacion</option>
			</select>
			<input type="submit" name="" value="Enviar aviso" >			
		</form>
		<input type="submit" name="" value="Recargar" onclick="AvisosJDs();return false">
	</div>
	<hr>
	<div id="avisos"></div>
</div>