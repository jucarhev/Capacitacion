<?php 
	include("../conf/conf.php");

	$action=$_GET['action'];
	if ($action == "unidad") {
		$id=$_GET['id'];
		$query="DELETE FROM unidad WHERE id=$id";
		if ($con->query($query))
		{
			echo "Registro borrado correctamente.  [: )";
		}
		else
		{
			echo "Error de eliminacion. [: (";
		}
	}
	if ($action == "usuario") {
		$id=$_GET['id'];
		$query="DELETE FROM usuario WHERE id=$id";
		if ($con->query($query))
		{
			echo "Registro borrado correctamente.  [: )";
		}
		else
		{
			echo "Error de eliminacion. [: (";
		}
	}
	if ($action == "Curso") {
		$id=$_GET['id'];

		$querys="SELECT * FROM curso WHERE id=$id";
		$res=$db->query($querys);
		while ($fila=$res->fetch_array()) {
			$nombre=$fila['nombre'];
			$departamento=$fila['departamento'];
			$unidad=$fila['unidad'];
		}

		$query="DELETE FROM curso WHERE id=$id";
		if ($con->query($query))
		{
			echo "Curso borrado correctamente";
		}
		else
		{
			echo "Error de eliminacion del curso";
		}
		$query="DELETE FROM dnc WHERE curso='$nombre' and departamento='$departamento' and unidad='$unidad'";
		if ($con->query($query))
		{
			echo "DNC borrado correctamente";
		}
		else
		{
			echo "Error de eliminacion en DNC";
		}
	}
	if ($action == "DelDNC") {
		$cursoDnc=$_GET['cursoDnc'];
		$unid=$_GET['unid'];
		$depa=$_GET['depa'];
		$query="DELETE FROM dnc WHERE curso='$cursoDnc' and departamento='$depa' and unidad='$unid'";
		if ($con->query($query))
		{
			echo "DNC borrado correctamente";
		}
		else
		{
			echo "Error de eliminacion en DNC";
		}
	}
	if ($action == "DelLista") {
		$id=$_GET['id'];
		$query="DELETE FROM listas WHERE id=$id";
		if ($con->query($query))
		{
			$query="DELETE FROM trabajadorcurso WHERE idlista=$id";
			if ($con->query($query))
			{
				echo "Lista Borrada correctamente";
			}
			else
			{
				echo "Error de eliminacion";
			}
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
	if ($action == "vaciarAvisos") {
		$query="TRUNCATE aviso";
		if ($con->query($query))
		{
			echo "Vaciado exitoso";
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
	if ($action == "vaciarErrores") {
		$query="TRUNCATE errores";
		if ($con->query($query))
		{
			echo "Vaciado exitoso";
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
	if ($action == "EliminarImagen") {
		$id=$_GET['id'];

		$query="SELECT * FROM fotos where id_foto=$id";
		$res=$db->query($query);
		while ($fila=$res->fetch_array()) {
			$nombre=$fila['nombre_foto'];
		}
		unlink("../photos/".$nombre);

		$query="DELETE from fotos where id_foto=$id";
		if ($con->query($query))
		{
			echo "Eliminacion exitosa";
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
	if ($action == "DelTrabajador") {
		$id=$_GET['id'];

		$query="DELETE from trabajador where id=$id";
		if ($con->query($query))
		{
			echo "Eliminacion exitosa";
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
	if ($action == "usuariojd") {
		$id=$_GET['id'];
		$query="DELETE FROM departamento WHERE id=$id";
		if ($con->query($query))
		{
			$query="DELETE FROM usuario WHERE idDepartamento=$id";
			if ($con->query($query))
			{
				echo "Registro borrado correctamente.";
			}
			else
			{
				echo "Error de eliminacion.";
			}
		}
		else
		{
			echo "Error de eliminacion.";
		}
	}
	if ($action == "EliminarRubro") {
		$id=$_GET['id'];

		$query="DELETE from rubro where id=$id";
		if ($con->query($query))
		{
			echo "Eliminacion exitosa";
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
	if ($action == "EliminarNorma") {
		$id=$_GET['id'];

		$query="DELETE from normas where id=$id";
		if ($con->query($query))
		{
			echo "Eliminacion exitosa";
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
	if ($action == "EliminarUsuarioJD") {
		$id=$_GET['id'];

		$query="DELETE from departamento where id=$id";
		if ($con->query($query))
		{
			echo "Eliminacion exitosa";
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
	if ($action == "EliminarTrabajadorDNC") {
		$id=$_GET['id'];

		$query="DELETE from dnc where id=$id";
		if ($con->query($query))
		{
			echo "Eliminacion exitosa";
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
	if ($action == "EliminarCursoPres") {
		$id=$_GET['id'];

		$query="DELETE from presupuestado where id=$id";
		if ($con->query($query))
		{
			echo "Eliminacion exitosa";
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
	if ($action == "EliminarEmpPre") {
		$id=$_GET['id'];

		$query="DELETE from emplpres where id=$id";
		if ($con->query($query))
		{
			echo "Eliminacion exitosa";
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
	if ($action == "EliminarPL") {
		$id=$_GET['id'];

		$query="DELETE from trabajadorcurso where id=$id";
		if ($con->query($query))
		{
			echo "Eliminacion exitosa";
		}
		else
		{
			echo "Error de eliminacion";
		}
	}
?>