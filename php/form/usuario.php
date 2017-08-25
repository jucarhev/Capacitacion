
<form action="" method="" accept-charset="utf-8" onsubmit="GuardarUsuario();return false">
	<div class="inputT">
		<span class="label">Nombre del usuario:</span>
		<input type="text" id="NombreUser" class="inputTT" placeholder="Nombre de usuario" autofocus required>
	</div>
	<div class="inputT">
		<span class="label">Nombre:</span>
		<input type="text" id="Nombre" class="inputTT" placeholder="Nombre de usuario"  required>
	</div>
	<div class="inputT">
		<span class="label">Password:</span>
		<input type="text" id="Password" class="inputTT" placeholder="Password del usuario" required>
	</div>
	<div class="inputT">
		<span class="label">Unidad:</span>
		<select id="Unidad">
			<?php  
				include("../conf/conf.php");
				$query="SELECT * FROM unidad where nombre not like '%Administrador%'";
				$res=$db->query($query);
				while ($fila=$res->fetch_array()) 
				{
					$nombre=$fila['nombre'];
					echo "<option value='".$nombre."'>".$nombre."</option>";
				}
			?>
		</select>
	</div>
	<hr>
	<div>
		<input type="submit" name="" value="Guardar datos" class="btn-primary">
	</div>
</form>