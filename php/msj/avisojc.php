<?php 
	include("../conf/conf.php");
	$Usuario=$_POST['Usuario'];
	$query="SELECT  * FROM aviso order by fecha desc";
	$res=$db->query($query);

	while ($fila=$res->fetch_array()) {
		$destino=$fila['destino'];
		$tipouser=$fila['tipouser'];
		$unidad=$fila['unidad'];
		$user=$fila['usuario'];
		if ($tipouser=="Jefe de capacitacion") {
			if ($user == $Usuario) {
				echo "<div class='mensaje'>";
				echo "<div class='avisoc'>";
				echo $fila['usuario']." ".$fila['fecha']; 
				echo "<hr>";
				echo $fila['aviso'];
				echo "</div>";
				echo "</div>";
			}else{
				echo "<div class='mensaje1'>";
				echo "<div class='avisof'>";
				echo $fila['usuario']." ".$fila['fecha']; 
				echo "<hr>";
				echo $fila['aviso'];
				echo "</div>";
				echo "</div>";
			}
		}
		else{
			?>
			<div class="mensaje1">
				<div class="avisog">
				<?php echo $fila['usuario']." ".$fila['fecha']; ?>
				<hr>
					<?php  echo $fila['aviso']; ?>
				</div>
			</div>
			<?php
		}
	}
?>