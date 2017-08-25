<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cotizaciones</title>
	<link rel="stylesheet" href="">
</head>
<body>
<div id="contenedor">

<?php
require('../conf/DBConec.php');
include ('../clases/crud.php');
include("../conf/conf.php");
	$dep=base64_decode($_GET['sata01']);
	$uni=base64_decode($_GET['sata02']);
	$paridad=$_POST['paridad'];
	$encargado=$_POST['encargado'];

	$query="SELECT * from unidad where nombre='$uni'";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) {
		$logo=$fila['logo'];
	}

	$anio=$_GET['sata03'];
	$obj = new crud;
	$query="SELECT * FROM presupuestado WHERE unidad='$uni' AND departamento='$dep' ";
	$lista= $obj->consultar($query);

	echo 	"<div id='contenedorF'>";
		echo 		"<header>";
		echo 			"<div id='logo'><img src='../photos/".$logo."' width='200' height='60' ></div>";
		echo 			"<div id='titulo'>Necesidades de capacitacion del &Aacute;rea de ".$dep."</div>";
		echo 			"<div id='paridad'>Paridad en dolares: ".$paridad."</div>";
		echo 		"</header>";
		echo 		"<hr>";
		echo 		"<section>";
		echo 			"<div class='f1'>";
		echo 				"<div class='izq1'>Departamento:</div>";
		echo 				"<div><input type='text' class='borde1' size='80' value='".$dep."'></div>";
		echo 			"</div>";
		echo 			"<div class='f1'>";
		echo 				"<div class='izq1'>A&ntilde;o:</div>";
		echo 				"<div><input type='text' class='borde1' size='80' value='".$anio."'></div>";
		echo 			"</div>";
		echo 			"<div class='f1'>";
		echo 				"<div class='izq1'>Responsable:</div>";
		echo 				"<div><input type='text' class='borde1' size='80' value='".$encargado."'></div>";
		echo 			"</div>";
		echo "<hr>";
		echo "<table  style='text-align:center;' class='Cntro'>
				<tr id='tr34'>
					<td><h4> Inversion</h4></td>
					<td><h4>$ MXM</h4></td>
					<td><h4>($) USD</h4></td>
				</tr>
				<tr id='tr34'>
					<td colspan='3'><hr></td>
				</tr>";
				$invto=0;
				$din1=0;
				$sql10=mysql_query("SELECT * FROM presupuestado WHERE unidad='$uni' AND departamento='$dep'",$con);
				while($rows1 = mysql_fetch_array($sql10))
				{
					echo "<tr>";
					echo "<td style='text-align: right;'>".$rows1['nombre']."</td>";
					echo "<td><input type='text' value='".$rows1['invtotal']."' class='borde2'></td>";
					$invT=$rows1['invtotal'];
					$paridadD=$invT/$paridad;
					echo "<td><input type='text' class='borde2' value='".$paridadD."'></td>";
					$invto=$invto+$invT;
					$din1=$din1+$paridadD;
					echo "</tr>";
				}
		echo	"<tr>
					<td><h4>Inversion Total</h4></td>
					<td><input type='text' value='".$invto."' class='borde2'></td>
					<td><input type='text' value='".$din1."' class='borde2'></td>
				</tr>
				</table>";
		echo 		"</section>";
		echo 	"</div>";

		echo "<hr>";
	while($row = mysql_fetch_array($lista))
	{
		$idP=$row['id'];
		$nombre=$row['nombre'];
		$unidad=$row['unidad'];
		$depart=$row['departamento'];
		$objetivos=$row['objetivos'];
		$instructor=$row['imparte'];
		$lugar=$row['lugar'];
		$duracion=$row['duracion'];
		$npersonas=$row['numpersonas'];
		$costocurso=$row['costocurso'];

		$transporte=$row['transporte'];
		$Alimentacion=$row['alimentacion'];
		$hospedaje=$row['hospedaje'];
		$Otros=$row['otros'];
		$Inversionp=$row['invpersona'];
		$Inversiont=$row['invtotal'];
		
		echo 	"<div id='contenedorF'>";
		echo 		"<header>";
		echo 			"<div id='logo'><img src='../photos/".$logo."' width='200' height='60' ></div>";
		echo 			"<div id='titulo'>Necesidades de capacitacion</div>";
		echo 			"<div id='paridad'></div>";
		echo 		"</header>";
		echo 		"<hr>";
		echo 		"<section>";
		echo 			"<div class='f1'>";
		echo 				"<div class='izq1'>Capacitacion solicitada:</div>";
		echo 				"<div><input type='text' class='borde1' size='80' value='".$nombre."'></div>";
		echo 			"</div>";
		echo 			"<div class='f1'>";
		echo 				"<div class='izq1'>Escuela o Institucion que imparte el curso:</div>";
		echo 				"<div><input type='text' class='borde1' size='80' value='".$instructor."'></div>";
		echo 			"</div>";
		echo 			"<div class='f1'>";
		echo 				"<div class='izq1'>Lugar:</div>";
		echo 				"<div><input type='text' class='borde1' size='80' value='".$lugar."'></div>";
		echo 			"</div>";
		echo 			"<div class='f1'>";
		echo 				"<div class='izq1'>No de personas consideradas:</div>";
		echo 				"<div><input type='text' class='borde1' size='4' value='".$npersonas."'></div>";
		echo 			"</div>";
		echo 			"<div class='f1'>";
		echo 				"<div class='izq1'>Duracion:</div>";
		echo 				"<div><input type='text' class='borde1' size='6' value='".$duracion."'></div>";
		echo 			"</div>";
		echo 			"<div class='f1'>";
		echo 				"<div class='izq1'>Nombres:</div>";
							require('../conf/DBConec.php');
							$sql1=mysql_query("SELECT * FROM emplpres WHERE id_presupuestado=$idP",$con);
							$n=0;
							while($rows = mysql_fetch_array($sql1))
							{
								$idT=$rows['idEmpl'];
								$sql2=mysql_query("SELECT * FROM trabajador WHERE id=$idT",$con);
								while($row1 = mysql_fetch_array($sql2))
								{
									if ($n==0) 
									{
										echo "<div>
										<input type='text' class='borde1' size='40' value='".$row1['nombre']." ".$row1['apaterno']." ".$row1['amaterno']."'></div>";
									}
									else
									{
										echo "<div class='izq1'>.</div>";
										echo "<div>
										<input type='text' class='borde1' size='40' value='".$row1['nombre']." ".$row1['apaterno']." ".$row1['amaterno']."'></div>";
									}
								}
								
								$n=$n+1;
							}

		echo "</div>";
		echo 			"<div class='f2'>";
		echo 				"<div id='Inversion'>";
		echo 					"<div class='titulo2'><h2>Inversion</h2></div>";
		echo 					"<div>";
		echo 						"Costo del curso:<input type='number' class='borde2' id='presu01' value='".$costocurso."'>";
		echo 					"</div>";
		echo 					"<div>";
		echo 						"Transportacion:<input type='number' class='borde2' id='presu02' value='".$transporte."'>";
		echo 					"</div>";
		echo 					"<div>";
		echo 						"Alimentacion:<input type='number' class='borde2' id='presu03' value='".$Alimentacion."'>";
		echo 					"</div>";
		echo 					"<div>";
		echo 						"Hospedaje:<input type='number' class='borde2' id='presu04' value='".$hospedaje."'>";
		echo 					"</div>";
		echo 					"<div>";
		echo 						"Otros:<input type='number' class='borde2' id='presu05' value='".$Otros."'>";
		echo 					"</div>";
		echo 					"<div>";
		echo 						"Inversion por persona:<input type='number' class='borde2' id='presu06' value='".$Inversionp."'>";
		echo 					"</div>";
		echo 					"<div>";
		echo 						"Inversion total:<input type='number' class='borde2' id='presu07' value='".$Inversiont."'>";
		echo 					"</div>";
		echo 				"</div>";
		echo 				"<div id='Beneficios'>";
		echo 					"<div><h2>Beneficios</h2></div>";
		echo 					"<div>";
		echo 						"<textarea rows='10' cols='45'  id='obje'>".$objetivos."</textarea>";
		echo 					"</div>";
		echo 				"</div>";
		echo 			"</div>";			
		echo 		"</section>";
		echo 	"</div>";

	
	





	}
