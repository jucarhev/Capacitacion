<table id="tablavacia" border="1" width="100%">
	<tr>
		<td class="Cabeza">Numero</td>
		<td class="Cabeza">Evento de capacitacion</td>
		<td class="Cabeza">Fecha inicio</td>
		<td class="Cabeza">Fecha fin</td>
		<td class="Cabeza">Duracion en hrs.</td>
		<td class="Cabeza">Instructor</td>
		<td class="Cabeza">A&ntilde;o</td>
		<td class="Cabeza">DNC</td>
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
		if ($row1=$result->fetch_array()) 
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
	    	$sata01=base64_encode($row1['nombrecurso']);
	    	$sata02=$row1['idtrabajador'];
	    	$sata03=$row1['idlista'];
	    	$sata04=$row1['fechainicio'];
	    	$sata05=$row1['fechafin'];
	    	$sata06=$row1['duracion'];
	    	echo "<td><a href='../doc/DC3.php?sata01=$sata01&sata02=$sata02&sata03=$sata03&sata04=$sata04&sata05=$sata05&sata06=$sata06' class='tblank' rel='external' title='Abrir en nueva ventana'>DNC</a></td>";

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
