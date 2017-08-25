<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon" />
	<title>DNC</title>
	<link rel="stylesheet" href="">
</head>
<body>
<?php
	include("../conf/conf.php");
	$unidad=$_GET['unidad'];
	$dep=$_GET['dep'];
	$anio=$_GET['anio'];
	$query="SELECT * from unidad where nombre='$unidad'";
	$res2=$db->query($query);
	while ($fila=$res2->fetch_array()) {
		$logo=$fila['logo'];
	}
	$query="SELECT * from curso where unidad='$unidad' and departamento='$dep' and anio='$anio'";
	$res=$db->query($query);
?>
	<div>
		<table width="100%" border="0" cellspacing="0">
			<tr>
				<td width="25%"><?php echo "<img src='../photos/".$logo."'>";?></td>
      			<td colspan="3" align="center" valign="middle"><h2><center>
		  			<p>PROGRAMA GENERAL DE CAPACITACI&Oacute;N</p>
					</center></h2>
				</td>
			</tr>
			<tr>
				<td align="right">DEPARTAMENTO:</td>
			      <td width="25%"><?php echo $dep; ?></td>
			      <td width="25%" align="right">A&Ntilde;O:</td>
			      <td width="25%"><?php echo $anio;?></td>
			</tr>
			<tr>
	      		<td align="right">&Aacute;REA:</td>
	      		<td><label for="textfield"></label>
	      		<input type="text" name="textfield" id="textfield"  style="border:0px;" size="50" /></td>
	      		<td>&nbsp;</td>
	      		<td>&nbsp;</td>
	    	</tr>
	    	<tr>
		      	<td align="right">FECHA DE ELABORACI&Oacute;N:</td>
		      	<td><label for="textfield2"></label>
		      	<input type="text" name="textfield2" id="textfield2" style="border:0px;" size="50"   /></td>
		      	<td>&nbsp;</td>
		      	<td>&nbsp;</td>
	    	</tr>
	  	</table>
	  	<table id="tablavacia" border="1" cellspacing="0" width="100%">
			<tr>
				<td id="encabezadotablarubro">Nombre</td>
				<td id="encabezadotablarubro">Planeado</td>
				<td id="encabezadotablarubro">Enero</td>
				<td id="encabezadotablarubro">Febrero</td>
				<td id="encabezadotablarubro">Marzo</td>
				<td id="encabezadotablarubro">Abril</td>
				<td id="encabezadotablarubro">Mayo</td>
				<td id="encabezadotablarubro">Junio</td>
				<td id="encabezadotablarubro">Julio</td>
				<td id="encabezadotablarubro">Agosto</td>
				<td id="encabezadotablarubro">Septiembre</td>
				<td id="encabezadotablarubro">Octubre</td>
				<td id="encabezadotablarubro">Noviembre</td>
				<td id="encabezadotablarubro">Diciembre</td>
				<td id="encabezadotablarubro">No. Hrs.</td>			
				<td id="encabezadotablarubro">HH plan.</td>
				<td id="encabezadotablarubro">No. Pers.</td>
				<td id="encabezadotablarubro">Instructor</td>
			</tr>
			<?php
				while ($fila=$res->fetch_array()) {
					echo "<tr>";
					echo "<td rowspan='2'>".$fila['nombre']."</td>";
					$Curso=$fila['nombre'];
					$idCurso=$fila['id'];
					$Horas="SELECT * FROM meses where idcurso=$idCurso";
					$hora=$db->query($Horas);
					while ($row=$hora->fetch_array()) {
						$HEnero=$row['Enerohsp'];
						$HFebrero=$row['Febrerohsp'];
						$HMarzo=$row['Marzohsp'];
						$HAbril=$row['Abrilhsp'];
						$HMayo=$row['Mayohsp'];
						$HJunio=$row['Juniohsp'];
						$HJulio=$row['Juliohsp'];
						$HAgosto=$row['Agostohsp'];
						$HSeptiembre=$row['Septiembrehsp'];
						$HOctubre=$row['Octubrehsp'];
						$HNoviembre=$row['Noviembrehsp'];
						$HDiciembre=$row['Diciembrehsp'];
					}
					echo "<td>Asistentes</td>";
					$Enero="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Enero' and d.unidad='$unidad'";
					$conteo=$db->query($Enero);
					$AEnero=$conteo->num_rows;
					echo "<td>".$AEnero."</td>";
					$Febrero="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Febrero' and d.unidad='$unidad'";
					$conteo=$db->query($Febrero);
					$AFebrero=$conteo->num_rows;
					echo "<td>".$AFebrero."</td>";
					$Marzo="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Marzo' and d.unidad='$unidad'";
					$conteo=$db->query($Marzo);
					$AMarzo=$conteo->num_rows;
					echo "<td>".$AMarzo."</td>";
					$Abril="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Abril' and d.unidad='$unidad'";
					$conteo=$db->query($Abril);
					$AAbril=$conteo->num_rows;
					echo "<td>".$AAbril."</td>";
					$Mayo="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Mayo' and d.unidad='$unidad'";
					$conteo=$db->query($Mayo);
					$AMayo=$conteo->num_rows;
					echo "<td>".$AMayo."</td>";
					$Junio="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Junio' and d.unidad='$unidad'";
					$conteo=$db->query($Junio);
					$AJunio=$conteo->num_rows;
					echo "<td>".$AJunio."</td>";
					$Julio="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Julio' and d.unidad='$unidad'";
					$conteo=$db->query($Julio);
					$AJulio=$conteo->num_rows;
					echo "<td>".$AJulio."</td>";
					$Agosto="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Agosto' and d.unidad='$unidad'";
					$conteo=$db->query($Agosto);
					$AAgosto=$conteo->num_rows;
					echo "<td>".$AAgosto."</td>";
					$Septiembre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Septiembre' and d.unidad='$unidad'";
					$conteo=$db->query($Septiembre);
					$ASeptiembre=$conteo->num_rows;
					echo "<td>".$ASeptiembre."</td>";
					$Octubre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Octubre' and d.unidad='$unidad'";
					$conteo=$db->query($Octubre);
					$AOctubre=$conteo->num_rows;
					echo "<td>".$AOctubre."</td>";
					$Noviembre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Noviembre' and d.unidad='$unidad'";
					$conteo=$db->query($Noviembre);
					$ANoviembre=$conteo->num_rows;
					echo "<td>".$ANoviembre."</td>";
					$Diciembre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Diciembre' and d.unidad='$unidad'";
					$conteo=$db->query($Diciembre);
					$ADiciembre=$conteo->num_rows;
					echo "<td>".$ADiciembre."</td>";
					$Total="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and d.unidad='$unidad'";
					$conteo=$db->query($Total);
					$Total=$conteo->num_rows;
					$HorasTotales=$HEnero+$HFebrero+$HMarzo+$HAbril+$HMayo+$HJunio+$HJulio+$HAgosto+$HSeptiembre+$HOctubre+$HNoviembre+$HDiciembre;
					echo "<td rowspan='2'>".$HorasTotales."</td>";
					$HrHm=$HorasTotales*$Total;
					echo "<td rowspan='2'>".$HrHm."</td>";
					echo "<td rowspan='2'>".$Total."</td>";
					echo "<td rowspan='2'>".$fila['instructor']."</td>";

					echo "</tr>";
					echo "<tr>";
					echo "<td>Horas</td>";
					echo "<td>".$HEnero."</td>";
					echo "<td>".$HFebrero."</td>";
					echo "<td>".$HMarzo."</td>";
					echo "<td>".$HAbril."</td>";
					echo "<td>".$HMayo."</td>";
					echo "<td>".$HJunio."</td>";
					echo "<td>".$HJulio."</td>";
					echo "<td>".$HAgosto."</td>";
					echo "<td>".$HSeptiembre."</td>";
					echo "<td>".$HOctubre."</td>";
					echo "<td>".$HNoviembre."</td>";
					echo "<td>".$HDiciembre."</td>";
					echo "</tr>";
					$idCurso=$idCurso;
					$HorasPlaneadas=$HorasTotales;
					$HorasHombre=$HrHm;
					$Asistentes=$Total;
					$query = "UPDATE meses set Eneroap=$AEnero,Febreroap=$AFebrero,Marzoap=$AMarzo,Abrilap=$AAbril,Mayoasp=$AMayo,Junioasp=$AJunio,
					Julioasp=$AJulio,Agostoasp=$AAgosto,Septiembreasp=$ASeptiembre,Octubreasp=$AOctubre,Noviembreasp=$ANoviembre,Diciembreasp=$ADiciembre,
					AsistPlan=$Total
					where idcurso=$idCurso";
					if ($res=$db->query($query))
					{
						echo "";
					}
					else
					{
						echo "-";
					}
				}
			 ?>
		</table>
	</div>
