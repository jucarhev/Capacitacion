<?php
require('../conf/conf.php');
$mesReporte=$_GET['mesReporte'];
$anioReporte=$_GET['anioReporte'];
$anioReportea=$anioReporte-1;
$unidadRepor=$_GET['Unidad'];
$query="SELECT * from unidad  where nombre='$unidadRepor'";
$res=$db->query($query);
while ($fila=$res->fetch_array()) {
	$logo=$fila['logo'];
}
?>
<html>
<head>
<TITLE>Reporte para el corporativo</TITLE>
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon" />
</head>
<body>
<?php echo "<img src='../photos/".$logo."'>";
?>
<center>
<div align="center">
<h4>REPORTE CAPACITACION <?php echo $mesReporte." ".$anioReporte;?>
</h4></div>
<form METHOD="POST" ACTION="">
<table Border="1" width="80%"> 

<tr height="5">
<td align="return false" width="30%"  colspan="1"></td>
<td align="center" width="5%" colspan="2"><font size=2>PROGRAMADO</font></td>
<td align="center" width="5%" colspan="2"><font size=2>REAL</font></td>
<td align="center" width="5%" colspan="2"><font size=2>REAL A&Ntilde;O <?php echo $anioReporte;?>
</font></td>
<td align="center" width="5%" colspan="2"><font size=2>REAL A&Ntilde;O &nbsp;<?php echo $anioReportea;?>
</font></td>
</tr>

<tr height="5">
<td width="30%"></td>
<td align="center" width="5%"><font size=2>Sindical</font></td>
<td align="center" width="5%"><font size=2>E. C.</font></td>
<td align="center" width="5%"><font size=2>Sindical</font></td>
<td align="center" width="5%"><font size=2>E. C.</font></td>
<td align="center" width="5%"><font size=2>Sindical</font></td>
<td align="center" width="5%"><font size=2>E. C.</font></td>
<td align="center" width="5%"><font size=2>Sindical</font></td>
<td align="center" width="5%"><font size=2>E. C.</font></td>
</tr>

<tr>
<td width="30%" height="10"><font size=2>Cursos programados en el mes</font></td>
<!-- Cuenta cuentos cursos han sido planeados con personas sindicalixadas -->
	<?php 
		$sql1="SELECT distinct curso from curso as c join dnc as d on c.nombre=d.curso join trabajador as t on d.nocobro=t.numerocobro where tipotrabajador='Sindicalizado' and planeado='Planeado' and d.mes='$mesReporte' and t.unidad='$unidadRepor' and d.anio='$anioReporte'";
		$res=$db->query($sql1);
		$conteo01=$res->num_rows;
	?>
<td width="5%"><center><?php echo $conteo01;?></center></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalixadas -->
	<?php 
		$sql2="SELECT distinct curso from curso as c join dnc as d on c.nombre=d.curso join trabajador as t on d.nocobro=t.numerocobro where tipotrabajador='No sindicalizado' and planeado='Planeado' and d.mes='$mesReporte' and t.unidad='$unidadRepor' and c.anio='$anioReporte'";
		$res=$db->query($sql2);
		$conteo02=$res->num_rows;
	?>
<td width="5%"><center><?php echo $conteo02;?></center></td>

<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
</tr>

<tr>
<td width="30%"><font size=2>Cursos impartidos en el mes</font></td>
<td width="5%"></td>
<td width="5%"></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalixadas -->
	<?php 
		$sql10="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='$mesReporte'";
		$res=$db->query($sql10);
		$conteo10=$res->num_rows;
	?>
<td width="5%"><center><?php echo $conteo10;?></center></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalixadas -->
	<?php 
		$sql11="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='$mesReporte'";
		$res=$db->query($sql11);
		$conteo11=$res->num_rows;
	?>
<td width="5%"><center><?php echo $conteo11;?></center></td>

<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
</tr>

<tr>
<td width="30%"><font size=2>Prom. mensual cursos impartidos en &nbsp;<?php echo $anioReporte;?>
</font></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<?php 
		$sql110="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Enero'";
		$sql111="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Febrero'";
		$sql112="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Marzo'";
		$sql113="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Abril'";
		$sql114="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Mayo'";
		$sql115="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Junio'";
		$sql116="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Julio'";
		$sql117="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Agosto'";
		$sql118="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Septiembre'";
		$sql119="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Octubre'";
		$sql120="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Noviembre'";
		$sql121="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and l.mes='Diciembre'";

		$acumulador=0;
		if ($mesReporte=="ENERO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$acumulador=$enero;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$acumulador=($enero+$febrero)/2;
		}
		if ($mesReporte=="MARZO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo)/3;
		}
		if ($mesReporte=="ABRIL") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril)/4;
		}
		if ($mesReporte=="MAYO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo)/5;
		}
		if ($mesReporte=="JUNIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio)/6;
		}
		if ($mesReporte=="JULIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio)/7;
		}
		if ($mesReporte=="AGOSTO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto)/8;
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre)/9;
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre)/10;
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre)/11;
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$res=$db->query($sql121);
			$diciembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre+$diciembre)/12;
		}
$acumulador=substr($acumulador , 0, 5);
	?>
<td width="5%"><center><?php echo $acumulador;?></center></td>
<?php 
		$sql110="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Enero'";
		$sql111="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Febrero'";
		$sql112="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Marzo'";
		$sql113="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Abril'";
		$sql114="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Mayo'";
		$sql115="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Junio'";
		$sql116="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Julio'";
		$sql117="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Agosto'";
		$sql118="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Septiembre'";
		$sql119="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Octubre'";
		$sql120="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Noviembre'";
		$sql121="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and l.mes='Diciembre'";

		$acumulador=0;
		if ($mesReporte=="ENERO") 
		{
			$res=$con->query($sql110);
			$enero=$res->num_rows;
			$acumulador=$enero;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$res=$con->query($sql110);
			$enero=$res->num_rows;
			$res=$con->query($sql111);
			$febrero=$res->num_rows;
			$acumulador=($enero+$febrero)/2;
		}
		if ($mesReporte=="MARZO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo)/3;
		}
		if ($mesReporte=="ABRIL") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril)/4;
		}
		if ($mesReporte=="MAYO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo)/5;
		}
		if ($mesReporte=="JUNIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio)/6;
		}
		if ($mesReporte=="JULIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio)/7;
		}
		if ($mesReporte=="AGOSTO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto)/8;
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre)/9;
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre)/10;
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre)/11;
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$res=$db->query($sql121);
			$diciembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre+$diciembre)/12;
		}
