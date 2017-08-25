<option value="">Seleccione</option>
<?php 
	include("../conf/conf.php");
	$id=$_POST['id'];
	$query="SELECT * from meses where idcurso=$id";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) 
	{
		$Enero=$fila['Enerohsp'];
		$Febrero=$fila['Febrerohsp'];
		$Marzo=$fila['Marzohsp'];
		$Abril=$fila['Abrilhsp'];
		$Mayo=$fila['Mayohsp'];
		$Junio=$fila['Juniohsp'];
		$Julio=$fila['Juliohsp'];
		$Agosto=$fila['Agostohsp'];
		$Septiembre=$fila['Septiembrehsp'];
		$Octubre=$fila['Octubrehsp'];
		$Noviembre=$fila['Noviembrehsp'];
		$Diciembre=$fila['Diciembrehsp'];
		if ($Enero != 0.00) {
			echo "<option value='Enero'>Enero</option>";
		}
		if ($Febrero != 0.00) {
			echo "<option value='Febrero'>Febrero</option>";
		}
		if ($Marzo != 0.00) {
			echo "<option value='Marzo'>Marzo</option>";
		}
		if ($Abril != 0.00) {
			echo "<option value='Abril'>Abril</option>";
		}
		if ($Mayo != 0.00) {
			echo "<option value='Mayo'>Mayo</option>";
		}
		if ($Junio != 0.00) {
			echo "<option value='Junio'>Junio</option>";
		}
		if ($Julio != 0.00) {
			echo "<option value='Julio'>Julio</option>";
		}
		if ($Agosto != 0.00) {
			echo "<option value='Agosto'>Agosto</option>";
		}
		if ($Septiembre != 0.00) {
			echo "<option value='Septiembre'>Septiembre</option>";
		}
		if ($Octubre != 0.00) {
			echo "<option value='Octubre'>Octubre</option>";
		}
		if ($Noviembre != 0.00) {
			echo "<option value='Noviembre'>Noviembre</option>";
		}
		if ($Diciembre != 0.00) {
			echo "<option value='Diciembre'>Diciembre</option>";
		}
	}
?>