<?php
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$dep=$_POST['dep'];
	$anio=$_POST['anio'];

	$query="SELECT * FROM curso WHERE unidad='$unidad' and departamento='$dep' and anio='$anio'";
	$res=$db->query($query);
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
<hr>
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
			<td class="Cabeza">Total</td>
			<td class="Cabeza">HH</td>
		</tr>
		<?php
	$query = "SELECT meses.id,nombre,Enerohsp,Febrerohsp,Marzohsp,Abrilhsp,Mayohsp,Juniohsp,Juliohsp,Agostohsp,Septiembrehsp,Octubrehsp,Noviembrehsp,Diciembrehsp,
	HrsPlan,Eneroap,Febreroap,Marzoap,Abrilap,Mayoasp,Junioasp,Julioasp,Agostoasp,Septiembreasp,Octubreasp,Noviembreasp,Diciembreasp,AsistPlan,
	Enerohnp,Febrerohnp,Marzohnp,Abrilhnp,Mayohnp,Juniohnp,Juliohnp,Agostohnp,Septiembrehnp,Octubrehnp,Noviembrehnp,Diciembrehnp,HrsNPlan,
	Eneroanp,Febreroanp,Marzoanp,Abrilanp,Mayoanp,Junioanp,Julioanp,Agostoanp,Septiembreanp,Octubreanp,Noviembreanp,Diciembreanp,AsistNpla,
	Enerohr,Febrerohr,Marzohr,Abrilhr,Mayohr,Juniohr,Juliohr,Agostohr,Septiembrehr,Octubrehr,Noviembrehr,Diciembrehr,HrsReales,
	Eneroar,Febreroar,Marzoar,Abrilar,Mayoar,Junioar,Julioar,Agostoar,Septiembrear,Octubrear,Noviembrear,Diciembrear,AsistReal
	FROM meses JOIN curso ON meses.idcurso=curso.id 
	WHERE departamento='$dep'
	and unidad='$unidad' 
	and planeado='Planeado' 
	and anio='$anio'";
	$result=$con->query($query);
	while($row=$result->fetch_array()) {
		$idmes=$row['id'];
		echo "<tr>";
		echo "<td rowspan='6'>".$row['nombre']."</td>";
		$NOMBREDELCURSO=$row['nombre'];
		echo "<td>Horas planeadas</td>";
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
		echo "<td>Asistentes planeados</td>";
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

		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Enero' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalE=0;
			$AsistentesEnero=0;
			while ($fila=$res->fetch_array()) {
				$totalE=$totalE+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Enero' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistentesEnero=$res->num_rows;
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Febrero' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalF=0;
			while ($fila=$res->fetch_array()) {
				$totalF=$totalF+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Febrero' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistentesFebrero=$res->num_rows;
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Marzo' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalMZ=0;
			while ($fila=$res->fetch_array()) {
				$totalMZ=$totalMZ+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Marzo' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistentesMarzo=$res->num_rows;
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Abril' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalAB=0;
			while ($fila=$res->fetch_array()) {
				$totalAB=$totalAB+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Abril' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistentesAbril=$res->num_rows;
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Mayo' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalMY=0;
			while ($fila=$res->fetch_array()) {
				$totalMY=$totalMY+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Mayo' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistentesMayo=$res->num_rows;
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Junio' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalJN=0;
			while ($fila=$res->fetch_array()) {
				$totalJN=$totalJN+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Junio' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistentesJunio=$res->num_rows;
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Julio' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalJL=0;
			while ($fila=$res->fetch_array()) {
				$totalJL=$totalJL+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Julio' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistentesJulio=$res->num_rows;
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Agosto' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalAG=0;
			while ($fila=$res->fetch_array()) {
				$totalAG=$totalAG+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Agosto' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistentesAgosto=$res->num_rows;
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Septiembre' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalSP=0;
			while ($fila=$res->fetch_array()) {
				$totalSP=$totalSP+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Septiembre' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistenteSeptiembre=$res->num_rows;
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Octubre' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalOC=0;
			while ($fila=$res->fetch_array()) {
				$totalOC=$totalOC+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Octubre' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistenteOctubre=$res->num_rows;
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Noviembre' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalNV=0;
			while ($fila=$res->fetch_array()) {
				$totalNV=$totalNV+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Noviembre' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistenteNoviembre=$res->num_rows;
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
			$HorasReales="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre join 
			meses as m on c.id=m.idcurso where l.mes='Diciembre' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($HorasReales);
			$totalDC=0;
			while ($fila=$res->fetch_array()) {
				$totalDC=$totalDC+$fila['duracion'];
			}
			$AsistReales="SELECT duracion,tc.idlista,tc.idtrabajador 
			from listas as l join trabajadorcurso as tc on l.id=tc.idlista join curso as c on l.nombrecurso=c.nombre join meses as m on c.id=m.idcurso 
			where l.mes='Diciembre' and nombrecurso='$NOMBREDELCURSO'";
			$res=$db->query($AsistReales);
			$AsistenteDiciembre=$res->num_rows;

		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */

		$Enerohnp=$row['Enerohnp'];
		$Febrerohnp=$row['Febrerohnp'];
		$Marzohsp=$row['Marzohnp'];
		$Abrilhsp=$row['Abrilhnp'];
		$Mayohsp=$row['Mayohnp'];
		$Juniohnp=$row['Juniohnp'];
		$Juliohsp=$row['Juliohnp'];
		$Agostohsp=$row['Agostohnp'];
		$Septiembrehsp=$row['Septiembrehnp'];
		$Octubrehsp=$row['Octubrehnp'];
		$Noviembrehsp=$row['Noviembrehnp'];
		$Diciembrehsp=$row['Diciembrehnp'];
		$Enerohnp=$totalE-$Enerohnp;
		if ($Enerohnp < 0) {
			$Enerohnp=0;
		}
		$Febrerohnp=$totalF-$Febrerohnp;
		if ($Febrerohnp < 0) {
			$Febrerohnp=0;
		}
		$Marzonp=$totalMZ-$Marzohsp;
		if ($Marzonp < 0) {
			$Marzonp=0;
		}
		$Abrilnp=$totalAB-$Abrilhsp;
		if ($Abrilnp < 0) {
			$Abrilnp=0;
		}
		$Mayonp=$totalMY-$Mayohsp;
		if ($Mayonp < 0) {
			$Mayonp=0;
		}
		$Juniohnp=$totalJN-$Juniohnp;
		if ($Juniohnp < 0) {
			$Juniohnp=0;
		}
		$Julionp=$totalJL-$Juliohsp;
		if ($Julionp < 0) {
			$Julionp=0;
		}
		$Agostonp=$totalAG-$Agostohsp;
		if ($Agostonp < 0) {
			$Agostonp=0;
		}
		$Septiembrenp=$totalSP-$Septiembrehsp;
		if ($Septiembrenp < 0) {
			$Septiembrenp=0;
		}
		$Octubrenp=$totalOC-$Octubrehsp;
		if ($Octubrenp < 0) {
			$Octubrenp=0;
		}
		$Noviembrenp=$totalNV-$Noviembrehsp;
		if ($Noviembrenp < 0) {
			$Noviembrenp=0;
		}
		$Diciembrenp=$totalDC-$Diciembrehsp;
		if ($Diciembrenp < 0) {
			$Diciembrenp=0;
		}
		

			$Eneroanp=$row['Eneroanp'];
			$Febreroanp=$row['Febreroanp'];
			$Marzoanp=$row['Marzoanp'];
			$Abrilanp=$row['Abrilanp'];
			$Mayoanp=$row['Mayoanp'];
			$Junioanp=$row['Junioanp'];
			$Julioanp=$row['Julioanp'];
			$Agostoanp=$row['Agostoanp'];
			$Septiembreanp=$row['Septiembreanp'];
			$Octubreanp=$row['Octubreanp'];
			$Noviembreanp=$row['Noviembreanp'];
			$Diciembreanp=$row['Diciembreanp'];

			$Eneroanp=$AsistentesEnero-$Eneroanp;
			if ($Eneroanp < 0) {
				$Eneroanp=0;
			}
			$Febreroanp=$AsistentesFebrero-$Febreroanp;
			if ($Febreroanp < 0) {
				$Febreroanp=0;
			}
			$Marzoanp=$AsistentesMarzo-$Marzoanp;
			if ($Marzoanp < 0) {
				$Marzoanp=0;
			}
			$Abrilanp=$AsistentesAbril-$Abrilanp;
			if ($Abrilanp < 0) {
				$Abrilanp=0;
			}
			$Mayoanp=$AsistentesMayo-$Mayoanp;
			if ($Mayoanp < 0) {
				$Mayoanp=0;
			}
			$Junioanp=$AsistentesJunio-$Junioanp;
			if ($Junioanp < 0) {
				$Junioanp=0;
			}
			$Julioanp=$AsistentesJulio-$Julioanp;
			if ($Julioanp < 0) {
				$Julioanp=0;
			}
			$Agostoanp=$AsistentesAgosto-$Agostoanp;
			if ($Agostoanp < 0) {
				$Agostoanp=0;
			}
			$Septiembreanp=$AsistenteSeptiembre-$Septiembreanp;
			if ($Septiembreanp < 0) {
				$Septiembreanp=0;
			}
			$Octubreanp=$AsistenteOctubre-$Octubreanp;
			if ($Octubreanp < 0) {
				$Octubreanp=0;
			}
			$Noviembreanp=$AsistenteNoviembre-$Noviembreanp;
			if ($Noviembreanp < 0) {
				$Noviembreanp=0;
			}
			$Diciembreanp=$AsistenteDiciembre-$Diciembreanp;
			if ($Diciembreanp < 0) {
				$Diciembreanp=0;
			}


			echo "<tr style='background-color:#C7C7C7;'>";
			echo "<td>Horas no planeadasd</td>";
			echo "<td>".$Enerohnp."</td>";
			echo "<td>".$Febrerohnp."</td>";
			echo "<td>".$Marzonp."</td>";
			echo "<td>".$Abrilnp."</td>";
			echo "<td>".$Mayonp."</td>";
			echo "<td>".$Juniohnp."</td>";
			echo "<td>".$Julionp."</td>";
			echo "<td>".$Agostonp."</td>";
			echo "<td>".$Septiembrenp."</td>";
			echo "<td>".$Octubrenp."</td>";
			echo "<td>".$Noviembrenp."</td>";
			echo "<td>".$Diciembrenp."</td>";
			$AsistentesAnualnp=$Eneroanp+$Febreroanp+$Marzoanp+$Abrilanp+$Mayoanp+$Junioanp+$Julioanp+$Agostoanp+$Septiembreanp+$Octubreanp+$Noviembreanp+$Diciembreanp;
			$Horasnp=$Enerohnp+$Febrerohnp+$Marzonp+$Abrilnp+$Mayonp+$Juniohnp+$Julionp+$Agostonp+$Septiembrenp+$Octubrenp+$Noviembrenp+$Diciembrenp;

			echo "<td >".$Horasnp."</td>";
			$htnp=$AsistentesAnualnp * $Horasnp;
			echo "<td rowspan='2'>".$htnp."<br />";
			echo "</tr>";

			echo "<tr style='background-color:#C7C7C7;'>";
			echo "<td>Asistentes no planeados</td>";
			echo "<td>".$Eneroanp."</td>";
			echo "<td>".$Febreroanp."</td>";
			echo "<td>".$Marzoanp."</td>";
			echo "<td>".$Abrilanp."</td>";
			echo "<td>".$Mayoanp."</td>";
			echo "<td>".$Junioanp."</td>";
			echo "<td>".$Julioanp."</td>";
			echo "<td>".$Agostoanp."</td>";
			echo "<td>".$Septiembreanp."</td>";
			echo "<td>".$Octubreanp."</td>";
			echo "<td>".$Noviembreanp."</td>";
			echo "<td>".$Diciembreanp."</td>";
			echo "<td>".$AsistentesAnualnp."</td>";
			echo "</tr>";		
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */
		/* ---------------------------------------------------------------------------------------------------------------------------------------- */

			echo "<tr style='background-color:#AABFD5;'>";
			echo "<td>Horas reales</td>";
			echo "<td>".$totalE."</td>";
			echo "<td>".$totalF."</td>";
			echo "<td>".$totalMZ."</td>";
			echo "<td>".$totalAB."</td>";
			echo "<td>".$totalMY."</td>";
			echo "<td>".$totalJN."</td>";
			echo "<td>".$totalJL."</td>";
			echo "<td>".$totalAG."</td>";
			echo "<td>".$totalSP."</td>";
			echo "<td>".$totalOC."</td>";
			echo "<td>".$totalNV."</td>";
			echo "<td>".$totalDC."</td>";
			$AsistentesAnual=$AsistentesEnero+$AsistentesFebrero+$AsistentesMarzo+$AsistentesAbril+$AsistentesMayo+$AsistentesJunio+$AsistentesJulio+$AsistentesAgosto+$AsistenteSeptiembre+$AsistenteOctubre+$AsistenteNoviembre+$AsistenteDiciembre;
			$totalHR=$totalE+$totalF+$totalMZ+$totalAB+$totalMY+$totalJN+$totalJL+$totalAG+$totalSP+$totalOC+$totalNV+$totalDC;
			echo "<td>".$totalHR."</td>";
			$hr=$AsistentesAnual * $totalHR;
			echo "<td rowspan='2'>".$hr."<br />";
			echo "</tr>";

			echo "<tr style='background-color:#AABFD5;'>";
			echo "<td>Asistentes reales</td>";
			echo "<td>".$AsistentesEnero."</td>";
			echo "<td>".$AsistentesFebrero."</td>";
			echo "<td>".$AsistentesMarzo."</td>";
			echo "<td>".$AsistentesAbril."</td>";
			echo "<td>".$AsistentesMayo."</td>";
			echo "<td>".$AsistentesJunio."</td>";
			echo "<td>".$AsistentesJulio."</td>";
			echo "<td>".$AsistentesAgosto."</td>";
			echo "<td>".$AsistenteSeptiembre."</td>";
			echo "<td>".$AsistenteOctubre."</td>";
			echo "<td>".$AsistenteNoviembre."</td>";
			echo "<td>".$AsistenteDiciembre."</td>";
			echo "<td>".$AsistentesAnual."</td>";
			echo "</tr>";

			$querys="UPDATE meses set Enerohnp='$Enerohnp',Febrerohnp='$Febrerohnp',
			Eneroar='$AsistentesEnero',Febreroar='$AsistentesFebrero',Marzoar='$AsistentesMarzo',Abrilar='$AsistentesAbril',Mayoar='$AsistentesMayo',
			Junioar='$AsistentesJunio',Julioar='$AsistentesJulio',Agostoar='$AsistentesAgosto',Septiembrear='$AsistenteSeptiembre',Octubrear='$AsistenteOctubre',
			Noviembrear='$AsistenteNoviembre',Diciembrear='$AsistenteDiciembre',AsistReal='$AsistentesAnual',
			Enerohr='$totalE',Febrerohr='$totalF',Marzohr='$totalMZ',Abrilhr='$totalAB',Mayohr='$totalMY',Juniohr='$totalJN',Juliohr='$totalJL',Agostohr='$totalAG',
			Septiembrehr='$totalSP',Octubrehr='$totalOC',Noviembrehr='$totalNV',Diciembrehr='$totalDC',HrsReales='$totalHR',
			Eneroanp='$Eneroanp',Febreroanp='$Febreroanp',Marzoanp='$Marzoanp',Abrilanp='$Abrilanp',Junioanp='$Junioanp',Julioanp='$Julioanp',Agostoanp='$Agostoanp',
			Septiembreanp='$Septiembreanp',Octubreanp='$Octubreanp',Noviembreanp='$Noviembreanp',Diciembreanp='$Diciembreanp'
			where idcurso=$idmes";
			$con->query($querys);


	}
	?> 
</table>
</body>
</html>