$acumulador=substr($acumulador , 0, 5);
	?>
<td width="5%"><center><?php echo $acumulador;?></center></td>
<td width="5%"></td>
<td width="5%"></td>
</tr>

<tr>
<td width="30%"><font size=2>Prom. mensual cursos impartidos en <?php echo $anioReportea;?>
</font></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<?php 
		$sql110="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Enero'";
		$sql111="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Febrero'";
		$sql112="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Marzo'";
		$sql113="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Abril'";
		$sql114="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Mayo'";
		$sql115="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Junio'";
		$sql116="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Julio'";
		$sql117="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Agosto'";
		$sql118="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Septiembre'";
		$sql119="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Octubre'";
		$sql120="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Noviembre'";
		$sql121="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='Sindicalizado' and l.mes='Diciembre'";

		$acumulador=0;
		if ($mesReporte=="ENERO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$acumulador=$enero;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$acumulador=($enero+$febrero)/2;
		}
		if ($mesReporte=="MARZO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo)/3;
		}
		if ($mesReporte=="ABRIL") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril)/4;
		}
		if ($mesReporte=="MAYO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo)/5;
		}
		if ($mesReporte=="JUNIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio)/6;
		}
		if ($mesReporte=="JULIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio)/7;
		}
		if ($mesReporte=="AGOSTO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto)/8;
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre)/9;
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre)/10;
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre)/11;
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$res=$db->query($sql121);
			$diciembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre+$diciembre)/12;
		}		
$acumulador=substr($acumulador , 0, 5);
	?>
<td width="5%"><center><?php echo $acumulador;?></center></td>
<?php 
		$sql110="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Enero'";
		$sql111="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Febrero'";
		$sql112="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Marzo'";
		$sql113="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Abril'";
		$sql114="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Mayo'";
		$sql115="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Junio'";
		$sql116="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Julio'";
		$sql117="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Agosto'";
		$sql118="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Septiembre'";
		$sql119="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Octubre'";
		$sql120="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Noviembre'";
		$sql121="SELECT distinct c.nombre from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where t.unidad='$unidadRepor' and c.anio='$anioReportea' and tipotrabajador='No sindicalizado' and l.mes='Diciembre'";

		$acumulador=0;
		if ($mesReporte=="ENERO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$acumulador=$enero;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$acumulador=($enero+$febrero)/2;
		}
		if ($mesReporte=="MARZO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo)/3;
		}
		if ($mesReporte=="ABRIL") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril)/4;
		}
		if ($mesReporte=="MAYO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo)/5;
		}
		if ($mesReporte=="JUNIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio)/6;
		}
		if ($mesReporte=="JULIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio)/7;
		}
		if ($mesReporte=="AGOSTO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto)/8;
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre)/9;
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre)/10;
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre)/11;
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$res=$db->query($sql121);
			$diciembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre+$diciembre)/12;
		}
$acumulador=substr($acumulador , 0, 5);
	?>
<td width="5%"><center><?php echo $acumulador;?></center></td>
</tr>

<tr>
<td width="30%"><font size=2>Trabajadores programados en el mes</font></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalixadas -->
	<?php 
		$sql10="SELECT distinct nocobro from curso as c join dnc as d on c.nombre=d.curso join trabajador as tc on 
		d.nocobro=tc.numerocobro where c.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='Sindicalizado' and d.mes='$mesReporte'";

		$res=$db->query($sql10);
		$conteo10=$res->num_rows;
	?>
<td width="5%"><center><?php echo $conteo10; ?></center></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalixadas -->
	<?php 
		$sql11="SELECT distinct nocobro from curso as c join dnc as d on c.nombre=d.curso join trabajador as tc on 
		d.nocobro=tc.numerocobro where c.unidad='$unidadRepor' and c.anio='$anioReporte' and tipotrabajador='No sindicalizado' and d.mes='$mesReporte'";

		$res=$db->query($sql11);
		$conteo11=$res->num_rows;
	?>
<td width="5%"><center><?php echo $conteo11; ?></center></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
</tr>

<tr>
<td width="30%"><font size=2>Trabajadores capacitados en el mes</font></td>
<td width="5%"></td>
<td width="5%"></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalixadas -->
	<?php 
		$sql12="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='$mesReporte' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";

		$res=$db->query($sql12);
		$conteo12=$res->num_rows;
	?>
<td width="5%"><center><?php echo $conteo12; ?></center></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalixadas -->
	<?php 
		$sql13="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='$mesReporte' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$res=$db->query($sql13);
		$conteo13=$res->num_rows;
	?>
<td width="5%"><center><?php echo $conteo13; ?></center></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
</tr>

