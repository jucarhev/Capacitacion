 <?php 
	include("../conf/conf.php");
	$limite=$_POST['limite'];
	$unidad=$_POST['unidad'];
	$t="Jefe de departamento";
	$query="SELECT * FROM usuario WHERE tipouser='$t' and unidad='$unidad' ";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT d.id,departamento,u.unidad,nombreuser,usuario,password,tipouser 
	FROM usuario AS u join departamento AS d ON u.idDepartamento=d.id 
	where tipouser like '%Jefe de departamento%' and u.unidad='$unidad' LIMIT $limite, 20";
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontrados
 	<hr class="margen">
<table  width="100%" cellspacing="0" >
	<tr>
		<td colspan="6" class="center"><h1 class="h1">Departamentos y usuarios</h1></td>
	</tr>
	<tr>
		<td colspan="5">
			<div class="espacio">
				<form action="" method="post" onsubmit="buscadorD();return false">
					<input type="text" id="buscador" value="" placeholder="Ingrese el nombre del departamento" class="espacio1" required>
					<input type="submit" name="" value="Buscar" class="espacio2">
				</form>
			</div>
		</td>
		<td class="center">
			<a href="" title="" onclick="abrirventanajc(1);return false"><img src="../../assets/img/add.png" alt=""></a>
		</td>
	</tr>
</table>
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">Departamento</td>
		<td class="Cabeza">Unidad</td>
		<td class="Cabeza">Nombre usuario</td>
		<td class="Cabeza">Usuario</td>
		<td class="Cabeza">Password</td>
		<td class="Cabeza">Tipo de usuario</td>
		<td colspan="3" class="Cabeza">Operaciones</td>
	</tr>
<?php
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			echo "<td>".$fila['departamento']."</td>";
			echo "<td>".$fila['unidad']."</td>";
			echo "<td>".$fila['nombreuser']."</td>";
			echo "<td>".$fila['usuario']."</td>";
			echo "<td>".$fila['password']."</td>";			
			echo "<td>".$fila['tipouser']."</td>";
			echo "<td><a href='' onclick='ventana2(".$fila['id'].",3);return false' title='Ver registros'><img src='../../assets/img/lupa.png'></a></td>";
			echo "<td><a href='' onclick='ventana(".$fila['id'].",3);return false' title='Editar registro'><img src='../../assets/img/pencil.png'></a></td>";
			echo "<td><a href='' onclick='EliminarUsuarioJD(".$fila['id'].");return false' title='Dar de baja el registros'><img src='../../assets/img/del.png'></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "<hr>";
	if ($limite>0) {
		$limit=$limite- 20;
		echo "<aside class=\"anterior\" onclick=\"DepartamentoUser(".$limit.")\"><img src='../../assets/img/anterior.png'></aside>";
	}else
	{
		echo "<aside class=\"anteriorvacio\"></aside>";
	}
	
	if ($limite<$total- 20) {
		$limit=$limite+ 20;
		echo "<aside class=\"siguiente\" onclick=\"DepartamentoUser(".$limit.")\"><img src='../../assets/img/siguiente.png'></aside>";
	}
	else{
		echo "<aside class=\"siguientevacio\"></aside>";
	}
?>