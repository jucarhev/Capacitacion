
<form action="" method="" accept-charset="utf-8" onsubmit="GuardarNorma();return false">
	<div class="inputT">
		<span class="label">Codigo de la norma:</span>
		<input type="text" id="Codigon" class="inputTT" placeholder="C&oacute;digo de la norma" autofocus required>
	</div>
	<div class="inputT">
		<span class="label">Nombre de la norma:</span>
		<input type="text" id="Nombren" class="inputTT" placeholder="Nombre de la norma" autofocus required>
	</div>
	<div class="inputT">
		<span class="label">Rubro:</span>
		<select id="rubro" required>
			<?php  
				include("../conf/conf.php");
				$unidad=$_POST['unidad'];
				$query="SELECT rubro, r.id FROM rubro as r join unidad as u on r.idunidad=u.id where nombre='$unidad'";

				$res=$db->query($query);
				while ($fila=$res->fetch_array()) 
				{
					$nombre=$fila['rubro'];
					$idnombre=$fila['id'];
					echo "<option value='".$idnombre."'>".$nombre."</option>";
				}
			?>
		</select>
	</div>
	<hr>
	<div>
		<input type="submit" name="" value="Guardar datos" class="btn-primary">
	</div>
</form>