<tr>
	<td width="30%"><font size=2>Prom. mensual trabajadores capacitados en &nbsp;<?php echo $anioReporte;?>

	</font></td>
	<td width="5%"></td>
	<td width="5%"></td>
	<td width="5%"></td>
	<td width="5%"></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalixadas -->
	<?php 
		$sql200="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql201="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql202="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql203="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql204="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql205="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql206="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Julio' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql207="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Agosto' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql208="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Septiembre' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql209="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Octubre' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql210="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Noviembre' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql211="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Diciembre' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";

		$acumulador=0;
		if ($mesReporte=="ENERO") 
		{
			$res=$db->query($sql200);
			$enero=$res->num_rows;
			$acumulador=$enero;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$res=$db->query($sql200);
			$enero=$res->num_rows;
			$res=$db->query($sql201);
			$febrero=$res->num_rows;
			$acumulador=($enero+$febrero)/2;
		}
		if ($mesReporte=="MARZO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo)/3;
		}
		if ($mesReporte=="ABRIL") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril)/4;
		}
		if ($mesReporte=="MAYO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo)/5;
		}
		if ($mesReporte=="JUNIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio)/6;
		}
		if ($mesReporte=="JULIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio)/7;
		}
		if ($mesReporte=="AGOSTO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto)/8;
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre)/9;
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre)/10;
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre)/11;
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$res=$db->query($sql121);
			$diciembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre+$diciembre)/12;
		}
$acumulador=substr($acumulador , 0, 5);
	?>
	<td width="5%"><center><?php echo $acumulador; ?></center></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalixadas -->
	<?php 
		$sql200="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql201="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql202="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql203="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql204="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql205="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql206="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Julio' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql207="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Agosto' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql208="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Septiembre' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql209="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Octubre' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql210="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Noviembre' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$sql211="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Diciembre' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";

		$acumulador=0;
		if ($mesReporte=="ENERO") 
		{
			$res=$db->query($sql200);
			$enero=$res->num_rows;
			$acumulador=$enero;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$res=$db->query($sql200);
			$enero=$res->num_rows;
			$res=$db->query($sql201);
			$febrero=$res->num_rows;
			$acumulador=($enero+$febrero)/2;
		}
		if ($mesReporte=="MARZO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo)/3;
		}
		if ($mesReporte=="ABRIL") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril)/4;
		}
		if ($mesReporte=="MAYO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo)/5;
		}
		if ($mesReporte=="JUNIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio)/6;
		}
		if ($mesReporte=="JULIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio)/7;
		}
		if ($mesReporte=="AGOSTO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto)/8;
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre)/9;
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre)/10;
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre)/11;
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$res=$db->query($sql121);
			$diciembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre+$diciembre)/12;
		}
$acumulador=substr($acumulador , 0, 5);
	?>
	<td width="5%"><center><?php echo $acumulador; ?></center></td>
	<td width="5%"></td>
	<td width="5%"></td>
</tr>

<tr>
	<td width="30%"><font size=2>Prom. mensual trabajadores capacitados en <?php echo $anioReportea;?>
	</font></td>
	<td width="5%"></td>
	<td width="5%"></td>
	<td width="5%"></td>
	<td width="5%"></td>
	<td width="5%"></td>
	<td width="5%"></td>
	<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalixadas -->
	<?php 
		$sql200="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql201="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql202="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql203="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql204="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql205="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql206="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Julio' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql207="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Agosto' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql208="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Septiembre' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql209="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Octubre' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql210="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Noviembre' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql211="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Diciembre' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";

		$acumulador=0;
		if ($mesReporte=="ENERO") 
		{
			$res=$db->query($sql200);
			$enero=$res->num_rows;
			$acumulador=$enero;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$res=$db->query($sql200);
			$enero=$res->num_rows;
			$res=$db->query($sql201);
			$febrero=$res->num_rows;
			$acumulador=($enero+$febrero)/2;
		}
		if ($mesReporte=="MARZO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo)/3;
		}
		if ($mesReporte=="ABRIL") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril)/4;
		}
		if ($mesReporte=="MAYO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo)/5;
		}
		if ($mesReporte=="JUNIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio)/6;
		}
		if ($mesReporte=="JULIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio)/7;
		}
		if ($mesReporte=="AGOSTO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto)/8;
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre)/9;
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre)/10;
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre)/11;
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$res=$db->query($sql121);
			$diciembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre+$diciembre)/12;
		}
$acumulador=substr($acumulador , 0, 5);
	?>
	<td width="5%"><center><?php echo $acumulador; ?></center></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalixadas -->
	<?php 
		$sql200="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql201="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql202="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql203="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql204="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql205="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql206="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Julio' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql207="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Agosto' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql208="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Septiembre' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql209="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Octubre' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql210="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Noviembre' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$sql211="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Diciembre' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";

		$acumulador=0;
		if ($mesReporte=="ENERO") 
		{
			$res=$db->query($sql200);
			$enero=$res->num_rows;
			$acumulador=$enero;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$res=$db->query($sql200);
			$enero=$res->num_rows;
			$res=$db->query($sql201);
			$febrero=$res->num_rows;
			$acumulador=($enero+$febrero)/2;
		}
		if ($mesReporte=="MARZO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo)/3;
		}
		if ($mesReporte=="ABRIL") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril)/4;
		}
		if ($mesReporte=="MAYO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo)/5;
		}
		if ($mesReporte=="JUNIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio)/6;
		}
		if ($mesReporte=="JULIO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio)/7;
		}
		if ($mesReporte=="AGOSTO") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto)/8;
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre)/9;
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre)/10;
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre)/11;
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$res=$db->query($sql110);
			$enero=$res->num_rows;
			$res=$db->query($sql111);
			$febrero=$res->num_rows;
			$res=$db->query($sql112);
			$marzo=$res->num_rows;
			$res=$db->query($sql113);
			$abril=$res->num_rows;
			$res=$db->query($sql114);
			$mayo=$res->num_rows;
			$res=$db->query($sql115);
			$junio=$res->num_rows;
			$res=$db->query($sql116);
			$julio=$res->num_rows;
			$res=$db->query($sql117);
			$agosto=$res->num_rows;
			$res=$db->query($sql118);
			$septiembre=$res->num_rows;
			$res=$db->query($sql119);
			$octubre=$res->num_rows;
			$res=$db->query($sql120);
			$novimbre=$res->num_rows;
			$res=$db->query($sql121);
			$diciembre=$res->num_rows;
			$acumulador=($enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$novimbre+$diciembre)/12;
		}
