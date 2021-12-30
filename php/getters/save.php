<?php
	include("../conf/conf.php");
	$action=$_POST['action'];
	if ($action == "Unidad") {

		$NombreUnidad=$_POST['ud01'];
		$CURPUnidad=$_POST['ud02'];
		$RFCUnidad=$_POST['ud03'];
		$IMSSUnidad=$_POST['ud04'];
		$CalleUnidad=$_POST['ud05'];
		$ExteriorUnidad=$_POST['ud06'];
		$InteriorUnidad=$_POST['ud07'];
		$ColoniaUnidad=$_POST['ud08'];
		$CPUnidad=$_POST['ud09'];
		$LocalidadUnidad=$_POST['ud10'];
		$MunicipioUnidad=$_POST['ud11'];
		$EstadoUnidad=$_POST['ud12'];
		$TelefonoUnidad=$_POST['ud13'];
		$EmailUnidad=$_POST['ud14'];
		$FaxUnidad=$_POST['ud15'];
		$ActividadUnidad=$_POST['ud16'];

		$query = "INSERT INTO unidad (nombre, rfc,imss,curp,calle,colonia,nointerior,noexterior, codigopostal,fax,email,telefono,localidad, municipio, estado,actividad)
      VALUES ('$NombreUnidad','$RFCUnidad','$IMSSUnidad','$CURPUnidad','$CalleUnidad','$ColoniaUnidad','$InteriorUnidad','$ExteriorUnidad','$CPUnidad','$FaxUnidad','$EmailUnidad','$TelefonoUnidad','$LocalidadUnidad','$MunicipioUnidad','$EstadoUnidad','$ActividadUnidad')";
		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "Usuario") {

		$NombreUser=$_POST['NombreUser'];
		$Nombre=$_POST['Nombre'];
		$Pass=$_POST['Pass'];
		$Unidad=$_POST['Unidad'];
		$Tipo11="Jefe de capacitacion";
		$anio=date('Y');

		$query="SELECT * from usuario where usuario='$Nombre'";
		$res=$db->query($query);
		if ($res->num_rows>0) {
			echo "Ya existe el usuario ".$Nombre." Favor de ingresar otro.";
		}else{
			$query = "INSERT INTO usuario (nombreuser, usuario,password,tipouser,unidad,anio)VALUES ('$NombreUser','$Nombre','$Pass','$Tipo11','$Unidad',$anio)";
			if ($con->query($query))
			{
				echo "Registro grabado correctamente";
			}
			else
			{
				echo "Error de grabacion";
			}
		}		
	}
	if ($action == "AdmAviso") {

		$NombreUser=$_POST['NombreUser'];
		$aviso=$_POST['aviso'];
		$adm="adm";
		$Administrador="Administrador";
		$unidad="Administrador";
		$destino="Jefe de capacitacion";


		$query = "INSERT INTO aviso(usuario, tipouser,aviso,destino,unidad)VALUES ('$adm','$Administrador','$aviso','$destino','$unidad')";
		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "DepaUserJC") {

		$Departamento=$_POST['Departamento'];
		$Nombre=$_POST['Nombre'];
		$NombreUser=$_POST['NombreUser'];
		$Pass=$_POST['Pass'];
		$unidad=$_POST['unidad'];
		$anio=date('Y');
		$jefe="Jefe de departamento";

		$query="SELECT * from usuario where usuario='$NombreUser'";
		$res=$db->query($query);
		$total=$res->num_rows;
		if ($total > 0) {
			echo "Ya existe el usuario ".$NombreUser." Favor de ingresar otro.";
		}else{
			$query="SELECT * from unidad where nombre='$unidad'";
			$res=$db->query($query);
			while ($fila=$res->fetch_array()) {
				$id=$fila['id'];
			}

			$query = "INSERT INTO departamento(departamento, unidad)VALUES ('$Departamento',$id)";
			if ($con->query($query))
			{
				$query="SELECT * from departamento where departamento='$Departamento' and unidad=$id";
				$res=$db->query($query);
				while ($fila=$res->fetch_array()) {
					$id=$fila['id'];
				}
				$query = "INSERT INTO usuario(nombreuser,usuario,password,tipouser,idDepartamento,unidad,anio)
				VALUES ('$Nombre','$NombreUser','$Pass','$jefe',$id,'$unidad',$anio)";
				if ($con->query($query))
				{
					echo "Registro grabado correctamente";
				}
				else
				{
					echo "Error de grabacion";
				}
			}
			else
			{
				echo "Error de grabacion";
			}
		}
	}
	if ($action == "Trabajador") {

		$unidad=$_POST['unidad'];
	    $numerocobro=$_POST['dato00'];
	    $numeroficha=$_POST['dato01'];
	    $nombre=$_POST['dato02'];
	    $apaterno=$_POST['dato03'];
	    $amaterno=$_POST['dato04'];
	    $curp=$_POST['dato05'];
	    $rfc=$_POST['dato06'];
	    $sueldo=$_POST['dato07'];
	    $departamento=$_POST['dato08'];
	    $categoria=$_POST['dato09'];
	    $fechanacimiento=$_POST['dato10'];
	    $activo=$_POST['dato11'];
	    $estadocivil=$_POST['dato12'];
	    $hijos=$_POST['dato13'];
	    $discapacidad=$_POST['dato14'];
	    $estado=$_POST['dato15'];
	    $municipio=$_POST['dato16'];
	    $ocupacion=$_POST['dato17'];
	    $estudios=$_POST['dato18'];
	    $documentoprobatorio=$_POST['dato19'];
	    $aniodocumento=$_POST['dato20'];
	    $institucion=$_POST['dato21'];
	    $carrera=$_POST['dato22'];
	    $imss=$_POST['dato23'];
	    $tipotrabajador=$_POST['dato24'];
	    $genero=$_POST['dato25'];
	    $fechaingreso=$_POST['dato26'];


		$query="INSERT INTO trabajador 
		(numerocobro, numeroficha, nombre, apaterno, amaterno, curp, rfc, sueldo, departamento, 
		unidad, categoria, fechanacimiento, activo, estadocivil, hijos, discapacidad, estado, municipio,ocupacion, estudios, documentoprobatorio, 
		aniodocumento, institucion, carrera, imss, tipotrabajador,genero, fechaingreso) 
		VALUES($numerocobro,'$numeroficha','$nombre','$apaterno',
		'$amaterno','$curp','$rfc',$sueldo,'$departamento','$unidad','$categoria','$fechanacimiento','$activo','$estadocivil',$hijos,'$discapacidad',
		'$estado','$municipio','$ocupacion','$estudios','$documentoprobatorio',$aniodocumento,'$institucion','$carrera','$imss','$tipotrabajador',
		'$genero','$fechaingreso')";
		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "Rubro") {

		$rubro=$_POST['rubro'];
		$unidad=$_POST['unidad'];

		$query="SELECT * from unidad where nombre='$unidad'";
		$res=$db->query($query);
		while ($fila=$res->fetch_array()) {
			$id=$fila['id'];
		}

		$query = "INSERT INTO rubro(rubro, idunidad)VALUES ('$rubro',$id)";
		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "Norma") {

		$Codigon=$_POST['Codigon'];
		$Nombren=$_POST['Nombren'];
		$rubro=$_POST['rubro'];

		$query = "INSERT INTO normas(codigo, nombrenorma, idrubro)VALUES ('$Codigon','$Nombren',$rubro)";
		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "usuariojd") {		
	}
	/**/
	if ($action == "CursoNuevo") {
		$anioCurso01=$_POST['anioCurso01'];
		$lugarcurso02=$_POST['lugarcurso02'];
		$rubrocurso03=$_POST['rubrocurso03'];
		$instructor04=$_POST['instructor04'];
		$ncurso05=$_POST['ncurso05'];
		$objetivos06=$_POST['objetivos06'];
		$departR=$_POST['departR'];
		$unidadR=$_POST['unidadR'];
		$planeado09=$_POST['planeado09'];
		$status10=$_POST['status10'];

		/* Varialbes de los meses, Hrs SIGNIFICA HORAS Y Min significa Minutos  */
		$EneroHrs=intval($_POST['EneroHrs']);
		$EneroMin=intval($_POST['EneroMin']);
		$FebreroHrs=intval($_POST['FebreroHrs']);
		$FebreroMin=intval($_POST['FebreroMin']);

		$MarzoHrs=intval($_POST['MarzoHrs']);
		$MarzoMin=intval($_POST['MarzoMin']);
		$AbrilHrs=intval($_POST['AbrilHrs']);
		$AbrilMin=intval($_POST['AbrilMin']);

		$MayoHrs=intval($_POST['MayoHrs']);
		$MayoMin=intval($_POST['MayoMin']);
		$JunioHrs=intval($_POST['JunioHrs']);
		$JunioMin=intval($_POST['JunioMin']);

		$JulioHrs=intval($_POST['JulioHrs']);
		$JulioMin=intval($_POST['JulioMin']);
		$AgostoHrs=intval($_POST['AgostoHrs']);
		$AgostoMin=intval($_POST['AgostoMin']);

		$SeptiembreHrs=intval($_POST['SeptiembreHrs']);
		$SeptiembreMin=intval($_POST['SeptiembreMin']);
		$OctubreHrs=intval($_POST['OctubreHrs']);
		$OctubreMin=intval($_POST['OctubreMin']);

		$NoviembreHrs=intval($_POST['NoviembreHrs']);
		$NoviembreMin=intval($_POST['NoviembreMin']);
		$DiciembreHrs=intval($_POST['DiciembreHrs']);
		$DiciembreMin=intval($_POST['DiciembreMin']);

		/* Los valores de las horas y de los minutos se guardan  aqui. los minutos se convierten segun la regla de tres
		 * posteriormente se concatenan con las horas y se guardan */

		$MinEne=($EneroMin * 100)/60;
		$Enerohsp=$EneroHrs.".".$MinEne;							/* Variable de horas planeadas*/

		$MinFeb=($FebreroMin * 100)/60;
		$Febrerohsp=$FebreroHrs.".".$MinFeb;						/* Variable de horas planeadas*/

		$MinMarzo=($MarzoMin * 100)/60;
		$Marzohsp=$MarzoHrs.".".$MinMarzo;							/* Variable de horas planeadas*/

		$MinAbril=($AbrilMin * 100)/60;
		$Abrilhsp=$AbrilHrs.".".$MinAbril;							/* Variable de horas planeadas*/
		
		$MinMayo=($MayoMin * 100)/60;
		$Mayohsp=$MayoHrs.".".$MinMayo;								/* Variable de horas planeadas*/

		$MinJunio=($JunioMin * 100)/60;
		$Juniohsp=$JunioHrs.".".$MinJunio;							/* Variable de horas planeadas*/

		$MinJulio=($JulioMin * 100)/60;
		$Juliohsp=$JulioHrs.".".$MinJulio;							/* Variable de horas planeadas*/

		$MinAgosto=($AgostoMin * 100)/60;
		$Agostohsp=$AgostoHrs.".".$MinAgosto;						/* Variable de horas planeadas*/
		
		$MinSeptiembre=($SeptiembreMin * 100)/60;
		$Septiembrehsp=$SeptiembreHrs.".".$MinSeptiembre;			/* Variable de horas planeadas*/

		$MinOctubre=($OctubreMin * 100)/60;
		$Octubrehsp=$OctubreHrs.".".$MinOctubre;					/* Variable de horas planeadas*/

		$MinNoviembre=($NoviembreMin * 100)/60;
		$Noviembrehsp=$NoviembreHrs.".".$MinNoviembre;				/* Variable de horas planeadas*/

		$MinDiciembre=($DiciembreMin * 100)/60;
		$Diciembrehsp=$DiciembreHrs.".".$MinDiciembre;				/* Variable de horas planeadas*/

		$HHtotal=$Enerohsp+$Febrerohsp+$Marzohsp+$Abrilhsp+$Mayohsp+$Juniohsp+$Juliohsp+$Agostohsp+$Septiembrehsp+$Octubrehsp+$Noviembrehsp+$Diciembrehsp;
	
		if ($status10==1) 
		{
			$query="INSERT INTO curso(objetivos,departamento,unidad,planeado,instructor,status,terminado,anio,lugar,rubro,nombre) 
					VALUES('$objetivos06','$departR','$unidadR','$planeado09','$instructor04','$status10','No','$anioCurso01','$lugarcurso02','$rubrocurso03','$ncurso05')";

			if ($con->query($query))
				{
					echo "Curso y fecha ";
				}else
				{
					echo "Error de grabacion de curso";
				}
			$query="SELECT id FROM curso WHERE departamento='$departR' AND unidad='$unidadR' AND nombre='$ncurso05'";
			$lista= $con->query($query);
			while ($row=$lista->fetch_array())
			{
				$idcursop=$row['id'];
			}
			$query="";
		/*  -----------------------------------------------  */
			$query="INSERT INTO meses(idcurso,Enerohsp,Febrerohsp,Marzohsp,Abrilhsp,Mayohsp,Juniohsp,Juliohsp,Agostohsp,Septiembrehsp,Octubrehsp,Noviembrehsp,Diciembrehsp,HrsPlan) 
			VALUES($idcursop,$Enerohsp,$Febrerohsp,$Marzohsp,$Abrilhsp,$Mayohsp,$Juniohsp,$Juliohsp,$Agostohsp,$Septiembrehsp,$Octubrehsp,$Noviembrehsp,$Diciembrehsp,$HHtotal)";
			if ($con->query($query))
			{
				echo "grabado correctamente";
			}
			else
			{
				echo "Error de grabacion de meses";
			}
		}
		else if ($status10 == 0) {
			
			$query="INSERT INTO presupuestado(nombre,imparte,lugar,objetivos,status,departamento,unidad,anio) 
					VALUES('$ncurso05','$instructor04','$lugarcurso02','$objetivos06','$status10','$departR','$unidadR',$anioCurso01)";

			if ($con->query($query))
			{
				echo "Registro grabado correctamente";
			}else
			{
				echo "Error de grabacion de curso";
			}
		}
	}
	if ($action == "DNC") {
		$UnidadSesion=$_POST['a01'];
		$DepartamentoSesion=$_POST['a02'];
		$CapacitacionDNC=$_POST['a03'];
		$Mesesdnc=$_POST['a04'];
		$idTrabajadores=$_POST['a05'];
		$CalActDNC=$_POST['a06'];
		$CalPlaDNC=$_POST['a07'];
		$anioDNC=$_POST['a08'];
		$status="No";

		$query="SELECT * from trabajador where id=$idTrabajadores";
		$res=$db->query($query);
		while ($fila=$res->fetch_array()) {
			$nocobro=$fila['numerocobro'];
			$tipo=$fila['tipotrabajador'];
		}
		$query="SELECT * from curso where id='$CapacitacionDNC'";
		$res=$db->query($query);
		while ($fila=$res->fetch_array()) {
			$curso=$fila['nombre'];
		}

		$query = "INSERT INTO dnc(curso,mes,nocobro,departamento,unidad,calactual,calplan,anio,tipoEmpleado,status)
		VALUES ('$curso','$Mesesdnc','$nocobro','$DepartamentoSesion','$UnidadSesion','$CalActDNC','$CalPlaDNC','$anioDNC','$tipo','$status')";
		if ($con->query($query))
		{
			echo $query;
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "Listas") {
		$HoraInicio=$_POST['HoraInicio'];
		$MinutoInicio=$_POST['MinutoInicio'];
		$HoraFin=$_POST['HoraFin'];
		$MinutoFin=$_POST['MinutoFin'];
		$Duracion=$_POST['Duracion'];
		$FechaInicioLista=$_POST['FechaInicioLista'];
		$FechaFinLista=$_POST['FechaFinLista'];
		$instructor=$_POST['instructor'];
		$MesLista=$_POST['MesLista'];
		$statusLista=$_POST['statusLista'];
		$unidad=$_POST['unidad'];
		$depa=$_POST['depa'];
		$lugar=$_POST['lugar'];
		$CursoLista=$_POST['CursoLista'];
		$anio=date('Y');
		$HI=$HoraInicio.":".$MinutoInicio;
		$HF=$HoraFin.":".$MinutoFin;
		$Planeado=$_POST['plan'];

		if ($Planeado == "Planeada") {
			$query="INSERT INTO listas(unidad,departamento,duracion,nombrecurso,lugar,instructor,horainicio,horafin,fechainicio,fechafin,status,anio,mes) 
			VALUES('$unidad','$depa','$Duracion','$CursoLista','$lugar','$instructor','$HI','$HF','$FechaInicioLista','$FechaFinLista','$statusLista',$anio,'$MesLista')";

			if ($con->query($query))
			{
				echo "Registro grabado correctamente";
			}
			else
			{
				echo "Error de grabacion";
			}
		}else{
			$query="INSERT INTO curso(nombre,departamento,unidad,planeado,instructor,status,terminado,anio,lugar) 
			VALUES('$CursoLista','$depa','$unidad','No planeada','$instructor','1','Si','$anio','$lugar')";
			if ($con->query($query))
			{
				$query="INSERT INTO listas(unidad,departamento,duracion,nombrecurso,lugar,instructor,horainicio,horafin,fechainicio,fechafin,status,anio,mes) 
				VALUES('$unidad','$depa','$Duracion','$CursoLista','$lugar','$instructor','$HI','$HF','$FechaInicioLista','$FechaFinLista','$statusLista',$anio,'$MesLista')";

				if ($con->query($query))
				{
					echo "Registro grabado correctamente";
				}
				else
				{
					echo "Error de grabacion en listas";
				}
			}
			else
			{
				echo "Error de grabacion nPlaneada";
			}
		}
	}
	if ($action == "PaseLista") {
		$curso=$_POST['Curso'];
		$unidad=$_POST['unidad'];
		$depa=$_POST['depa'];
		
		$query="SELECT l.id from listas as l join curso as c on l.nombrecurso=c.nombre where c.departamento='$depa' and c.unidad='$unidad'";
		$res=$db->query($query);
		while ($fila=$res->fetch_array()) {
			$id=$fila['id'];
		}
		$pasarlista=$_POST['pasarlista'];
		$query="INSERT INTO trabajadorcurso(idtrabajador,idlista,status) 
		VALUES($pasarlista,$id,'No')";

		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "ErrorAdm") {
		$TiEr=$_POST['TiEr'];
		$Erro=$_POST['Erro'];

		$query="INSERT INTO errores(clave,descripcion,tipouser) 
		VALUES('$TiEr','$Erro','Administrador')";

		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "ErrorJD") {
		$TiEr=$_POST['TiEr'];
		$Erro=$_POST['Erro'];
		$unidad=$_POST['unidad'];

		$query="INSERT INTO errores(clave,descripcion,tipouser,unidad) 
		VALUES('$TiEr','$Erro','Jefe de departamento','$unidad')";

		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "ErrorJC") {
		$TiEr=$_POST['TiEr'];
		$Erro=$_POST['Erro'];
		$unidad=$_POST['unidad'];

		$query="INSERT INTO errores(clave,descripcion,tipouser,unidad) 
		VALUES('$TiEr','$Erro','Jefe de capacitacion','$unidad')";

		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "AdmJC") {
		$aviso=$_POST['aviso'];
		$destino=$_POST['destino'];
		$unid=$_POST['unid'];
		$user=$_POST['user'];
		$tius="Jefe de capacitacion";

		$query = "INSERT INTO aviso(usuario, tipouser,aviso,destino,unidad)VALUES 
		('$user','$tius','$aviso','$destino','$unid')";
		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "AgregarTrabPres") {
		$trabajador=$_POST['trabajador'];
		$id=$_POST['id'];

		$query = "INSERT into emplpres(idEmpl,id_presupuestado) values($trabajador,$id)";
		if ($con->query($query))
		{
			echo "OK";
		}
		else
		{
			echo "Error al guardar";
		}
	}
	if ($action == "AdmJD") {
		$aviso=$_POST['aviso'];
		$destino=$_POST['destino'];
		$unid=$_POST['unid'];
		$user=$_POST['user'];
		$tius="Jefe de capacitacion";

		$query = "INSERT INTO aviso(usuario, tipouser,aviso,destino,unidad)VALUES 
		('$user','$tius','$aviso','$destino','$unid')";
		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
?>