<table width="100%" border="0" cellspacing="5">
  <tr>
    <td align="center"><p>ELABORADO POR:</p>
    <p>
      <input type="text" name="textfield3" id="textfield3" style="text-align:center; border:0px;border-bottom:1px solid #000;" size="50" placeholder="Nombre completo"/>
    </p></td>
    <td>&nbsp;</td>
    <td align="center"> <p>AUTORIZADO POR:</p>
    <p>
      <input type="text" name="textfield4" id="textfield4"  style="border:0px; border-bottom:1px solid #000; text-align:center;" size="50" placeholder="Nombre completo"/>
    </p></td>
  </tr>
   <tr>
    <td align="center"><input type="text" name="textfield5" id="textfield5"  style="border:0px;text-align:center;" size="50"  placeholder="Cargo"/></td>
    <td>&nbsp;</td>
    <td align="center"><input type="text" name="textfield6" id="textfield6"  style="border:0px; text-align:center;" size="50"  placeholder="Cargo"/></td>
  </tr>
</table>
<hr>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php
	include("../conf/conf.php");
	$unidad=$_GET['unidad'];
	$dep=$_GET['dep'];
	$anio=$_GET['anio'];
	$query="SELECT * from unidad where nombre='$unidad'";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) {
		$logo=$fila['logo'];
	}
	$query="SELECT * from curso where unidad='$unidad' and departamento='$dep' and anio='$anio'";
	$res=$db->query($query);