$acumulador=substr($acumulador , 0, 5);
	?>
	<td width="5%"><center><?php echo $acumulador; ?></center></td>
</tr>

<tr>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<td width="30%"><font size=2>Horas/Hombre programadas en el mes</font></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalizadas -->
	<?php 
		$sql14="SELECT distinct c.id from curso as c join dnc as d on c.nombre=d.curso join trabajador as t on d.nocobro=t.numerocobro where mes='$mesReporte' and c.unidad='$unidadRepor' and d.anio='$anioReporte' and tipotrabajador='Sindicalizado'";
		$res=$db->query($sql14);

		$hhps=0;
		while ($row03=$res->fetch_array()) 
		{
			$cursohhps=$row03['id'];
			if ($mesReporte == "ENERO") 
			{
				$sql15="SELECT Enerohsp from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array()) 
				{
					$Enerohsp=$row04['Enerohsp'];
					$hhps=$hhps+$Enerohsp;
				}
			}
			if ($mesReporte == "FEBRERO") 
			{
				$sql15="SELECT * from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array())  
				{
					$Febrerohsp=$row04['Febrerohsp'];
					$hhps=$hhps+$Febrerohsp;
				}
			}
			if ($mesReporte == "MARZO") 
			{
				$sql15="SELECT * from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array())  
				{
					$Marzohsp=$row04['Marzohsp'];
					$hhps=$hhps+$Marzohsp;
				}
			}
			if ($mesReporte == "ABRIL") 
			{
				$sql15="SELECT * from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array())  
				{
					$Abrilhsp=$row04['Abrilhsp'];
					$hhps=$hhps+$Abrilhsp;
				}
			}
			if ($mesReporte == "MAYO") 
			{
				$sql15="select * from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array())  
				{
					$Mayohsp=$row04['Mayohsp'];
					$hhps=$hhps+$Mayohsp;
				}
			}
			if ($mesReporte == "JUNIO") 
			{
				$sql15="select * from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array())  
				{
					$Juniohsp=$row04['Juniohsp'];
					$hhps=$hhps+$Juniohsp;
				}
			}
			if ($mesReporte == "JULIO") 
			{
				$sql15="select * from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array())  
				{
					$Juliohsp=$row04['Juliohsp'];
					$hhps=$hhps+$Juliohsp;
				}
			}
			if ($mesReporte == "AGOSTO") 
			{
				$sql15="select * from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array())  
				{
					$Agostohsp=$row04['Agostohsp'];
					$hhps=$hhps+$Agostohsp;
				}
			}
			if ($mesReporte == "SEPTIEMBRE") 
			{
				$sql15="select * from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array())  
				{
					$Septiembrehsp=$row04['Septiembrehsp'];
					$hhps=$hhps+$Septiembrehsp;
				}
			}
			if ($mesReporte == "OCTUBRE") 
			{
				$sql15="select * from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array())  
				{
					$Octubrehsp=$row04['Octubrehsp'];
					$hhps=$hhps+$Octubrehsp;
				}
			}
			if ($mesReporte == "NOVIEMBRE") 
			{
				$sql15="select * from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array())  
				{
					$Noviembrehsp=$row04['Noviembrehsp'];
					$hhps=$hhps+$Noviembrehsp;
				}
			}
			if ($mesReporte == "DICIEMBRE") 
			{
				$sql15="select * from meses where idcurso=$cursohhps";
				$res=$db->query($sql15);
				while ($row04=$res->fetch_array())
				{
					$Diciembrehsp=$row04['Diciembrehsp'];
					$hhps=$hhps+$Diciembrehsp;
				}
			}
		}		
	?>
<td width="5%"><center><?php echo $reult=$hhps*$conteo10; ?></center></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalizadas -->
	<?php 
		$sql14="SELECT distinct c.id from curso as c join dnc as d on c.nombre=d.curso join trabajador as t on d.nocobro=t.numerocobro where mes='$mesReporte' and c.unidad='$unidadRepor' and d.anio='$anioReporte' and tipotrabajador='No sindicalizado'";
		$res=$db->query($sql14);
		$hhps=0;
		while ($row04=$res->fetch_array())
		{
			$cursohhps=$row03['id'];
			if ($mesReporte == "ENERO") 
			{
				$sql15=mysql_query("select Enerohsp from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Enerohsp=$row04['Enerohsp'];
					$hhps=$hhps+$Enerohsp;
				}
			}
			if ($mesReporte == "FEBRERO") 
			{
				$sql15=mysql_query("select * from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Febrerohsp=$row04['Febrerohsp'];
					$hhps=$hhps+$Febrerohsp;
				}
			}
			if ($mesReporte == "MARZO") 
			{
				$sql15=mysql_query("select * from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Marzohsp=$row04['Marzohsp'];
					$hhps=$hhps+$Marzohsp;
				}
			}
			if ($mesReporte == "ABRIL") 
			{
				$sql15=mysql_query("select * from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Abrilhsp=$row04['Abrilhsp'];
					$hhps=$hhps+$Abrilhsp;
				}
			}
			if ($mesReporte == "MAYO") 
			{
				$sql15=mysql_query("select * from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Mayohsp=$row04['Mayohsp'];
					$hhps=$hhps+$Mayohsp;
				}
			}
			if ($mesReporte == "JUNIO") 
			{
				$sql15=mysql_query("select * from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Juniohsp=$row04['Juniohsp'];
					$hhps=$hhps+$Juniohsp;
				}
			}
			if ($mesReporte == "JULIO") 
			{
				$sql15=mysql_query("select * from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Juliohsp=$row04['Juliohsp'];
					$hhps=$hhps+$Juliohsp;
				}
			}
			if ($mesReporte == "AGOSTO") 
			{
				$sql15=mysql_query("select * from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Agostohsp=$row04['Agostohsp'];
					$hhps=$hhps+$Agostohsp;
				}
			}
			if ($mesReporte == "SEPTIEMBRE") 
			{
				$sql15=mysql_query("select * from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Septiembrehsp=$row04['Septiembrehsp'];
					$hhps=$hhps+$Septiembrehsp;
				}
			}
			if ($mesReporte == "OCTUBRE") 
			{
				$sql15=mysql_query("select * from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Octubrehsp=$row04['Octubrehsp'];
					$hhps=$hhps+$Octubrehsp;
				}
			}
			if ($mesReporte == "NOVIEMBRE") 
			{
				$sql15=mysql_query("select * from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Noviembrehsp=$row04['Noviembrehsp'];
					$hhps=$hhps+$Noviembrehsp;
				}
			}
			if ($mesReporte == "DICIEMBRE") 
			{
				$sql15=mysql_query("select * from meses where idcurso=$cursohhps",$con);
				while ($row04=mysql_fetch_array($sql15)) 
				{
					$Diciembrehsp=$row04['Diciembrehsp'];
					$hhps=$hhps+$Diciembrehsp;
				}
			}
		}		
	?>
