<?php
	require('../conf/conf.php');

	$anio=$_POST['anio'];
	$unidad=$_POST['unidad'];

	$query="SELECT id,nombre from curso where unidad='$unidad' and anio='$anio'";

	$res=$db->query($query);
	while ($fila=$res->fetch_array()) 
	{
		$idCurso=$fila['id'];
		$curso=$fila['nombre']."<br>";

		$query2="SELECT * from meses where idcurso=$idCurso";
		$res2=$db->query($query2);
		while ($fila2=$res2->fetch_array()) 
		{
			
			$Enero_HSP=$fila2['Enerohsp'].", ";
			$Febrero_HSP=$fila2['Febrerohsp'].", ";
			$Marzo_HSP=$fila2['Marzohsp'].", ";
			$Abril_HSP=$fila2['Abrilhsp'].", ";
			$Mayo_HSP=$fila2['Mayohsp'].", ";
			$Junio_HSP=$fila2['Juniohsp'].", ";
			$Julio_HSP=$fila2['Juliohsp'].", ";
			$Agosto_HSP=$fila2['Agostohsp'].", ";
			$Septiembre_HSP=$fila2['Septiembrehsp'].", ";
			$Octubre_HSP=$fila2['Octubrehsp'].", ";
			$Noviembre_HSP=$fila2['Noviembrehsp'].", ";
			$Diciembre_HSP=$fila2['Diciembrehsp'].", ";
			
			$Enero_HNP=$fila2['Enerohnp'].", ";
			$Febrero_HNP=$fila2['Febrerohnp'].", ";
			$Marzo_HNP=$fila2['Marzohnp'].", ";
			$Abril_HNP=$fila2['Abrilhnp'].", ";
			$Mayo_HNP=$fila2['Mayohnp'].", ";
			$Junio_HNP=$fila2['Juniohnp'].", ";
			$Julio_HNP=$fila2['Juliohnp'].", ";
			$Agosto_HNP=$fila2['Agostohnp'].", ";
			$Septiembre_HNP=$fila2['Septiembrehnp'].", ";
			$Octubre_HNP=$fila2['Octubrehnp'].", ";
			$Noviembre_HNP=$fila2['Noviembrehnp'].", ";
			$Diciembre_HNP=$fila2['Diciembrehnp'].", ";
			
			$Enero_HRP=$fila2['Enerohr'].", ";
			$Febrero_HRP=$fila2['Febrerohr'].", ";
			$Marzo_HRP=$fila2['Marzohr'].", ";
			$Abril_HRP=$fila2['Abrilhr'].", ";
			$Mayo_HRP=$fila2['Mayohr'].", ";
			$Junio_HRP=$fila2['Juniohr'].", ";
			$Julio_HRP=$fila2['Juliohr'].", ";
			$Agosto_HRP=$fila2['Agostohr'].", ";
			$Septiembre_HRP=$fila2['Septiembrehr'].", ";
			$Octubre_HRP=$fila2['Octubrehr'].", ";
			$Noviembre_HRP=$fila2['Noviembrehr'].", ";
			$Diciembre_HRP=$fila2['Diciembrehr'].", ";
			
			$Enero_ASP=$fila2['Eneroap'].", ";
			$Febrero_ASP=$fila2['Febreroap'].", ";
			$Marzo_ASP=$fila2['Marzoap'].", ";
			$Abril_ASP=$fila2['Abrilap'].", ";
			$Mayo_ASP=$fila2['Mayoasp'].", ";
			$Junio_ASP=$fila2['Junioasp'].", ";
			$Julio_ASP=$fila2['Julioasp'].", ";
			$Agosto_ASP=$fila2['Agostoasp'].", ";
			$Septiembre_ASP=$fila2['Septiembreasp'].", ";
			$Octubre_ASP=$fila2['Octubreasp'].", ";
			$Noviembre_ASP=$fila2['Noviembreasp'].", ";
			$Diciembre_ASP=$fila2['Diciembreasp'].", ";
			
			$Enero_ANP=$fila2['Eneroanp'];
			$Febrero_ANP=$fila2['Febreroanp'];
			$Marzo_ANP=$fila2['Marzoanp'];
			$Abril_ANP=$fila2['Abrilanp'];
			$Mayo_ANP=$fila2['Mayoanp'];
			$Junio_ANP=$fila2['Junioanp'];
			$Julio_ANP=$fila2['Julioanp'];
			$Agosto_ANP=$fila2['Agostoanp'];
			$Septiembre_ANP=$fila2['Septiembreanp'];
			$Octubre_ANP=$fila2['Octubreanp'];
			$Noviembre_ANP=$fila2['Noviembreanp'];
			$Diciembre_ANP=$fila2['Diciembreanp'];
			
			$Enero_AR=$fila2['Eneroar'].", ";
			$Febrero_AR=$fila2['Febreroar'].", ";
			$Marzo_AR=$fila2['Marzoar'].", ";
			$Abril_AR=$fila2['Abrilar'].", ";
			$Mayo_AR=$fila2['Mayoar'].", ";
			$Junio_AR=$fila2['Junioar'].", ";
			$Julio_AR=$fila2['Julioar'].", ";
			$Agosto_AR=$fila2['Agostoar'].", ";
			$Septiembre_AR=$fila2['Septiembrear'].", ";
			$Octubre_AR=$fila2['Octubrear'].", ";
			$Noviembre_AR=$fila2['Noviembrear'].", ";
			$Diciembre_AR=$fila2['Diciembrear'].", ";
			

			$HorasTotalPlaneadas=$fila2['HrsPlan'].", ";
			$HorasTotalNplaneada=$fila2['HrsNPlan'].", ";
			$HorasTotalReal=$fila2['HrsReales'].", ";

			$AsistentesTotalPlaneadas=$fila2['AsistPlan'].", ";
			$AsistentesTotalNplaneada=$fila2['AsistNpla'].", ";
			$AsistentesTotalReal=$fila2['AsistReal'].", ";
			

			$query_Enero_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Enero' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Enero_LAR=$db->query($query_Enero_LAR);
			$Enero_LAR=$res_Enero_LAR->num_rows;

			$query_Febrero_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Febrero' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Febrero_LAR=$db->query($query_Febrero_LAR);
			$Febrero_LAR=$res_Febrero_LAR->num_rows;

			$query_Marzo_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Marzo' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Marzo_LAR=$db->query($query_Marzo_LAR);
			$Marzo_LAR=$res_Marzo_LAR->num_rows;

			$query_Abril_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Abril' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Abril_LAR=$db->query($query_Abril_LAR);
			$Abril_LAR=$res_Abril_LAR->num_rows;

			$query_Mayo_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Mayo' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Mayo_LAR=$db->query($query_Mayo_LAR);
			$Mayo_LAR=$res_Mayo_LAR->num_rows;

			$query_Junio_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Junio' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Junio_LAR=$db->query($query_Junio_LAR);
			$Junio_LAR=$res_Junio_LAR->num_rows;

			$query_Julio_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Julio' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Julio_LAR=$db->query($query_Julio_LAR);
			$Julio_LAR=$res_Julio_LAR->num_rows;

			$query_Agosto_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Agosto' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Agosto_LAR=$db->query($query_Agosto_LAR);
			$Agosto_LAR=$res_Agosto_LAR->num_rows;

			$query_Septiembre_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Septiembre' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Septiembre_LAR=$db->query($query_Septiembre_LAR);
			$Septiembre_LAR=$res_Septiembre_LAR->num_rows;

			$query_Octubre_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Octubre' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Octubre_LAR=$db->query($query_Octubre_LAR);
			$Octubre_LAR=$res_Octubre_LAR->num_rows;

			$query_Noviembre_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Noviembre' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Noviembre_LAR=$db->query($query_Noviembre_LAR);
			$Noviembre_LAR=$res_Noviembre_LAR->num_rows;

			$query_Diciembre_LAR="SELECT tc.idtrabajador from listas as l join curso as c on l.nombrecurso=c.nombre join trabajadorcurso as tc on l.id=tc.idlista 
			where c.id=$idCurso and l.mes='Diciembre' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res_Diciembre_LAR=$db->query($query_Diciembre_LAR);
			$Diciembre_LAR=$res_Diciembre_LAR->num_rows;
			

			$Enero_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Enero' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Enero_duracion);
			$Enero_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Enero_Total_duracion=$Enero_Total_duracion+$duracion;
			}

			$Febrero_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Febrero' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Febrero_duracion);
			$Febrero_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Febrero_Total_duracion=$Febrero_Total_duracion+$duracion;
			}

			$Marzo_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Marzo' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Marzo_duracion);
			$Marzo_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Marzo_Total_duracion=$Marzo_Total_duracion+$duracion;
			}

			$Abril_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Abril' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Abril_duracion);
			$Abril_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Abril_Total_duracion=$Abril_Total_duracion+$duracion;
			}

			$Mayo_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Mayo' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Mayo_duracion);
			$Mayo_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Mayo_Total_duracion=$Mayo_Total_duracion+$duracion;
			}

			$Junio_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Junio' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Junio_duracion);
			$Junio_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Junio_Total_duracion=$Junio_Total_duracion+$duracion;
			}

			$Julio_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Julio' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Julio_duracion);
			$Julio_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Julio_Total_duracion=$Julio_Total_duracion+$duracion;
			}

			$Agosto_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Agosto' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Agosto_duracion);
			$Agosto_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Agosto_Total_duracion=$Agosto_Total_duracion+$duracion;
			}

			$Septiembre_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Septiembre' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Septiembre_duracion);
			$Septiembre_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Septiembre_Total_duracion=$Septiembre_Total_duracion+$duracion;
			}

			$Octubre_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Octubre' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Octubre_duracion);
			$Octubre_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Octubre_Total_duracion=$Octubre_Total_duracion+$duracion;
			}

			$Noviembre_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Noviembre' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Noviembre_duracion);
			$Noviembre_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Noviembre_Total_duracion=$Noviembre_Total_duracion+$duracion;
			}

			$Diciembre_duracion="SELECT duracion from listas as l join curso as c on l.nombrecurso=c.nombre 
			where c.id=$idCurso and l.mes='Diciembre' and l.anio=$anio and l.unidad='$unidad' and c.unidad='$unidad'";
			$res3=$db->query($Diciembre_duracion);
			$Diciembre_Total_duracion=0;
			while ($fila3=$res3->fetch_array()) {
				$duracion=$fila3['duracion'];
				$Diciembre_Total_duracion=$Diciembre_Total_duracion+$duracion;
			}			

			$Horas_NPlaneadas_Enero=$Enero_Total_duracion-$Enero_HSP;
			if ($Horas_NPlaneadas_Enero < 0) {
				$Horas_NPlaneadas_Enero=0;
			}
			$Horas_NPlaneadas_Febrero=$Febrero_Total_duracion-$Febrero_HSP;
			if ($Horas_NPlaneadas_Febrero < 0) {
				$Horas_NPlaneadas_Febrero=0;
			}
			$Horas_NPlaneadas_Marzo=$Marzo_Total_duracion-$Marzo_HSP;
			if ($Horas_NPlaneadas_Marzo < 0) {
				$Horas_NPlaneadas_Marzo=0;
			}
			$Horas_NPlaneadas_Abril=$Abril_Total_duracion-$Abril_HSP;
			if ($Horas_NPlaneadas_Abril < 0) {
				$Horas_NPlaneadas_Abril=0;
			}
			$Horas_NPlaneadas_Mayo=$Mayo_Total_duracion-$Mayo_HSP;
			if ($Horas_NPlaneadas_Mayo < 0) {
				$Horas_NPlaneadas_Mayo=0;
			}
			$Horas_NPlaneadas_Junio=$Junio_Total_duracion-$Junio_HSP;
			if ($Horas_NPlaneadas_Junio < 0) {
				$Horas_NPlaneadas_Junio=0;
			}
			$Horas_NPlaneadas_Julio=$Julio_Total_duracion-$Julio_HSP;
			if ($Horas_NPlaneadas_Julio < 0) {
				$Horas_NPlaneadas_Julio=0;
			}
			$Horas_NPlaneadas_Agosto=$Agosto_Total_duracion-$Agosto_HSP;
			if ($Horas_NPlaneadas_Agosto < 0) {
				$Horas_NPlaneadas_Agosto=0;
			}
			$Horas_NPlaneadas_Septiembre=$Septiembre_Total_duracion-$Septiembre_HSP;
			if ($Horas_NPlaneadas_Septiembre < 0) {
				$Horas_NPlaneadas_Septiembre=0;
			}
			$Horas_NPlaneadas_Octubre=$Octubre_Total_duracion-$Octubre_HSP;
			if ($Horas_NPlaneadas_Octubre < 0) {
				$Horas_NPlaneadas_Octubre=0;
			}
			$Horas_NPlaneadas_Noviembre=$Noviembre_Total_duracion-$Noviembre_HSP;
			if ($Horas_NPlaneadas_Noviembre < 0) {
				$Horas_NPlaneadas_Noviembre=0;
			}
			$Horas_NPlaneadas_Diciembre=$Diciembre_Total_duracion-$Diciembre_HSP;
			if ($Horas_NPlaneadas_Diciembre < 0) {
				$Horas_NPlaneadas_Diciembre=0;
			}
			
			$Asistentes_NPlaneadas_Enero=$Enero_AR-$Enero_ASP;
				if ($Asistentes_NPlaneadas_Enero < 0) {
					$Asistentes_NPlaneadas_Enero=0;
				}
			$Asistentes_NPlaneadas_Febrero=$Febrero_AR-$Febrero_ASP;
				if ($Asistentes_NPlaneadas_Febrero < 0) {
					$Asistentes_NPlaneadas_Febrero=0;
				}
			$Asistentes_NPlaneadas_Marzo=$Marzo_AR-$Marzo_ASP;
				if ($Asistentes_NPlaneadas_Marzo < 0) {
					$Asistentes_NPlaneadas_Marzo=0;
				}
			$Asistentes_NPlaneadas_Abril=$Abril_AR-$Abril_ASP;
				if ($Asistentes_NPlaneadas_Abril < 0) {
					$Asistentes_NPlaneadas_Abril=0;
				}
			$Asistentes_NPlaneadas_Mayo=$Mayo_AR-$Mayo_ASP;
				if ($Asistentes_NPlaneadas_Mayo < 0) {
					$Asistentes_NPlaneadas_Mayo=0;
				}
			$Asistentes_NPlaneadas_Junio=$Junio_AR-$Junio_ASP;
				if ($Asistentes_NPlaneadas_Junio < 0) {
					$Asistentes_NPlaneadas_Junio=0;
				}
			$Asistentes_NPlaneadas_Julio=$Julio_AR-$Julio_ASP;
				if ($Asistentes_NPlaneadas_Julio < 0) {
					$Asistentes_NPlaneadas_Julio=0;
				}
			$Asistentes_NPlaneadas_Agosto=$Agosto_AR-$Agosto_ASP;
				if ($Asistentes_NPlaneadas_Agosto < 0) {
					$Asistentes_NPlaneadas_Agosto=0;
				}
			$Asistentes_NPlaneadas_Septiembre=$Septiembre_AR-$Septiembre_ASP;
				if ($Asistentes_NPlaneadas_Septiembre < 0) {
					$Asistentes_NPlaneadas_Septiembre=0;
				}
			$Asistentes_NPlaneadas_Octubre=$Octubre_AR-$Octubre_ASP;
				if ($Asistentes_NPlaneadas_Octubre < 0) {
					$Asistentes_NPlaneadas_Octubre=0;
				}
			$Asistentes_NPlaneadas_Noviembre=$Noviembre_AR-$Noviembre_ASP;
				if ($Asistentes_NPlaneadas_Noviembre < 0) {
					$Asistentes_NPlaneadas_Noviembre=0;
				}
			$Asistentes_NPlaneadas_Diciembre=$Diciembre_AR-$Diciembre_ASP;
				if ($Asistentes_NPlaneadas_Diciembre < 0) {
					$Asistentes_NPlaneadas_Diciembre=0;
				}

			// Actualiza los datos de los asistentes reales 
			$update1="UPDATE meses SET Eneroar=$Enero_LAR,Febreroar=$Febrero_LAR,Marzoar=$Marzo_LAR,Abrilar=$Abril_LAR,
			Mayoar=$Mayo_LAR,Junioar=$Junio_LAR,Julioar=$Julio_LAR,Agostoar=$Agosto_LAR,Septiembrear=$Septiembre_LAR,Octubrear=$Octubre_LAR,
			Noviembrear=$Noviembre_LAR,Diciembrear=$Diciembre_LAR,
			Enerohr='$Enero_Total_duracion',Febrerohr='$Febrero_Total_duracion',Marzohr='$Marzo_Total_duracion',Abrilhr='$Abril_Total_duracion',
			Mayohr='$Mayo_Total_duracion',Juniohr='$Junio_Total_duracion',Juliohr='$Julio_Total_duracion',Agostohr='$Agosto_Total_duracion',
			Septiembrehr='$Septiembre_Total_duracion',Octubrehr='$Octubre_Total_duracion',Noviembrehr='$Noviembre_Total_duracion',
			Diciembrehr='$Diciembre_Total_duracion',
			Enerohnp='$Horas_NPlaneadas_Enero',Febrerohnp='$Horas_NPlaneadas_Febrero',Marzohnp='$Horas_NPlaneadas_Marzo',Abrilhnp='$Horas_NPlaneadas_Abril',
			Mayohnp='$Horas_NPlaneadas_Mayo',Juniohnp='$Horas_NPlaneadas_Junio',Juliohnp='$Horas_NPlaneadas_Julio',Agostohnp='$Horas_NPlaneadas_Agosto',
			Septiembrehnp='$Horas_NPlaneadas_Septiembre',Octubrehnp='$Horas_NPlaneadas_Octubre',Noviembrehnp='$Horas_NPlaneadas_Noviembre',
			Diciembrehnp='$Horas_NPlaneadas_Diciembre',
			Eneroanp=$Asistentes_NPlaneadas_Enero,Febreroanp=$Asistentes_NPlaneadas_Febrero,Marzoanp=$Asistentes_NPlaneadas_Marzo,
			Abrilanp=$Asistentes_NPlaneadas_Abril,Mayoanp=$Asistentes_NPlaneadas_Mayo,Junioanp=$Asistentes_NPlaneadas_Junio,
			Julioanp=$Asistentes_NPlaneadas_Julio,Agostoanp=$Asistentes_NPlaneadas_Agosto,Septiembreanp=$Asistentes_NPlaneadas_Septiembre,
			Octubreanp=$Asistentes_NPlaneadas_Octubre,Noviembreanp=$Asistentes_NPlaneadas_Noviembre,Diciembreanp=$Asistentes_NPlaneadas_Diciembre
			WHERE idcurso=$idCurso";
			$con->query($update1);
		}
	}
?>
Echo