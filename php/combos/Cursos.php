<div class="inputT">
	<span class="label">Curso:</span>
	<select id="CursoLista" required>
	<?php 
		include("../conf/conf.php");
		$un=$_POST['unidad'];
		$de=$_POST['depa'];
		$query="SELECT distinct curso from dnc where departamento='$de' and unidad='$un' and status='Si'";
		$res=$db->query($query);
		while ($fila=$res->fetch_array()) 
		{
			echo "<option value='".$fila['curso']."'>".$fila['curso']."</option>";
		}
	?>
	</select>
</div>