<td width="5%"><center><?php echo $reult=$hhps*$conteo11; ?></center></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
</tr>

<tr>
	<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalizadas -->
	<?php 
		$sql15="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='$mesReporte' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";

		$res = $con->query($sql15);
		$hhprs=0;
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
		}
	?>
<td width="30%"><font size=2>Horas/Hombre de capacitacion en el mes</font></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"><center><?php echo $reult01=$hhprs*$conteo12;?></center></td>
	<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalizadas -->
	<?php 
		$sql16="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='$mesReporte' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte";
		$res = $con->query($sql16);
		$hhprns=0;
		while ($row06=$res->fetch_array())
		{
			$hhprns=$hhprns+$row06['duracion'];
		}
	?>
<td width="5%"><center><?php echo $reult01=$hhprns*$conteo13;?></center></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
</tr>

<tr>
<td width="30%"><font size=2>Prom. mensual Hrs/Hombre en &nbsp;<?php echo $anioReporte;?>
</font></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalizadas -->
	<?php 
	$conteo121=0;
	$conteo122=0;
	$conteo123=0;
	$conteo124=0;
	$conteo125=0;
	$conteo126=0;
	$conteo127=0;
	$conteo128=0;
	$conteo129=0;
	$conteo130=0;
	$conteo131=0;
	$conteo132=0;

	$sql121="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql121);
		$conteo121 = $res->num_rows;
	$sql122="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql122);
		$conteo122 = $res->num_rows;
	$sql123="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql123);
		$conteo123 = $res->num_rows;
	$sql124="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql124);
		$conteo124 = $res->num_rows;
	$sql125="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql125);
		$conteo125 = $res->num_rows;
	$sql126="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql126);
		$conteo126 = $res->num_rows;
	$sql127="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql127);
		$conteo127 = $res->num_rows;
	$sql128="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql128);
		$conteo128 = $res->num_rows;
	$sql129="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql129);
		$conteo129 = $res->num_rows;
	$sql130="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql130);
		$conteo130 = $res->num_rows;
	$sql131="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql131);
		$conteo131 = $res->num_rows;
	$sql132="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$ras=$con->query($sql132);
		$conteo132 = $res->num_rows;


	$Enerohhr=0;
	$Febrerohhr=0;
	$Marzohhr=0;
	$Abrilhhr=0;
	$Mayohhr=0;
	$Juniohhr=0;
	$Juliohhr=0;
	$Agostohhr=0;
	$Septiembrehhr=0;
	$Octubrehhr=0;
	$Noviembrehhr=0;
	$Diciembrehhr=0;
	$hhprs=0;

		$sql30="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Enero' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
		$res = $con->query($sql30);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Enerohhr=$hhprs*$conteo121;
		}
		$sql31="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Febrero' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";			
		$res = $con->query($sql31);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Febrerohhr=$hhprs*$conteo122;
		}
		$sql32="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Marzo' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
		$res = $con->query($sql32);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Marzohhr=$hhprs*$conteo123;
		}
		$sql33="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Abril' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
		$res = $con->query($sql33);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Abrilhhr=$hhprs*$conteo124;
		}
		$sql34="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Mayo' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
		$res = $con->query($sql34);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Mayohhr=$hhprs*$conteo125;
		}
		$sql35="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Junio' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";			
		
		$res = $con->query($sql35);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Juniohhr=$hhprs*$conteo126;
		}
		$sql36="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Julio' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";			
		
		$res = $con->query($sql36);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Juliohhr=$hhprs*$conteo127;
		}
		$sql37="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Agosto' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";			
		
		$res = $con->query($sql37);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Agostohhr=$hhprs*$conteo128;
		}
		$sql38="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Septiembre' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";			
		$res = $con->query($sql38);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Septiembrehhr=$hhprs*$conteo129;
		}
		$sql39="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Octubre' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";			
		
		$res = $con->query($sql39);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Octubrehhr=$hhprs*$conteo130;
		}
		$sql40="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Noviembre' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";			
		
		$res = $con->query($sql40);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Noviembrehhr=$hhprs*$conteo131;
		}
		$sql41="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Diciembre' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";			
		
		$res = $con->query($sql41);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Diciembrehhr=$hhprs*$conteo132;
		}
//********************************************************************************************************************************
		$acumulador1=0;
		if ($mesReporte=="ENERO") 
		{
			$a=0;
			$a=$Enerohhr;
			$acumulador1=$acumulador1+$a;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr)/2);
		}
		if ($mesReporte=="MARZO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr)/3);
		}
		if ($mesReporte=="ABRIL") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr)/4);
		}
		if ($mesReporte=="MAYO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr)/5);
		}
		if ($mesReporte=="JUNIO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr)/6);
		}
		if ($mesReporte=="JULIO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr)/7);
		}
		if ($mesReporte=="AGOSTO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr)/8);
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr)/9);
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr)/10);
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr+$Noviembrehhr)/11);
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr+$Noviembrehhr+$Diciembrehhr)/12);
		}

