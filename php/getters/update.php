<?php
	include("../conf/conf.php");
	$action=$_POST['action'];
	if ($action == "Unidad") {
		$id=$_POST['id'];
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
		$logo=$_POST['logo'];

		$query="UPDATE unidad SET logo='$logo', nombre='$NombreUnidad',rfc='$RFCUnidad',imss='$IMSSUnidad', curp='$CURPUnidad',calle='$CalleUnidad',colonia='$ColoniaUnidad',nointerior='$InteriorUnidad' ,noexterior='$ExteriorUnidad',codigopostal='$CPUnidad',fax='$FaxUnidad',email='$EmailUnidad',telefono='$TelefonoUnidad',localidad='$LocalidadUnidad',municipio='$MunicipioUnidad',estado='$EstadoUnidad',actividad='$ActividadUnidad'  WHERE id=$id";
		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error";
		}
	}
	if ($action == "Usuario") {
		$id=$_POST['id'];
		$Nombre=$_POST['Nombre'];
		$Pass=$_POST['Pass'];
		$Usuario=$_POST['Usuario'];
		$unidad=$_POST['unidad'];

		 $query="UPDATE usuario SET nombreuser='$Nombre',usuario='$Usuario' ,password='$Pass',unidad='$unidad' WHERE id=$id";
		if ($con->query($query))
		{
			echo "Registro grabado correctamente ".$Nombre;
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "DNC") {
		$unid=$_POST['unid'];
		$cursoDnc=$_POST['cursoDnc'];
		$depa=$_POST['depa'];

		$query="UPDATE dnc SET status='Si'  WHERE curso='$cursoDnc' and unidad='$unid' and departamento='$depa'";
		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "Listas") {
		$id=$_POST['id'];

		$query="UPDATE listas SET status='Completo' WHERE id=$id";
		if ($con->query($query))
		{
			$query="SELECT id from trabajadorcurso where idlista=$id";
			$res=$db->query($query);
			$total=$res->num_rows;
			$query="UPDATE listas SET noasist=$total WHERE id=$id";
			$con->query($query);
			echo "OK.";
		}
		else
		{
			echo "Error";
		}
	}
	if ($action == "CambiarPassAdm") {

		$query="SELECT * from usuario WHERE tipouser='Administrador'";
		$res=$db->query($query);
		while ($fila=$res->fetch_array()) {
			$password=$fila['password'];
		}
		$conant=$_POST['conant'];
		if ($password != $conant) {
			echo "Error la contraseña anterior no coincide";
		}
		else{
			$conact=$_POST['conact'];
			$query="UPDATE usuario SET password='$conact' WHERE tipouser='Administrador'";
			if ($con->query($query))
			{
				echo "OK.";
			}
			else
			{
				echo "Error al guardar";
			}
		}
	}
	if ($action == "CambiarImagen") {
		$logo=$_POST['logo'];
		$query="UPDATE utilidades SET logo='$logo' WHERE id=1";
		if ($con->query($query))
		{
			echo "OK. Imagen cambiada";
		}
		else
		{
			echo "Error al guardar";
		}
	}
	if ($action == "DepaUserJCEdit") {
		$id=$_POST['id'];
		$User=$_POST['User'];
		$Pass=$_POST['Pass'];
		$Nombre=$_POST['Nombre'];
		$Departamento=$_POST['Departamento'];

		$query="UPDATE usuario SET nombreuser='$Nombre',usuario='$User' ,password='$Pass' WHERE idDepartamento=$id";
		if ($con->query($query))
		{
			$query="UPDATE departamento SET departamento='$Departamento' WHERE id=$id";
			if ($con->query($query))
			{
				echo "Registro grabado correctamente ";
			}
			else
			{
				echo "Error de grabacion s";
			}
		}
		else
		{
			echo "Error de grabacion s";
		}
	}
	if ($action == "EditarTrabajador") {
		$id=$_POST['id'];
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

	    $query="UPDATE trabajador set numerocobro=$numerocobro, numeroficha='$numeroficha', nombre='$nombre',
	    apaterno='$apaterno',amaterno='$amaterno',curp='$curp',rfc='$rfc',sueldo=$sueldo,departamento='$departamento',
	    unidad='$unidad', categoria='$categoria', fechanacimiento='$fechanacimiento', estadocivil='$estadocivil',hijos=$hijos ,
	    discapacidad='$discapacidad',estado='$estado', municipio='$municipio', ocupacion='$ocupacion', estudios='$estudios',
	    documentoprobatorio='$documentoprobatorio',aniodocumento=$aniodocumento,institucion='$institucion',carrera='$carrera' , 
	    imss='$imss',tipotrabajador='$tipotrabajador',genero='$genero',fechaingreso='$fechaingreso'
	    where id=$id";
	    
		if ($con->query($query))
		{
			echo "Registro grabado correctamente";
		}
		else
		{
			echo "Error de grabacion";
		}
	}
	if ($action == "ActualizarRubro") {
		$rubro=$_POST['rubro'];
		$id=$_POST['id'];
		$query = "UPDATE rubro set rubro='$rubro' where id=$id";
		if ($con->query($query))
		{
			echo "OK";
		}
		else
		{
			echo "Error al guardar";
		}
	}
	if ($action == "EditaNorma") {
		$id=$_POST['id'];
		$Codigon=$_POST['Codigon'];
		$Nombren=$_POST['Nombren'];
		$rubro=$_POST['rubro'];
		$query = "UPDATE normas set idrubro=$rubro, codigo='$Codigon', nombrenorma='$Nombren' where id=$id";
		if ($con->query($query))
		{
			echo "OK";
		}
		else
		{
			echo "Error al guardar";
		}
	}
	if ($action == "ActualizarCursoOk") {
		$id=$_POST['id'];
		$query = "UPDATE curso set terminado='Si' where id=$id";
		if ($con->query($query))
		{
			echo "OK";
		}
		else
		{
			echo "Error al guardar";
		}
	}
	if ($action == "EditaAnio") {
		$id=$_POST['id'];
		$anio=$_POST['anio'];
		$query = "UPDATE usuario set anio='$anio' where id=$id";
		if ($con->query($query))
		{
			echo "OK";
		}
		else
		{
			echo "Error al guardar";
		}
	}
	if ($action == "ActualizarCotizacion") {
		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$imparte=$_POST['imparte'];
		$lugar=$_POST['lugar'];
		$Duracion=$_POST['Duracion'];
		$objetivos=$_POST['objetivos'];
		$numpersonas=$_POST['numpersonas'];
		$costocurso=$_POST['costocurso'];
		$transporte=$_POST['transporte'];
		$alimentacion=$_POST['alimentacion'];
		$hospedaje=$_POST['hospedaje'];
		$otros=$_POST['otros'];
		$invpersona=$_POST['invpersona'];
		$invtotal=$_POST['invtotal'];
		$anio=$_POST['anio'];
		$status="No";

		$query = "UPDATE presupuestado set nombre='$nombre',imparte='$imparte',lugar='$lugar',Duracion='$Duracion',numpersonas='$numpersonas',
		objetivos='$objetivos',costocurso='$costocurso',transporte='$transporte',alimentacion='$alimentacion',hospedaje='$hospedaje',otros='$otros',
		invpersona='$invpersona',invtotal='$invtotal',anio=$anio,status='$status' where id=$id";
		if ($con->query($query))
		{
			echo "OK";
		}
		else
		{
			echo "Error al guardar";
		}
	}
	if ($action == "ActualizarCursoPresOk") {
		$id=$_POST['id'];

		$query = "UPDATE presupuestado set status='Si' where id=$id";
		if ($con->query($query))
		{
			echo "OK";
		}
		else
		{
			echo "Error al guardar";
		}
	}

?>
