<form action="" method="" accept-charset="utf-8" onsubmit="GuardarUsuario();return false">
	<div class="form-group">
		<span>Nombre del usuario:</span>
		<input type="text" id="NombreUser" class="form-control" placeholder="Nombre de usuario" autofocus required>
	</div>
	<div class="form-group">
		<span>Nombre:</span>
		<input type="text" id="Nombre" class="form-control" placeholder="Nombre de usuario"  required>
	</div>
	<div class="form-group">
		<span>Password:</span>
		<input type="text" id="Password" class="form-control" placeholder="Password del usuario" required>
	</div>
	<div class="form-group">
		<span>Unidad:</span>
		<select id="Unidad" class="form-control">
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
		<input type="submit" name="" value="Guardar datos" class="btn btn-primary">
	</div>
</form>