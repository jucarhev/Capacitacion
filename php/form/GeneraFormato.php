<?php 
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$dep=$_POST['departamento'];
	$sata01=base64_encode($dep);
	$sata02=base64_encode($unidad);
	$anio=0;
 ?>

 <?php 

	echo "<form action='../doc/FormatoCotizadoFinal.php?sata01=".$sata01."&sata02=".$sata02."&sata03=".$anio."' method='post'>
		<input type='text' name='encargado' placeholder='Nombre del encargado' required>
		<input type='number' name='paridad' placeholder='Valor del dolar' required>
		<input type='submit' value='Generar formato' class='btn-primary'>
	</form>";
?>