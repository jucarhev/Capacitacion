<table id="tablavacia" border="1" width="100%">
	<tr>
		<td class="Cabeza">Numero</td>
		<td class="Cabeza">Evento de capacitacion</td>
		<td class="Cabeza">Fecha inicio</td>
		<td class="Cabeza">Fecha fin</td>
		<td class="Cabeza">Duracion en hrs.</td>
		<td class="Cabeza">Instructor</td>
		<td class="Cabeza">A&ntilde;o</td>
	</tr>


<?php
	include ("../conf/conf.php");
	$nc=0;
	$unidad=$_POST['unidad'];
	$buscar=$_POST['busqueda'];
	$query="SELECT id,numerocobro FROM trabajador WHERE unidad='$unidad' AND numerocobro=$buscar";
	$result=$con->query($query);
	if ($row=$result->fetch_array()) 
    {
    	$idtr=$row['id'];
    	$nc=$row['numerocobro'];
    }
    if ($nc == 0) {
    	echo "No encontrado";
    }else{
		$n=0;
		$query="SELECT * FROM listas as ls join trabajadorcurso as tc on ls.id=tc.idlista where tc.idtrabajador=$idtr";
		$result=$con->query($query);
		while($row1=$result->fetch_array()) 
	    {
	    	$n=$n+1;
	    	echo "<tr>";
	    	echo "<td>".$n."</td>";
	    	echo "<td>".$row1['nombrecurso']."</td>";
	    	echo "<td>".$row1['fechainicio']."</td>";
	    	echo "<td>".$row1['fechafin']."</td>";
	    	echo "<td>".$row1['duracion']."</td>";
	    	echo "<td>".$row1['instructor']."</td>";
	    	echo "<td>".$row1['anio']."</td>";
	    	echo "</tr>";
	    }
	}

?>
</table> 
<script type="text/javascript">
	$(function() {
		$('a[class="tblank"]').click( function() {
			window.open( $(this).attr('href') );
			return false;
		});
	});
</script>