$acumulador1=substr($acumulador1 , 0, 5);
	?>
<td width="5%"><center><?php echo $acumulador1;?></center></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalizadas -->
	<?php 
	$conteo121=0;
	$conteo122=0;
	$conteo123=0;
	$conteo124=0;
	$conteo125=0;
	$conteo126=0;
	$conteo127=0;
	$conteo128=0;
	$conteo129=0;
	$conteo130=0;
	$conteo131=0;
	$conteo132=0;

	$sql121="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$res=$con->query($sql121);
		$conteo121=$res->num_rows;
	$sql122="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$res=$con->query($sql122);
		$conteo122=$res->num_rows;
	$sql123="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$res=$con->query($sql123);
		$conteo123=$res->num_rows;
	$sql124="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$res=$con->query($sql124);
		$conteo124=$res->num_rows;
	$sql125="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$res=$con->query($sql125);
		$conteo125=$res->num_rows;
	$sql126="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$res=$con->query($sql126);
		$conteo126=$res->num_rows;
	$sql127="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$res=$con->query($sql127);
		$conteo127=$res->num_rows;
	$sql128="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";
		$res=$con->query($sql128);
		$conteo128=$res->num_rows;
	$sql129="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";		
		$res=$con->query($sql129);
		$conteo129=$res->num_rows;
	$sql130="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";		
		$res=$con->query($sql130);
		$conteo130=$res->num_rows;
	$sql131="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";		
		$res=$con->query($sql131);
		$conteo131=$res->num_rows;
	$sql132="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReporte'";		
		$res=$con->query($sql132);
		$conteo132=$res->num_rows;


	$Enerohhr=0;
	$Febrerohhr=0;
	$Marzohhr=0;
	$Abrilhhr=0;
	$Mayohhr=0;
	$Juniohhr=0;
	$Juliohhr=0;
	$Agostohhr=0;
	$Septiembrehhr=0;
	$Octubrehhr=0;
	$Noviembrehhr=0;
	$Diciembrehhr=0;
	$hhprs=0;

		$sql30="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Enero' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql30);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Enerohhr=$hhprs*$conteo121;
		}
		$sql31="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Febrero' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql31);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Febrerohhr=$hhprs*$conteo122;
		}
		$sql32="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Marzo' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql32);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Marzohhr=$hhprs*$conteo123;
		}
		$sql33="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Abril' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql33);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Abrilhhr=$hhprs*$conteo124;
		}
		$sql34="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Mayo' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql34);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Mayohhr=$hhprs*$conteo125;
		}
		$sql35="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Junio' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql35);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Juniohhr=$hhprs*$conteo126;
		}
		$sql36="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Julio' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql36);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Juliohhr=$hhprs*$conteo127;
		}
		$sql37="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Agosto' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql37);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Agostohhr=$hhprs*$conteo128;
		}
		$sql38="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Septiembre' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql38);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Septiembrehhr=$hhprs*$conteo129;
		}
		$sql39="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Octubre' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql39);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Octubrehhr=$hhprs*$conteo130;
		}
		$sql40="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Noviembre' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql40);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Noviembrehhr=$hhprs*$conteo131;
		}
		$sql41="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Diciembre' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReporte;";
			$res = $con->query($sql41);
		while($row5 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Diciembrehhr=$hhprs*$conteo132;
		}
//********************************************************************************************************************************
		$acumulador1=0;
		if ($mesReporte=="ENERO") 
		{
			$a=0;
			$a=$Enerohhr;
			$acumulador1=$acumulador1+$a;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr)/2);
		}
		if ($mesReporte=="MARZO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr)/3);
		}
		if ($mesReporte=="ABRIL") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr)/4);
		}
		if ($mesReporte=="MAYO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr)/5);
		}
		if ($mesReporte=="JUNIO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr)/6);
		}
		if ($mesReporte=="JULIO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr)/7);
		}
		if ($mesReporte=="AGOSTO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr)/8);
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr)/9);
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr)/10);
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr+$Noviembrehhr)/11);
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr+$Noviembrehhr+$Diciembrehhr)/12);
		}

$acumulador1=substr($acumulador1 , 0, 5);
	?>
<td width="5%"><center><?php echo $acumulador1;?></center></td>
<td width="5%"></td>
<td width="5%"></td>
</tr>

