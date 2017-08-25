<table  width="100%" cellspacing="0" >
	<tr>
		<td colspan="6" class="center"><h1 class="h1">KARDEX</h1></td>
	</tr>
	<tr>
		<td colspan="5">
			<div class="espacio">
				<form action="" method="post" onsubmit="kardexjc2();return false">
					<input type="text" id="buscadorKARDEXjc" placeholder="Ingrese un numero de cobro" class="espacio1" list="Trabajador" onkeyUp="return ValNumero(this);" required>
					<input type="submit" name="" value="Buscar" class="espacio2">
				</form>
			</div>
		</td>
	</tr>
</table>
<br>
<div id="kardexjd">
	
</div>

 <?php 
 	$unidad=$_POST['unidad'];
	$query="SELECT * FROM trabajador where unidad='$unidad'";
	include("../conf/conf.php");
	$res=$db->query($query);
	echo "<datalist id='Trabajador'>";
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			$id=$fila['id'];
			$nc=$fila['numerocobro'];
			$no=$fila['nombre'];
			$ap=$fila['apaterno'];
			$am=$fila['amaterno'];
			echo "<option value='".$nc."'>".$nc." ".$no." ".$ap." ".$am."</option>";
		}
	}
	echo "</datalist>";
?>