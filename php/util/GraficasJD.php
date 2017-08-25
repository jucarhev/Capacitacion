<?php
	include_once('../clases/crud.php'); 
	$obj = new crud;
	$unidad=$_POST['unidad'];
	$dep=$_POST['dep'];
	$anio=$_POST['anio'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon" />
	<title>Seguimiento de los cursos</title>
	<style type="text/css" media="screen">
	.Cabeza{
		background-color: #424242;
		font-size: 16px;
		color: #FFF;
		text-align: center;
		padding: 2px 0px;
	}
</style>
</head>
<body>
	<table width="100%" cellspacing="0" border="1">
		<tr>
			<td class="Cabeza">Nombre</td>
			<td class="Cabeza">Status</td>
			<td class="Cabeza">Enero</td>
			<td class="Cabeza">Febrero</td>
			<td class="Cabeza">Marzo</td>
			<td class="Cabeza">Abril</td>
			<td class="Cabeza">Mayo</td>
			<td class="Cabeza">Junio</td>
			<td class="Cabeza">Julio</td>
			<td class="Cabeza">Agosto</td>
			<td class="Cabeza">Septiembre</td>
			<td class="Cabeza">Octubre</td>
			<td class="Cabeza">Noviembre</td>
			<td class="Cabeza">Diciembre</td>
			<td class="Cabeza">Total plan.</td>
			<td class="Cabeza">HH plan.</td>
		</tr>
		<?php
	$query = "SELECT nombre,Enerohsp,Febrerohsp,Marzohsp,Abrilhsp,Mayohsp,Juniohsp,Juliohsp,Agostohsp,Septiembrehsp,Octubrehsp,Noviembrehsp,Diciembrehsp,HrsPlan,Eneroap,Febreroap,Marzoap,Abrilap,Mayoasp,Junioasp,Julioasp,Agostoasp,Septiembreasp,Octubreasp,Noviembreasp,Diciembreasp,AsistPlan 
	FROM meses JOIN curso ON meses.idcurso=curso.id 
	WHERE departamento='$dep'
	and unidad='$unidad' 
	and planeado='Planeado' 
	and anio='$anio'";
	$lista= $obj->consultar($query);
	while($row = mysql_fetch_array($lista))
	{
	echo "<tr>";
	echo "<td rowspan='2'>".$row['nombre']."</td>";
	echo "<td>Horas</td>";
	echo "<td>".$row['Enerohsp']."</td>";
	echo "<td>".$row['Febrerohsp'];
	echo "<td>".$row['Marzohsp']."</td>";
	echo "<td>".$row['Abrilhsp']."</td>";
	echo "<td>".$row['Mayohsp']."</td>";
	echo "<td>".$row['Juniohsp']."</td>";
	echo "<td>".$row['Juliohsp']."</td>";
	echo "<td>".$row['Agostohsp']."</td>";
	echo "<td>".$row['Septiembrehsp']."</td>";
	echo "<td>".$row['Octubrehsp']."</td>";
	echo "<td>".$row['Noviembrehsp']."</td>";
	echo "<td>".$row['Diciembrehsp']."<br />";
	echo "<td>".$row['HrsPlan']."<br />";
	$hps=$row['HrsPlan'];
	$aps=$row['AsistPlan'];
	$herplan=$hps * $aps;
	echo "<td rowspan='2'>".$herplan."<br />";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Asistentes</td>";
	echo "<td>".$row['Eneroap']."</td>";
	echo "<td>".$row['Febreroap'];
	echo "<td>".$row['Marzoap']."</td>";
	echo "<td>".$row['Abrilap']."</td>";
	echo "<td>".$row['Mayoasp']."</td>";
	echo "<td>".$row['Junioasp']."</td>";
	echo "<td>".$row['Julioasp']."</td>";
	echo "<td>".$row['Agostoasp']."</td>";
	echo "<td>".$row['Septiembreasp']."</td>";
	echo "<td>".$row['Octubreasp']."</td>";
	echo "<td>".$row['Noviembreasp']."</td>";
	echo "<td>".$row['Diciembreasp']."</td>";
	echo "<td>".$row['AsistPlan']."</td>";
	echo "</tr>";
	}
	?> 
</table>
</body>
</html>
</div>