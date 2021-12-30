 <?php 
	include("../conf/conf.php");
	$id=$_POST['id'];
	$query="SELECT * FROM listas where id=$id";
	$res=$db->query($query);
	$total=$res->num_rows;
	$paginas=ceil($total/ 20);
	// echo $paginas;
	$query="SELECT * FROM listas where id=$id";
	$res=$db->query($query);
?>
<?php echo $total; ?> registros encontrados
<table  width="100%" cellspacing="0" >
	<tr>
		<td colspan="6" class="center"><h1 class="h1">Listas</h1></td>
	</tr>
	<tr>
		<td colspan="5">
			<div class="espacio">
				<form action="" method="post" onsubmit="buscadorListas();return false">
					<input type="text" id="buscarLista" value="" placeholder="Ingrese el nombre del usuario" class="espacio1" required>
					<input type="submit" name="" value="Buscar" class="espacio2">
				</form>
			</div>
		</td>
		<td class="center">
			<a href="" title="Agregar nueva lista" onclick="ventanajd(6);return false"><img src="../../assets/img/add.png" alt=""></a>
			<a href="" title="Ver listas anteriores" onclick="ListasOk(0);return false"><img src="../../assets/img/listas.jpg" alt=""></a>
		</td>
	</tr>
</table>
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td class="Cabeza">Id</td>
		<td class="Cabeza">Unidad</td>
		<td class="Cabeza">Curso</td>
		<td class="Cabeza">Lugar</td>
		<td class="Cabeza">Instructor</td>
		<td class="Cabeza">duracion</td>
		<td class="Cabeza">Departamento</td>
		<td  class="Cabeza">Operaciones</td>
	</tr>
	<?php
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			echo "<td>".$fila['id']."</td>";
			echo "<td>".$fila['unidad']."</td>";
			echo "<td>".$fila['nombrecurso']."</td>";
			echo "<td>".$fila['lugar']."</td>";
			echo "<td>".$fila['instructor']."</td>";
			echo "<td>".$fila['duracion']."</td>";
			echo "<td>".$fila['departamento']."</td>";
			echo "<td><a href='' onclick='VerListas(".$fila['id'].");return false' title='Ver registros'><img src='../../assets/img/lupa.png'></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>
<hr>
<br>
<table  width="100%" cellspacing="0" border="1">
	<tr>
		<td colspan="6" class="Cabeza">Asistentes</td>
	</tr>
	<tr>
		<td class="Cabeza">Numero.</td>
		<td class="Cabeza">Numero Cobro</td>
		<td class="Cabeza">Numero Ficha</td>
		<td class="Cabeza">Nombre completo</td>
		<td class="Cabeza">Tipo de trabajador</td>
		<td class="Cabeza">Departamento</td>
	</tr>
	<?php
	$numb=0;
	$query="SELECT * FROM trabajadorcurso as tc join trabajador as t  on tc.idtrabajador=t.id where idlista=$id";
	$res=$db->query($query);
	if ($res->num_rows>0) {
		while ($fila=$res->fetch_array()) {
			echo "<tr>";
			$numb=$numb+1;
			echo "<td>".$numb."</td>";
			echo "<td>".$fila['numerocobro']."</td>";
			echo "<td>".$fila['numeroficha']."</td>";
			echo "<td>".$fila['nombre']." ".$fila['apaterno']." ".$fila['amaterno']."</td>";
			echo "<td>".$fila['tipotrabajador']."</td>";
			echo "<td>".$fila['departamento']."</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>