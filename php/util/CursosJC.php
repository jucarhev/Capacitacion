<style type="text/css">
	.select1{
		margin:5px 10px;
	}
<?php 
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$query="SELECT * from unidad as u join departamento as d on u.id=d.unidad where nombre='$unidad'";
	$res=$db->query($query);
 ?>
</style>
<table width="100%">
	<tr>
		<td>
			<fieldset class="fieldset">
				<legend class="legend"><span class="label">Ver cursos</span></legend>
				<form action="" method="POST" accept-charset="utf-8" onsubmit="BusquedaAvanzadaCursosJC();return false">

					<span class="label">Departamento: </span>
					<select class="select1" id="DepaCursoA">
						<?php 
							while ($fila=$res->fetch_array()) {
								echo "<option value='".$fila['departamento']."'>".$fila['departamento']."</option>";
							}
						 ?>
					</select>
					<span class="label">A&ntilde;o: </span>
					<select class="select1" id="anioCursoA">
						<?php 
							$query="SELECT distinct anio from curso  where unidad='$unidad'";
							$res=$db->query($query);
							while ($fila=$res->fetch_array()) {
								echo "<option value='".$fila['anio']."'>".$fila['anio']."</option>";
							}
						 ?>
					</select>
					<span class="label">Planeado: </span>
					<select class="select1" id="planeadoCursoA">
						<option value="planeado">Si</option>
						<option value="No planeada">No</option>
					</select>
					<input type="submit" class="btn-primary" value="Busqueda">

				</form>
			</fieldset>
		</td>
		<td>
			<fieldset class="fieldset">
				<legend class="legend"><span class="label">Ver cursos presupuestados</span></legend>
				<form action="" method="" accept-charset="utf-8" onsubmit="OkCursosCotizados();return false">
					<span class="label">Departamento: </span>
					<select class="select1" id="depacp">
						<?php
							$query="SELECT * from unidad as u join departamento as d on u.id=d.unidad where nombre='$unidad'";
							$res=$db->query($query);
							while ($fila=$res->fetch_array()) {
								echo "<option value='".$fila['departamento']."'>".$fila['departamento']."</option>";
							}
						 ?>
					</select>
					<span class="label">En proceso: </span>
					<select class="select1" id="Procesoscp">
						<option value="Si">Si</option>
						<option value="No">No</option>
					</select>
					<input type="submit" class="btn-primary" value="Busqueda">
				</form>
			</fieldset>
		</td>
	</tr>
</table>
<hr>
<div id="CCP">
</div>