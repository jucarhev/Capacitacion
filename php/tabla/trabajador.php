 <?php 
	include("../conf/conf.php");
	$limite=$_POST['limite'];
	$unidad=$_POST['unidad'];
	$t="Jefe de departamento";
	$query="SELECT * FROM trabajador WHERE  unidad='$unidad' ";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT * FROM trabajador WHERE  unidad='$unidad' LIMIT $limite, 20";
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontrados
 	<hr class="margen">
<table  width="100%" cellspacing="0" >
	<tr>
		<td colspan="6" class="center"><h1 class="h1">Trabajadores</h1></td>
	</tr>
	<tr>
		<td colspan="5">
			<div class="espacio">
				<form action="" method="post" onsubmit="buscadorTrabajador();return false">
					<input type="text" id="buscaTrabajador" value="" placeholder="Ingrese el numero de cobro" class="espacio1" required>
					<input type="submit" name="" value="Buscar" class="espacio2">
				</form>
			</div>
		</td>
		<td class="center">
			<a href="" title="" onclick="abrirventanajc(4);return false"><img src="../../assets/img/add.png" alt=""></a>
		</td>
	</tr>
</table>
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">N. Cobro</td>
		<td class="Cabeza">N. Ficha</td>
		<td class="Cabeza">Nombre</td>
		<td class="Cabeza">A. Paterno</td>
		<td class="Cabeza">A. Materno</td>
		<td class="Cabeza">Departamento</td>
		<td colspan="3" class="Cabeza">Operaciones</td>
	</tr>
<?php
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			echo "<td>".$fila['numerocobro']."</td>";
			echo "<td>".$fila['numeroficha']."</td>";
			echo "<td>".$fila['nombre']."</td>";
			echo "<td>".$fila['apaterno']."</td>";
			echo "<td>".$fila['amaterno']."</td>";
			echo "<td>".$fila['departamento']."</td>";
			echo "<td><a href='' onclick='ventana2(".$fila['id'].",4);return false' title='Ver registros'><img src='../../assets/img/lupa.png'></a></td>";
			echo "<td><a href='' onclick='ventana(".$fila['id'].",4);return false' title='Editar registro'><img src='../../assets/img/pencil.png'></a></td>";
			echo "<td><a href='' onclick='EliminarTrabajador(".$fila['id'].");return false' title='Dar de baja el registros'><img src='../../assets/img/del.png'></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "<hr>";
	if ($limite>0) {
		$limit=$limite- 20;
		echo "<aside class=\"anterior\" onclick=\"trabajador(".$limit.")\"><img src='../../assets/img/anterior.png'></aside>";
	}else
	{
		echo "<aside class=\"anteriorvacio\"></aside>";
	}
	
	if ($limite<$total- 20) {
		$limit=$limite+ 20;
		echo "<aside class=\"siguiente\" onclick=\"trabajador(".$limit.")\"><img src='../../assets/img/siguiente.png'></aside>";
	}
	else{
		echo "<aside class=\"siguientevacio\"></aside>";
	}
?>