<?php
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$anio=$_POST['anio'];
	$dep=$_POST['departR'];
?>
<table  width="100%" cellspacing="0" >
	<tr>
		<td colspan="6" class="center"><h1 class="h1">DNC</h1></td>
	</tr>
	<tr>
		<td class="center" colspan="2">
			<a href="" title="" onclick="ventanajd(5);return false"><img src="../../img/add.png" alt=""></a>
		</td>
		<td colspan="2">
			<a href="" title="" onclick="DNCArchivados();return false"><img src="../../img/archivos.png" alt=""></a>
		</td>
		<td colspan="2">
			 <?php echo "<a href='../doc/dncfinal.php?unidad=$unidad&dep=$dep&anio=$anio' title='Pasar DNC al plan general' target='_blank'>
                            <img src='../../img/bajar.png'></a>"; ?>
		</td>
	</tr>
</table>
</table>
<table width="100%" cellspacing="0" border="1">
		<tr>
			<td class="Cabeza">Curso</td>
			<td class="Cabeza">Enero</td>
			<td class="Cabeza">Febrero</td>
			<td class="Cabeza">Marzo</td>
			<td class="Cabeza">Abril</td>
			<td class="Cabeza">Mayo</td>
			<td class="Cabeza">Junio</td>
			<td class="Cabeza">Julio</td>
			<td class="Cabeza">Agosto</td>
			<td class="Cabeza">Septiembre</td>
			<td class="Cabeza">Octubre</td>
			<td class="Cabeza">Noviembre</td>
			<td class="Cabeza">Diciembre</td>
		</tr>
		<?php 
			include("../conf/conf.php");
			$unidad=$_POST['unidad'];
			$depa=$_POST['departR'];

			$querys="SELECT distinct curso FROM dnc WHERE unidad='$unidad' and departamento='$depa' AND status='Si' and anio='$anio'";
			$res=$db->query($querys);
			if ($res->num_rows>0) {
			while ($fila=$res->fetch_array()) {
				echo "<tr>";
				echo "<td>".$fila['curso']."</td>";
				$cursos=$fila['curso'];
				echo "<input type='hidden' value='".$cursos."' id='cursoDnc'>";
				$Mar="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro  WHERE t.unidad='$unidad' and d.departamento='$depa' and curso='$cursos' and d.status='Si' and anio='$anio' and mes='Marzo'";
				$Abr="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro  WHERE t.unidad='$unidad' and d.departamento='$depa' and curso='$cursos' and d.status='Si' and anio='$anio' and mes='Abril'";
				$May="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro  WHERE t.unidad='$unidad' and d.departamento='$depa' and curso='$cursos' and d.status='Si' and anio='$anio' and mes='Mayo'";
				$Jun="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro  WHERE t.unidad='$unidad' and d.departamento='$depa' and curso='$cursos' and d.status='Si' and anio='$anio' and mes='Junio'";
				$Jul="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro  WHERE t.unidad='$unidad' and d.departamento='$depa' and curso='$cursos' and d.status='Si' and anio='$anio' and mes='Julio'";
				$Ago="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro  WHERE t.unidad='$unidad' and d.departamento='$depa' and curso='$cursos' and d.status='Si' and anio='$anio' and mes='Agosto'";
				$Sep="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro  WHERE t.unidad='$unidad' and d.departamento='$depa' and curso='$cursos' and d.status='Si' and anio='$anio' and mes='Septiembre'";
				$Oct="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro  WHERE t.unidad='$unidad' and d.departamento='$depa' and curso='$cursos' and d.status='Si' and anio='$anio' and mes='Octubre'";
				$Nov="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro  WHERE t.unidad='$unidad' and d.departamento='$depa' and curso='$cursos' and d.status='Si' and anio='$anio' and mes='Noviembre'";
				$Dic="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro  WHERE t.unidad='$unidad' and d.departamento='$depa' and curso='$cursos' and d.status='Si' and anio='$anio' and mes='Diciembre'";
				
				$Marzo=$db->query($Mar);
				$Abril=$db->query($Abr);
				$Mayo=$db->query($May);
				$Junio=$db->query($Jun);
				$Julio=$db->query($Jul);
				$Agosto=$db->query($Ago);
				$Septiembre=$db->query($Sep);
				$Octubre=$db->query($Oct);
				$Noviembre=$db->query($Nov);
				$Diciembre=$db->query($Dic);

				echo "<td style='text-align: right; padding:1px 2px;''>";
				$Ene="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro 
				WHERE t.unidad='$unidad' and d.departamento='$depa' and anio='$anio' and mes='Enero' and d.status='Si' and curso='$cursos'";
				$Enero=$db->query($Ene);
					while ($row=$Enero->fetch_array()){
						$idT=$row['id'];
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}					
					}
				echo "</td>";
				echo "<td style='text-align: right; padding:1px 2px;''>";
				$Feb="SELECT tipotrabajador,nombre,apaterno,amaterno,d.id,nocobro FROM dnc as d join trabajador as t on d.nocobro=t.numerocobro  WHERE t.unidad='$unidad' and d.departamento='$depa' and curso='$cursos' and d.status='Si' and anio='$anio' and mes='Febrero'";
				$Febrero=$db->query($Feb);
					while ($row=$Febrero->fetch_array()){
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}						
					}
				echo "</td>";
				echo "<td style='text-align: right; padding:1px 2px;''>";
					while ($row=$Marzo->fetch_array()){
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}						
					}
				echo "</td>";
				echo "<td style='text-align: right; padding:1px 2px;''>";
					while ($row=$Abril->fetch_array()){
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
					}
				echo "</td>";
				echo "<td style='text-align: right; padding:1px 2px;''>";
					while ($row=$Mayo->fetch_array()){
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}	
					}
				echo "</td>";
				echo "<td style='text-align: right; padding:1px 2px;''>";
					while ($row=$Junio->fetch_array()){
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}	
					}
				echo "</td>";
				echo "<td style='text-align: right; padding:1px 2px;''>";
					while ($row=$Julio->fetch_array()){
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}	
					}
				echo "</td>";
				echo "<td style='text-align: right; padding:1px 2px;''>";
					while ($row=$Agosto->fetch_array()){
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}	
					}
				echo "</td>";
				echo "<td style='text-align: right; padding:1px 2px;''>";
					while ($row=$Septiembre->fetch_array()){
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}	
					}
				echo "</td>";
				echo "<td style='text-align: right; padding:1px 2px;''>";
					while ($row=$Octubre->fetch_array()){
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}	
					}
				echo "</td>";
				echo "<td style='text-align: right; padding:1px 2px;''>";
					while ($row=$Noviembre->fetch_array()){
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}	
					}
				echo "</td>";
				echo "<td style='text-align: right; padding:1px 2px;''>";
					while ($row=$Diciembre->fetch_array()){
						$idT=$row['id'];
						$tipo=$row['tipotrabajador'];
						$name=$row['nombre'];
						$firstname=$row['apaterno'];
						$lastname=$row['amaterno'];
						if ($tipo == "No sindicalizado") {
							echo "<span class='azul'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}
						else{
							echo "<span class='rojo'>".$row['nocobro']."</span><a href='#' title='".$name." ".$firstname." ".$lastname."'><img src='../../img/ver.png'></a><br>";
						}	
					}
				echo "</td>";
				}
			}
			echo "</table>";
		?>
</table>