?>
</div>
<style type="text/css">
	#tr34
	{
		border-bottom:1px solid #000;
	}
	#contenedor
	{
		width:100%;
		height: 100%;
		overflow: hidden;
		font-size: 12px;

	}
	#contenedorF
	{
		width: 900px;
		border: 1px solid #000;
		margin: 10px auto;		
		padding: 10px;
		overflow: hidden;
	}
	#contenedorG
	{
		width: 50px;
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
		border-left: 1px solid #000;
		margin: 10px auto;		
		padding: 10px;
		float: left;
		text-align: center;
		margin-left: 10px;
	}
	header
	{
		width: 100%;
		overflow: hidden;
	}
	#logo
	{
		width: 200px;
		float: left;
	}
	#titulo
	{
		width: 400px;
		float: left;
		text-align: center;
		height: 30px;
		padding-top: 15px;
		padding-bottom: 15px;
		font-size: 16px;
		font-weight: bolder;
		font-family: Arial, Helvetica;
	}
	.titulo2
	{
		padding-right: 200px;
	}
	#paridad
	{
		width: 200px;
		float: left;
		text-align: center;
	}
	.izq1
	{
		float: left;
		text-align: right;
		width: 300px;
	}
	.f1
	{
		text-align: left;
	}
	.borde1
	{
		border: 0px;
		border-bottom: 1px solid #000;
		text-align: center;
	}
	.borde2
	{
		border: 1px solid #000;
		text-align: center;
	}
	#Inversion
	{
		width: 420px;
		float: left;
		text-align: right;
	}
	#Beneficios
	{
		width: 200px;
		float: left;
		text-align: right;
	}
	#f2
	{
		text-align: right;
	}
	.Cntro
	{
		margin: 0px auto;
	}
	</style>
</body>
</html>