?>
<div>
		<table width="100%" border="0" cellspacing="0">
			<tr>
				<td width="25%"><?php echo "<img src='../photos/".$logo."'>";?></td>
      			<td colspan="3" align="center" valign="middle"><h2><center>
		  			<p>PROGRAMA GENERAL DE CAPACITACI&Oacute;N</p>
					</center></h2>
				</td>
			</tr>
			<tr>
				<td align="right">DEPARTAMENTO:</td>
			      <td width="25%"><?php echo $dep; ?></td>
			      <td width="25%" align="right">A&Ntilde;O:</td>
			      <td width="25%"><?php echo $anio;?></td>
			</tr>
			<tr>
	      		<td align="right">&Aacute;REA:</td>
	      		<td><label for="textfield"></label>
	      		<input type="text" name="textfield" id="textfield"  style="border:0px;" size="50" /></td>
	      		<td align="right">Sindicalizado</td>
	      		<td>&nbsp;</td>
	    	</tr>
	    	<tr>
		      	<td align="right">FECHA DE ELABORACI&Oacute;N:</td>
		      	<td><label for="textfield2"></label>
		      	<input type="text" name="textfield2" id="textfield2" style="border:0px;" size="50"   /></td>
		      	<td>&nbsp;</td>
		      	<td>&nbsp;</td>
	    	</tr>
	  	</table>
	  	<table id="tablavacia" border="1" cellspacing="0" width="100%">
			<tr>
				<td id="encabezadotablarubro">Nombre</td>
				<td id="encabezadotablarubro">Planeado</td>
				<td id="encabezadotablarubro">Enero</td>
				<td id="encabezadotablarubro">Febrero</td>
				<td id="encabezadotablarubro">Marzo</td>
				<td id="encabezadotablarubro">Abril</td>
				<td id="encabezadotablarubro">Mayo</td>
				<td id="encabezadotablarubro">Junio</td>
				<td id="encabezadotablarubro">Julio</td>
				<td id="encabezadotablarubro">Agosto</td>
				<td id="encabezadotablarubro">Septiembre</td>
				<td id="encabezadotablarubro">Octubre</td>
				<td id="encabezadotablarubro">Noviembre</td>
				<td id="encabezadotablarubro">Diciembre</td>
				<td id="encabezadotablarubro">No. Hrs.</td>			
				<td id="encabezadotablarubro">HH plan.</td>
				<td id="encabezadotablarubro">No. Pers.</td>
				<td id="encabezadotablarubro">Instructor</td>
			</tr>
			<?php 
				while ($fila=$res->fetch_array()) {
					echo "<tr>";
					echo "<td rowspan='2'>".$fila['nombre']."</td>";
					$Curso=$fila['nombre'];
					$idCurso=$fila['id'];
					$Horas="SELECT * FROM meses where idcurso=$idCurso";
					$hora=$db->query($Horas);
					while ($row=$hora->fetch_array()) {
						$HEnero=$row['Enerohsp'];
						$HFebrero=$row['Febrerohsp'];
						$HMarzo=$row['Marzohsp'];
						$HAbril=$row['Abrilhsp'];
						$HMayo=$row['Mayohsp'];
						$HJunio=$row['Juniohsp'];
						$HJulio=$row['Juliohsp'];
						$HAgosto=$row['Agostohsp'];
						$HSeptiembre=$row['Septiembrehsp'];
						$HOctubre=$row['Octubrehsp'];
						$HNoviembre=$row['Noviembrehsp'];
						$HDiciembre=$row['Diciembrehsp'];
					}
					echo "<td>Asistentes</td>";
					$Enero="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Enero' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Enero);
					$AEnero=$conteo->num_rows;
					echo "<td>".$AEnero."</td>";
					if ($AEnero == 0) {
						$HEnero=0;
					}
					$Febrero="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Febrero' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Febrero);
					$AFebrero=$conteo->num_rows;
					echo "<td>".$AFebrero."</td>";
					if ($AFebrero == 0) {
						$HFebrero=0;
					}
					$Marzo="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Marzo' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Marzo);
					$AMarzo=$conteo->num_rows;
					echo "<td>".$AMarzo."</td>";
					if ($AMarzo == 0) {
						$HMarzo=0;
					}
					$Abril="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Abril' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Abril);
					$AAbril=$conteo->num_rows;
					echo "<td>".$AAbril."</td>";
					if ($AAbril == 0) {
						$HAbril=0;
					}
					$Mayo="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Mayo' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Mayo);
					$AMayo=$conteo->num_rows;
					echo "<td>".$AMayo."</td>";
					if ($AMayo == 0) {
						$HMayo=0;
					}
					$Junio="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Junio' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Junio);
					$AJunio=$conteo->num_rows;
					echo "<td>".$AJunio."</td>";
					if ($AJunio == 0) {
						$HJunio=0;
					}
					$Julio="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Julio' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Julio);
					$AJulio=$conteo->num_rows;
					echo "<td>".$AJulio."</td>";
					if ($AJulio == 0) {
						$HJulio=0;
					}
					$Agosto="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Agosto' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Agosto);
					$AAgosto=$conteo->num_rows;
					echo "<td>".$AAgosto."</td>";
					if ($AAgosto == 0) {
						$HAgosto=0;
					}
					$Septiembre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Septiembre' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Septiembre);
					$ASeptiembre=$conteo->num_rows;
					echo "<td>".$ASeptiembre."</td>";
					if ($ASeptiembre == 0) {
						$HSeptiembre=0;
					}
					$Octubre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Octubre' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Octubre);
					$AOctubre=$conteo->num_rows;
					echo "<td>".$AOctubre."</td>";
					if ($AOctubre == 0) {
						$HOctubre=0;
					}
					$Noviembre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Noviembre' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Noviembre);
					$ANoviembre=$conteo->num_rows;
					echo "<td>".$ANoviembre."</td>";
					if ($ANoviembre == 0) {
						$HNoviembre=0;
					}
					$Diciembre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Diciembre' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Diciembre);
					$ADiciembre=$conteo->num_rows;
					echo "<td>".$ADiciembre."</td>";
					if ($ADiciembre == 0) {
						$HDiciembre=0;
					}
					$Total="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and d.unidad='$unidad' and tipotrabajador='Sindicalizado'";
					$conteo=$db->query($Total);
					$Total=$conteo->num_rows;
					$HorasTotales=$HEnero+$HFebrero+$HMarzo+$HAbril+$HMayo+$HJunio+$HJulio+$HAgosto+$HSeptiembre+$HOctubre+$HNoviembre+$HDiciembre;
					echo "<td rowspan='2'>".$HorasTotales."</td>";
					$HrHm=$HorasTotales*$Total;
					echo "<td rowspan='2'>".$HrHm."</td>";
					echo "<td rowspan='2'>".$Total."</td>";
					echo "<td rowspan='2'>".$fila['instructor']."</td>";

					echo "</tr>";
					echo "<tr>";
					echo "<td>Horas</td>";
					echo "<td>".$HEnero."</td>";
					echo "<td>".$HFebrero."</td>";
					echo "<td>".$HMarzo."</td>";
					echo "<td>".$HAbril."</td>";
					echo "<td>".$HMayo."</td>";
					echo "<td>".$HJunio."</td>";
					echo "<td>".$HJulio."</td>";
					echo "<td>".$HAgosto."</td>";
					echo "<td>".$HSeptiembre."</td>";
					echo "<td>".$HOctubre."</td>";
					echo "<td>".$HNoviembre."</td>";
					echo "<td>".$HDiciembre."</td>";
					echo "</tr>";
				}
			 ?>
		</table>