<tr>
<td width="30%"><font size=2>Prom. mensual Hrs/Hombre en <?php echo $anioReportea;?>
</font></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<td width="5%"></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalizadas -->
	<?php 
	$conteo121=0;
	$conteo122=0;
	$conteo123=0;
	$conteo124=0;
	$conteo125=0;
	$conteo126=0;
	$conteo127=0;
	$conteo128=0;
	$conteo129=0;
	$conteo130=0;
	$conteo131=0;
	$conteo132=0;

	$sql121="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql121);
		$conteo121 = $res->num_rows;
	$sql122="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql122);
		$conteo122 = $res->num_rows;
	$sql123="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql123);
		$conteo123 = $res->num_rows;
	$sql124="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql124);
		$conteo124 = $res->num_rows;
	$sql125="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql125);
		$conteo125 = $res->num_rows;
	$sql126="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql126);
		$conteo126 = $res->num_rows;
	$sql127="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql127);
		$conteo127 = $res->num_rows;
	$sql128="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql128);
		$conteo128 = $res->num_rows;
	$sql129="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql129);
		$conteo129 = $res->num_rows;
	$sql130="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql130);
		$conteo130 = $res->num_rows;
	$sql131="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql131);
		$conteo131 = $res->num_rows;
	$sql132="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql132);
		$conteo132 = $res->num_rows;


	$Enerohhr=0;
	$Febrerohhr=0;
	$Marzohhr=0;
	$Abrilhhr=0;
	$Mayohhr=0;
	$Juniohhr=0;
	$Juliohhr=0;
	$Agostohhr=0;
	$Septiembrehhr=0;
	$Octubrehhr=0;
	$Noviembrehhr=0;
	$Diciembrehhr=0;
	$hhprs=0;

		$sql30="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Enero' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
		$res = $con->query($sql30);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Enerohhr=$hhprs*$conteo121;
		}
		$sql31="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Febrero' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql31);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Febrerohhr=$hhprs*$conteo122;
		}
		$sql32="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Marzo' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql32);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Marzohhr=$hhprs*$conteo123;
		}
		$sql33="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Abril' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql33);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Abrilhhr=$hhprs*$conteo124;
		}
		$sql34="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Mayo' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql34);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Mayohhr=$hhprs*$conteo125;
		}
		$sql35="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Junio' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql35);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Juniohhr=$hhprs*$conteo126;
		}
		$sql36="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Julio' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql36);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Juliohhr=$hhprs*$conteo127;
		}
		$sql37="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Agosto' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql37);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Agostohhr=$hhprs*$conteo128;
		}
		$sql38="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Septiembre' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql38);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Septiembrehhr=$hhprs*$conteo129;
		}
		$sql39="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Octubre' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql39);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Octubrehhr=$hhprs*$conteo130;
		}
		$sql40="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Noviembre' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql40);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Noviembrehhr=$hhprs*$conteo131;
		}
		$sql41="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Diciembre' and tipotrabajador='Sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql41);
		while($row05 = $res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Diciembrehhr=$hhprs*$conteo132;
		}
//********************************************************************************************************************************
		$acumulador1=0;
		if ($mesReporte=="ENERO") 
		{
			$a=0;
			$a=$Enerohhr;
			$acumulador1=$acumulador1+$a;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr)/2);
		}
		if ($mesReporte=="MARZO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr)/3);
		}
		if ($mesReporte=="ABRIL") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr)/4);
		}
		if ($mesReporte=="MAYO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr)/5);
		}
		if ($mesReporte=="JUNIO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr)/6);
		}
		if ($mesReporte=="JULIO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr)/7);
		}
		if ($mesReporte=="AGOSTO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr)/8);
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr)/9);
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr)/10);
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr+$Noviembrehhr)/11);
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr+$Noviembrehhr+$Diciembrehhr)/12);
		}

$acumulador1=substr($acumulador1 , 0, 5);
	?>
<td width="5%"><center><?php echo $acumulador1;?></center></td>
<!-- Cuenta cuentos cursos han sido planeados con personas no sindicalizadas -->
	<?php 
	$conteo121=0;
	$conteo122=0;
	$conteo123=0;
	$conteo124=0;
	$conteo125=0;
	$conteo126=0;
	$conteo127=0;
	$conteo128=0;
	$conteo129=0;
	$conteo130=0;
	$conteo131=0;
	$conteo132=0;

	$sql121="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql121);
		$conteo121=$res->num_rows;
	$sql122="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql122);
		$conteo122=$res->num_rows;
	$sql123="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql123);
		$conteo123=$res->num_rows;
	$sql124="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql124);
		$conteo124=$res->num_rows;
	$sql125="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql125);
		$conteo125=$res->num_rows;
	$sql126="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql126);
		$conteo126=$res->num_rows;
	$sql127="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Enero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql127);
		$conteo127=$res->num_rows;
	$sql128="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Febrero' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql128);
		$conteo128=$res->num_rows;
	$sql129="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Marzo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql129);
		$conteo129=$res->num_rows;
	$sql130="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Abril' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql130);
		$conteo130=$res->num_rows;
	$sql131="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Mayo' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql131);
		$conteo131=$res->num_rows;
	$sql132="SELECT distinct idtrabajador from curso as c join listas as l on c.nombre=l.nombrecurso join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where l.mes='Junio' and tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and l.anio='$anioReportea'";
		$res = $con->query($sql132);
		$conteo132=$res->num_rows;


	$Enerohhr=0;
	$Febrerohhr=0;
	$Marzohhr=0;
	$Abrilhhr=0;
	$Mayohhr=0;
	$Juniohhr=0;
	$Juliohhr=0;
	$Agostohhr=0;
	$Septiembrehhr=0;
	$Octubrehhr=0;
	$Noviembrehhr=0;
	$Diciembrehhr=0;
	$hhprs=0;

		$sql30="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Enero' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql30);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Enerohhr=$hhprs*$conteo121;
		}
		$sql31="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Febrero' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql31);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Febrerohhr=$hhprs*$conteo122;
		}
		$sql32="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Marzo' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql32);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Marzohhr=$hhprs*$conteo123;
		}
		$sql33="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Abril' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql33);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Abrilhhr=$hhprs*$conteo124;
		}
		$sql34="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Mayo' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql34);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Mayohhr=$hhprs*$conteo125;
		}
		$sql35="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Junio' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql35);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Juniohhr=$hhprs*$conteo126;
		}
		$sql36="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Julio' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql36);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Juliohhr=$hhprs*$conteo127;
		}
		$sql37="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Agosto' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql37);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Agostohhr=$hhprs*$conteo128;
		}
		$sql38="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Septiembre' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql38);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Septiembrehhr=$hhprs*$conteo129;
		}
		$sql39="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Octubre' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql39);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Octubrehhr=$hhprs*$conteo130;
		}
		$sql40="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Noviembre' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql40);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Noviembrehhr=$hhprs*$conteo131;
		}
		$sql41="SELECT duracion from listas as l join trabajadorcurso as tc on l.id=tc.idlista join trabajador as t on tc.idtrabajador=t.id where mes='Diciembre' and tipotrabajador='No sindicalizado' and l.unidad='$unidadRepor' and l.anio=$anioReportea;";
			$res = $con->query($sql41);
		while ($row05=$res->fetch_array())
		{
			$hhprs=$hhprs+$row05['duracion'];
			$Diciembrehhr=$hhprs*$conteo132;
		}
