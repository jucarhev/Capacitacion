<?php 
	include("../conf/conf.php");
	$limite=$_POST['limite'];
	$query="SELECT * FROM unidad WHERE nombre NOT LIKE '%Administrador%'";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT  * FROM unidad  WHERE nombre NOT LIKE '%Administrador%' LIMIT $limite, 20  ";
	$res=$db->query($query);
?>
<div class="container" style="padding: 5px;">
	<?php echo $total; ?> registros encontrados
	<hr class="margen">
</div>

<div class="container" style="margin-bottom: 5px;">
	<div class="row">
		<div class="col-md-10">
			<form action="" method="post" onsubmit="buscadorP();return false">
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<input type="text" id="buscadorUnidad" placeholder="Ingrese el nombre de la unidad" class="form-control" required>
						</div>
					</div>
					<div class="col-md-2">
						<input type="submit" name="" value="Buscar" class="btn btn-success">
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-2">
			<button type="button" onclick="furmulario_unidad();return false" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				Agregar
			</button>
		</div>
	</div>
</div>


<table class="table table-bordered table-striped table-hover">
	<tr>
		<th>Unidad</th>
		<th>Localidad</th>
		<th>Municipio</th>
		<th>Estado</th>
		<th>Actividad</th>
		<th colspan="3" >Operaciones</th>
	</tr>
<?php
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			echo "<td>".$fila['nombre']."</td>";
			echo "<td>".$fila['localidad']."</td>";
			echo "<td>".$fila['municipio']."</td>";
			echo "<td>".$fila['estado']."</td>";
			echo "<td>".$fila['actividad']."</td>";
			echo "<td><a href='' onclick='ventana2(".$fila['id'].",1);return false' title='Ver registros'><img src='../../img/lupa.png'></a></td>";
			echo "<td><a href='' onclick='ventana(".$fila['id'].",1);return false' title='Editar registro'><img src='../../img/pencil.png'></a></td>";
			echo "<td><a href='' onclick='EliminarUnidad(".$fila['id'].");return false' title='Dar de baja el registros'><img src='../../img/del.png'></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "<hr>";
	if ($limite>0) {
		$limit=$limite- 20;
		echo "<aside class=\"anterior\" onclick=\"tablaUnidad(".$limit.")\"><img src='../../img/anterior.png'></aside>";
	}else
	{
		echo "<aside class=\"anteriorvacio\"></aside>";
	}
	
	if ($limite<$total- 20) {
		$limit=$limite+ 20;
		echo "<aside class=\"siguiente\" onclick=\"tablaUnidad(".$limit.")\"><img src='../../img/siguiente.png'></aside>";
	}
	else{
		echo "<aside class=\"siguientevacio\"></aside>";
	}
?>