</div>
<table width="100%" border="0" cellspacing="5">
  <tr>
    <td align="center"><p>ELABORADO POR:</p>
    <p>
      <input type="text" name="textfield3" id="textfield3" style="text-align:center; border:0px;border-bottom:1px solid #000;" size="50" placeholder="Nombre completo"/>
    </p></td>
    <td>&nbsp;</td>
    <td align="center"> <p>AUTORIZADO POR:</p>
    <p>
      <input type="text" name="textfield4" id="textfield4"  style="border:0px; border-bottom:1px solid #000; text-align:center;" size="50" placeholder="Nombre completo"/>
    </p></td>
  </tr>
   <tr>
    <td align="center"><input type="text" name="textfield5" id="textfield5"  style="border:0px;text-align:center;" size="50"  placeholder="Cargo"/></td>
    <td>&nbsp;</td>
    <td align="center"><input type="text" name="textfield6" id="textfield6"  style="border:0px; text-align:center;" size="50"  placeholder="Cargo"/></td>
  </tr>
</table>
<hr>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php
	include("../conf/conf.php");
	$unidad=$_GET['unidad'];
	$dep=$_GET['dep'];
	$anio=$_GET['anio'];
	$query="SELECT * from unidad where nombre='$unidad'";
	$res=$db->query($query);
	while ($fila=$res->fetch_array()) {
		$logo=$fila['logo'];
	}
	$query="SELECT * from curso where unidad='$unidad' and departamento='$dep' and anio='$anio'";
	$res=$db->query($query);