//********************************************************************************************************************************
		$acumulador1=0;
		if ($mesReporte=="ENERO") 
		{
			$a=0;
			$a=$Enerohhr;
			$acumulador1=$acumulador1+$a;
		}
		if ($mesReporte=="FEBRERO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr)/2);
		}
		if ($mesReporte=="MARZO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr)/3);
		}
		if ($mesReporte=="ABRIL") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr)/4);
		}
		if ($mesReporte=="MAYO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr)/5);
		}
		if ($mesReporte=="JUNIO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr)/6);
		}
		if ($mesReporte=="JULIO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr)/7);
		}
		if ($mesReporte=="AGOSTO") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr)/8);
		}
		if ($mesReporte=="SEPTIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr)/9);
		}
		if ($mesReporte=="OCTUBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr)/10);
		}
		if ($mesReporte=="NOVIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr+$Noviembrehhr)/11);
		}
		if ($mesReporte=="DICIEMBRE") 
		{
			$acumulador1=$acumulador1+(($Enerohhr+$Febrerohhr+$Marzohhr+$Abrilhhr+$Mayohhr+$Juniohhr+$Juliohhr+$Agostohhr+$Septiembrehhr+$Octubrehhr+$Noviembrehhr+$Diciembrehhr)/12);
		}

$acumulador1=substr($acumulador1 , 0, 5);
	?>
<td width="5%"><center><?php echo $acumulador1;?></center></td>
</tr>

</table>
	<br>
	<br>
	<br>
<table align="center" border="1">
<tr>
<td>
PLAN DE CAPACITACI&Oacute;N</td>
</tr>
</table>
<br>


<table align="center" border=1>
<tr><td width="400"></td><td align="center" width="200">Sindicalizados</td><td align="center" width="200">Empleados</td></tr>

<tr><td width="400">Cursos a impartir en el a&ntilde;o</td>

<!-- Cuenta cuentos cursos han sido planeados con cursos no sindicalixadas -->
	<?php 
		$sql3="SELECT distinct curso from curso as c join dnc as d on c.nombre=d.curso join trabajador as t on d.nocobro=t.numerocobro where tipotrabajador='Sindicalizado' and planeado='Planeado' and t.unidad='$unidadRepor' and c.anio='$anioReporte'";
		$res = $con->query($sql3);
		$conteo03 = $res->num_rows;
	?>
   <td align="center" width="200"><center><?php echo $conteo03;?></td>

  <!-- Cuenta cuentos cursos han sido planeados con cursos no sindicalixadas -->
	<?php 
		$sql4="SELECT distinct curso from curso as c join dnc as d on c.nombre=d.curso join trabajador as t on d.nocobro=t.numerocobro where tipotrabajador='No sindicalizado' and planeado='Planeado' and t.unidad='$unidadRepor' and c.anio='$anioReporte'";
		$res = $con->query($sql4);
		$conteo04 = $res->num_rows;
	?>
   <td align="center" width="200"><center><?php echo $conteo04;?></td></tr>

<tr><td width="400">Numero de asistencias a capacitacion en el a&ntilde;o</font></td>

 <!-- Cuenta cuentos cursos han sido planeados con cursos no sindicalixadas -->
	<?php 
		$sql5="SELECT distinct nocobro from curso as c join dnc as d on c.nombre=d.curso join trabajador as t on d.nocobro=t.numerocobro where tipotrabajador='Sindicalizado' and planeado='Planeado' and t.unidad='$unidadRepor' and c.anio='$anioReporte'";
		$res = $con->query($sql5);
		$conteo05 = $res->num_rows;
	?>
   <td align="center" width="200"><center><?php echo $conteo05;?></td>

 <!-- Cuenta cuentos cursos han sido planeados con cursos no sindicalixadas -->
	<?php 
		$sql6="SELECT distinct nocobro from curso as c join dnc as d on c.nombre=d.curso join trabajador as t on d.nocobro=t.numerocobro where tipotrabajador='No sindicalizado' and planeado='Planeado' and t.unidad='$unidadRepor' and c.anio='$anioReporte'";
		$res = $con->query($sql6);
		$conteo06 = $res->num_rows;
	?>  
   <td align="center" width="200"><center><?php echo $conteo06;?></td></tr>

<tr><td width="400">Horas hombre de capacitacion en el a&ntilde;o</font></td>

<!-- Cuenta cuentos cursos han sido planeados con cursos no sindicalixadas -->
	<?php 
		$sql6="SELECT HrsPlan from trabajador as t join dnc as d on t.numerocobro=d.nocobro join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso where tipotrabajador='Sindicalizado' and c.unidad='$unidadRepor' and c.anio='$anioReporte';";
		$res = $con->query($sql6);
		$conteo07=0;
		while ($row01=$res->fetch_array()) 
		{
			$conteo07=$conteo07+$row01['HrsPlan'];
		}
	?>  
  <td align="center" width="200"><?php echo $conteo07;?></td>

<!-- Cuenta cuentos cursos han sido planeados con cursos no sindicalixadas -->
	<?php 
		$sql7="SELECT HrsPlan from trabajador as t join dnc as d on t.numerocobro=d.nocobro join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso where tipotrabajador='No sindicalizado' and c.unidad='$unidadRepor' and c.anio='$anioReporte';";
		$conteo08=0;
		$res = $con->query($sql7);
		while ($row02=$res->fetch_array()) 
		{
			$conteo08=$conteo08+$row02['HrsPlan'];
		}
	?> 
 
   <td align="center" width="200"><?php echo $conteo08;?></td></tr>
</table>

</form>
</center></body></html>