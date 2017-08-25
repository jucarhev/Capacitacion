<?php 
	include("../conf/conf.php");
	$query="SELECT  * FROM aviso where destino not like '%Jefe de departamento%' order by fecha desc";
	$res=$db->query($query);

	while ($fila=$res->fetch_array()) {
		$destino=$fila['destino'];
		$usuario=$fila['tipouser'];
		$unidad=$fila['unidad'];
		if ($usuario=="Administrador") {
			?>
			<div class="mensaje">
				<div class="avisoc">
				<?php echo $fila['usuario']." ".$fila['fecha']; ?>
				<hr>
					<?php  echo $fila['aviso']; ?>
				</div>
			</div>
			<?php
		}
		else{
			?>
			<div class="mensaje1">
				<div class="avisof">
				<?php echo $fila['usuario']." ".$fila['fecha']; ?>
				<hr>
					<?php  echo $fila['aviso']; ?>
				</div>
			</div>
			<?php
		}
	}
?>