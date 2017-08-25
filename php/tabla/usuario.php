<?php 
	include("../conf/conf.php");
	$limite=$_POST['limite'];
	$t="Jefe de capacitacion";
	$query="SELECT * FROM usuario WHERE tipouser='$t'";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT  * FROM usuario WHERE tipouser='Jefe de capacitacion' LIMIT $limite, 20  ";
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontrados
 	<hr class="margen">
<table  width="100%" cellspacing="0" >
	<tr>
		<td colspan="6" class="center"><h1 class="h1">Usuarios</h1></td>
	</tr>
	<tr>
		<td colspan="5">
			<div class="espacio">
				<form action="" method="post" onsubmit="buscadorU();return false">
					<input type="text" id="buscadorUsuario" value="" placeholder="Ingrese el nombre del usuario" class="espacio1" required>
					<input type="submit" name="" value="Buscar" class="espacio2">
				</form>
			</div>
		</td>
		<td class="center">
			<a href="" title="" onclick="abrirventana(2);return false"><img src="../../img/add.png" alt=""></a>
		</td>
	</tr>
</table>
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">Nombre</td>
		<td class="Cabeza">Usuario</td>
		<td class="Cabeza">Password</td>
		<td class="Cabeza">Unidad</td>
		<td class="Cabeza">Tipo de usuario</td>
		<td colspan="3" class="Cabeza">Operaciones</td>
	</tr>
<?php
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			echo "<td>".$fila['nombreuser']."</td>";
			echo "<td>".$fila['usuario']."</td>";
			echo "<td>".$fila['password']."</td>";
			echo "<td>".$fila['unidad']."</td>";
			echo "<td>".$fila['tipouser']."</td>";
			echo "<td><a href='' onclick='ventana2(".$fila['id'].",2);return false' title='Ver registros'><img src='../../img/lupa.png'></a></td>";
			echo "<td><a href='' onclick='ventana(".$fila['id'].",2);return false' title='Editar registro'><img src='../../img/pencil.png'></a></td>";
			echo "<td><a href='' onclick='EliminarUsuario(".$fila['id'].");return false' title='Dar de baja el registros'><img src='../../img/del.png'></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "<hr>";
	if ($limite>0) {
		$limit=$limite- 20;
		echo "<aside class=\"anterior\" onclick=\"cargaTablaTrabajadores(".$limit.")\"><img src='../../img/anterior.png'></aside>";
	}else
	{
		echo "<aside class=\"anteriorvacio\"></aside>";
	}
	
	if ($limite<$total- 20) {
		$limit=$limite+ 20;
		echo "<aside class=\"siguiente\" onclick=\"cargaTablaTrabajadores(".$limit.")\"><img src='../../img/siguiente.png'></aside>";
	}
	else{
		echo "<aside class=\"siguientevacio\"></aside>";
	}
?>