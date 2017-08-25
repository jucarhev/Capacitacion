<?php 
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$depa=$_POST['depa'];
	$query="SELECT distinct anio FROM curso where unidad='$unidad' and departamento='$depa'";
	$res=$db->query($query);
	
 ?>
<form action="../util/GraficasJD.php" method="POST" accept-charset="utf-8" target="_blanck">
<div class="center">
	<span style="font-size:20px; font-weight: bold;">Gr&aacute;ficas</span>
</div>
	<div class="inputT">
		<input type="hidden" name="unidad" value="<?php echo $unidad; ?>"  size="50">
	</div>
	<div class="inputT">
		<input type="hidden" name="dep" value="<?php echo $depa; ?>"  size="50">
	</div>
	<div class="inputT">A&ntilde;o
		<select name="anio">	
			<?php 
				while ($fila=$res->fetch_array()) {
					echo "<option value='".$fila['anio']."'>".$fila['anio']."</option>";
				}
			 ?>
		</select>
	</div>
	<hr>
	<div class="inputT">
		<span style="font-size:12px; font-weight: bold;padding-bottom: 2px;">GRAFICA DE CURSOS </span>
		<input type="checkbox" name="" value="GC">
	</div>
	<div class="inputT">
		<span style="font-size:12px; font-weight: bold;padding-bottom: 2px;">GRAFICA DE ASISTENTES </span> 
		<input type="checkbox" name="" value="GA">
	</div>
	<div class="inputT">
		<span style="font-size:12px; font-weight: bold;padding-bottom: 2px;">GRAFICA DE HORAS </span> 
		<input type="checkbox" name="" value="GH">
	</div>
	<div class="inputT">
		<input type="submit" class="btn-primary" value="Generar">
	</div>
<input type="checkbox" name="" value="">
</form>