<?php 
include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$depa=$_POST['depa'];
	$curso=$_POST['curso'];
	$query="SELECT id FROM curso WHERE  unidad='$unidad' and departamento='$depa' and nombre='$curso'";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) {
		$id=$fila['id'];
	}
	$query="SELECT * FROM trabajador WHERE  unidad='$unidad' and departamento='$depa'";
	$res=$db->query($query);
 ?>
<form>
	<div class="inputT">
		<input type="text" name="" value="" placeholder="" list="Trabajador" id="pasarlista" required size="40">
		<?php echo "<input type='hidden' value='".$id."' id='Curso'>"; ?>
		<input type="submit" name="" value="Agregar" onclick="Pasedelista();return false" class="btn-primary">
	</div>
	<br>

</form>
<div id="paselista">
	
</div>
 <?php 
	
	echo "<datalist id='Trabajador'>";
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			$id=$fila['id'];
			$nc=$fila['numerocobro'];
			$no=$fila['nombre'];
			$ap=$fila['apaterno'];
			$am=$fila['amaterno'];
			echo "<option value='".$id."'>".$nc." ".$no." ".$ap." ".$am."</option>";
		}
	}
	echo "</datalist>";
?>