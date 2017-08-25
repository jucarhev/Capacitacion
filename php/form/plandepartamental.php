<?php 
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$depa=$_POST['depa'];
	$query="SELECT distinct anio FROM curso where unidad='$unidad' and departamento='$depa'";
	$res=$db->query($query);
	
 ?>
<form action="../tabla/plandepartamental.php" method="POST" accept-charset="utf-8" target="_blanck">
<div class="center">
	<span style="font-size:20px; font-weight: bold;">Seguimiento de los cursos</span>
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
	<div class="inputT">
		<input type="submit" class="btn-primary" value="Generar">
	</div>

</form>