?>
<div>
		<table width="100%" border="0" cellspacing="0">
			<tr>
				<td width="25%"><?php echo "<img src='../photos/".$logo."'>";?></td>
      			<td colspan="3" align="center" valign="middle"><h2><center>
		  			<p>PROGRAMA GENERAL DE CAPACITACI&Oacute;N</p>
					</center></h2>
				</td>
			</tr>
			<tr>
				<td align="right">DEPARTAMENTO:</td>
			      <td width="25%"><?php echo $dep; ?></td>
			      <td width="25%" align="right">A&Ntilde;O:</td>
			      <td width="25%"><?php echo $anio;?></td>
			</tr>
			<tr>
	      		<td align="right">&Aacute;REA:</td>
	      		<td><label for="textfield"></label>
	      		<input type="text" name="textfield" id="textfield"  style="border:0px;" size="50" /></td>
	      		<td align="right">No sindicalizado</td>
	      		<td>&nbsp;</td>
	    	</tr>
	    	<tr>
		      	<td align="right">FECHA DE ELABORACI&Oacute;N:</td>
		      	<td><label for="textfield2"></label>
		      	<input type="text" name="textfield2" id="textfield2" style="border:0px;" size="50"   /></td>
		      	<td>&nbsp;</td>
		      	<td>&nbsp;</td>
	    	</tr>
	  	</table>
	  	<table id="tablavacia" border="1" cellspacing="0" width="100%">
			<tr>
				<td id="encabezadotablarubro">Nombre</td>
				<td id="encabezadotablarubro">Planeado</td>
				<td id="encabezadotablarubro">Enero</td>
				<td id="encabezadotablarubro">Febrero</td>
				<td id="encabezadotablarubro">Marzo</td>
				<td id="encabezadotablarubro">Abril</td>
				<td id="encabezadotablarubro">Mayo</td>
				<td id="encabezadotablarubro">Junio</td>
				<td id="encabezadotablarubro">Julio</td>
				<td id="encabezadotablarubro">Agosto</td>
				<td id="encabezadotablarubro">Septiembre</td>
				<td id="encabezadotablarubro">Octubre</td>
				<td id="encabezadotablarubro">Noviembre</td>
				<td id="encabezadotablarubro">Diciembre</td>
				<td id="encabezadotablarubro">No. Hrs.</td>			
				<td id="encabezadotablarubro">HH plan.</td>
				<td id="encabezadotablarubro">No. Pers.</td>
				<td id="encabezadotablarubro">Instructor</td>
			</tr>
			<?php 
				while ($fila=$res->fetch_array()) {
					echo "<tr>";
					echo "<td rowspan='2'>".$fila['nombre']."</td>";
					$Curso=$fila['nombre'];
					$idCurso=$fila['id'];
					$Horas="SELECT * FROM meses where idcurso=$idCurso";
					$hora=$db->query($Horas);
					while ($row=$hora->fetch_array()) {
						$HEnero=$row['Enerohsp'];
						$HFebrero=$row['Febrerohsp'];
						$HMarzo=$row['Marzohsp'];
						$HAbril=$row['Abrilhsp'];
						$HMayo=$row['Mayohsp'];
						$HJunio=$row['Juniohsp'];
						$HJulio=$row['Juliohsp'];
						$HAgosto=$row['Agostohsp'];
						$HSeptiembre=$row['Septiembrehsp'];
						$HOctubre=$row['Octubrehsp'];
						$HNoviembre=$row['Noviembrehsp'];
						$HDiciembre=$row['Diciembrehsp'];
					}
					echo "<td>Asistentes</td>";
					$Enero="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Enero' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Enero);
					$AEnero=$conteo->num_rows;
					echo "<td>".$AEnero."</td>";
					if ($AEnero == 0) {
						$HEnero=0;
					}
					$Febrero="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Febrero' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Febrero);
					$AFebrero=$conteo->num_rows;
					echo "<td>".$AFebrero."</td>";
					if ($AFebrero == 0) {
						$HFebrero=0;
					}
					$Marzo="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Marzo' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Marzo);
					$AMarzo=$conteo->num_rows;
					echo "<td>".$AMarzo."</td>";
					if ($AMarzo == 0) {
						$HMarzo=0;
					}
					$Abril="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Abril' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Abril);
					$AAbril=$conteo->num_rows;
					echo "<td>".$AAbril."</td>";
					if ($AAbril == 0) {
						$HAbril=0;
					}
					$Mayo="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Mayo' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Mayo);
					$AMayo=$conteo->num_rows;
					echo "<td>".$AMayo."</td>";
					if ($AMayo == 0) {
						$HMayo=0;
					}
					$Junio="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Junio' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Junio);
					$AJunio=$conteo->num_rows;
					echo "<td>".$AJunio."</td>";
					if ($AJunio == 0) {
						$HJunio=0;
					}
					$Julio="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Julio' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Julio);
					$AJulio=$conteo->num_rows;
					echo "<td>".$AJulio."</td>";
					if ($AJulio == 0) {
						$HJulio=0;
					}
					$Agosto="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Agosto' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Agosto);
					$AAgosto=$conteo->num_rows;
					echo "<td>".$AAgosto."</td>";
					if ($AAgosto == 0) {
						$HAgosto=0;
					}
					$Septiembre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Septiembre' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Septiembre);
					$ASeptiembre=$conteo->num_rows;
					echo "<td>".$ASeptiembre."</td>";
					if ($ASeptiembre == 0) {
						$HSeptiembre=0;
					}
					$Octubre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Octubre' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Octubre);
					$AOctubre=$conteo->num_rows;
					echo "<td>".$AOctubre."</td>";
					if ($AOctubre == 0) {
						$HOctubre=0;
					}
					$Noviembre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Noviembre' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Noviembre);
					$ANoviembre=$conteo->num_rows;
					echo "<td>".$ANoviembre."</td>";
					if ($ANoviembre == 0) {
						$HNoviembre=0;
					}
					$Diciembre="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and mes='Diciembre' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Diciembre);
					$ADiciembre=$conteo->num_rows;
					echo "<td>".$ADiciembre."</td>";
					if ($ADiciembre == 0) {
						$HDiciembre=0;
					}
					$Total="SELECT distinct nocobro from dnc as d join curso as c on d.curso=c.nombre join meses as m on c.id=m.idcurso join trabajador as t on d.nocobro=t.numerocobro 
					where t.unidad='$unidad' and d.Departamento='$dep' and d.anio='$anio' and d.curso='$Curso' and d.status='Si' and d.unidad='$unidad' and tipotrabajador='No sindicalizado'";
					$conteo=$db->query($Total);
					$Total=$conteo->num_rows;
					$HorasTotales=$HEnero+$HFebrero+$HMarzo+$HAbril+$HMayo+$HJunio+$HJulio+$HAgosto+$HSeptiembre+$HOctubre+$HNoviembre+$HDiciembre;
					echo "<td rowspan='2'>".$HorasTotales."</td>";
					$HrHm=$HorasTotales*$Total;
					echo "<td rowspan='2'>".$HrHm."</td>";
					echo "<td rowspan='2'>".$Total."</td>";
					echo "<td rowspan='2'>".$fila['instructor']."</td>";

					echo "</tr>";
					echo "<tr>";
					echo "<td>Horas</td>";
					echo "<td>".$HEnero."</td>";
					echo "<td>".$HFebrero."</td>";
					echo "<td>".$HMarzo."</td>";
					echo "<td>".$HAbril."</td>";
					echo "<td>".$HMayo."</td>";
					echo "<td>".$HJunio."</td>";
					echo "<td>".$HJulio."</td>";
					echo "<td>".$HAgosto."</td>";
					echo "<td>".$HSeptiembre."</td>";
					echo "<td>".$HOctubre."</td>";
					echo "<td>".$HNoviembre."</td>";
					echo "<td>".$HDiciembre."</td>";
					echo "</tr>";
				}
			 ?>
		</table>
</div>
<table width="100%" border="0" cellspacing="5">
  <tr>
    <td align="center"><p>ELABORADO POR:</p>
    <p>
      <input type="text" name="textfield3" id="textfield3" style="text-align:center; border:0px;border-bottom:1px solid #000;" size="50" placeholder="Nombre completo"/>
    </p></td>
    <td>&nbsp;</td>
    <td align="center"> <p>AUTORIZADO POR:</p>
    <p>
      <input type="text" name="textfield4" id="textfield4"  style="border:0px; border-bottom:1px solid #000; text-align:center;" size="50" placeholder="Nombre completo"/>
    </p></td>
  </tr>
   <tr>
    <td align="center"><input type="text" name="textfield5" id="textfield5"  style="border:0px;text-align:center;" size="50"  placeholder="Cargo"/></td>
    <td>&nbsp;</td>
    <td align="center"><input type="text" name="textfield6" id="textfield6"  style="border:0px; text-align:center;" size="50"  placeholder="Cargo"/></td>
  </tr>
</table>
<hr>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
</body>
</html>
