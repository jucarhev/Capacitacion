<?php
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$dep=$_POST['depa'];
	$query="SELECT * FROM curso WHERE unidad='$unidad' AND departamento='$dep' and terminado='Si' ORDER BY anio DESC";
?>
<form action="" method="POST"  onsubmit="guardarDNC();return false">
	<div class="inputT">
		<span class="label">Capacitacion: </span>
		<select id="CapacitacionDNC" onchange="meses();return false" required>
		<option value="">Seleccione uno</option>
			<?php 
				$res=$db->query($query);
				while ($fila=$res->fetch_array()) 
				{
					$nombre=$fila['nombre'];
					$idnombre=$fila['id'];
					echo "<option value='".$idnombre."'>".$nombre."</option>";
				}
			 ?>
		</select>
		<span class="label">Meses:</span>
		<select id="Mesesdnc" required ></select>
	</div>
	<hr>
	<div class="inputT">
		<span class="label">Trabajadores:</span>
		<select id="Trabajadores"  required>
			<?php 
				$querys="SELECT * FROM trabajador WHERE unidad='$unidad' AND departamento='$dep'";
				$res=$db->query($querys);
				while ($fila=$res->fetch_array()) 
				{
					$nombre=$fila['nombre'];
					$idnombre=$fila['id'];
					$tipo=$fila['tipotrabajador'];					
					if ($tipo == "No sindicalizado") {
						echo "<option value='".$idnombre."' class='azul'>".$nombre."</option>";
					}else{
						echo "<option value='".$idnombre."' class='rojo'>".$nombre."</option>";
					}
				}
			 ?>
		</select>
	</div>
	<hr>
	<div class="inputT">
		<input type="text"  placeholder="Calificacion actual" id="CalActDNC" onkeyUp="return ValNumero(this);"  required>
	<input type="text" placeholder="Calificacion planeada" id="CalPlaDNC" onkeyUp="return ValNumero(this);" required>
	</div>
	<div class="inputT">
		<input type="submit" name="" value="Terminar una captura" class="btn-primary">
		<input type="hidden" value="<?php echo (date('Y'))+1; ?>" id="anioDNC">
	</div>
</form>