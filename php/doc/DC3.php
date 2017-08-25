<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DC-3</title>
	<link rel="stylesheet" href="">
</head>
<body>
	

<?php

	$e=base64_decode($_GET['sata01']);
	$idtrabajadro=$_GET['sata02'];
	$idlistas=$_GET['sata03'];
	$fechainicio=$_GET['sata04'];
	$fechafin=$_GET['sata05'];
	$duracionw=$_GET['sata06'];
	require('../conf/conf.php');
	$query = "SELECT * from trabajador where id=$idtrabajadro";
	$lista= $con->query($query);
	while($row = $lista->fetch_array())
	{		
		$trabajadro=$row['nombre'];
		$apaterno=$row['apaterno'];
		$amaterno=$row['amaterno'];
		$curp=$row['curp'];
		$unidad=$row['unidad'];
	}

	$anioinicio=substr($fechainicio , 0, 4);
	$mesinicio=substr($fechainicio , 5, 2);
	$diainicio=substr($fechainicio , 8, 4);

	$aniofin=substr($fechafin , 0, 4);
	$mesfin=substr($fechafin , 5, 2);
	$diafin=substr($fechafin , 8, 4);



	$curpt1=substr($curp , 0, 1);
	$curpt2=substr($curp , 1, 1);
	$curpt3=substr($curp , 2, 1);
	$curpt4=substr($curp , 3, 1);
	$curpt5=substr($curp , 4, 1);
	$curpt6=substr($curp , 5, 1);
	$curpt7=substr($curp , 6, 1);
	$curpt8=substr($curp , 7, 1);
	$curpt9=substr($curp , 8, 1);
	$curpt10=substr($curp , 9, 1);
	$curpt11=substr($curp , 10, 1);
	$curpt12=substr($curp , 11, 1);
	$curpt13=substr($curp , 12, 1);
	$curpt14=substr($curp , 13, 1);
	$curpt15=substr($curp , 14, 1);
	$curpt16=substr($curp , 15, 1);
	$curpt17=substr($curp , 16, 1);
	$curpt18=substr($curp , 17, 1);

	$query = "SELECT * from listas as l join trabajadorcurso as tc on l.id=tc.idlista where l.id=$idlistas";
	$lista= $con->query($query);
	while($row0 = $lista->fetch_array())
	{
		$curso=$row0['nombrecurso'];
	}

	$query = "SELECT * from unidad where nombre='$unidad'";
	$lista= $con->query($query);
	while($row1 = $lista->fetch_array())
	{
		$actividad=$row1['actividad'];
	}
?>
<center>
<h3><br><br>FORMATO DC-3 <br>
CONSTANCIA DE HABILIDADES LABORALES</h3></center>
<table width='100%' height='70' border='1'>

  <tr bgcolor='black'> <td colspan='2'><center><font color='white'>DATOS DEL TRABAJADOR</font></center></td></tr>
  <tr> 
  	<td colspan='2'>
  		<font size='2'>
  			Nombre (Anotar apellido paterno, apellido materno y nombre(s))
  		</font> 
  		<br><?php echo $trabajadro;?> <?php echo $apaterno;?> <?php echo $amaterno;?>
  	</td>
  </tr>

  <tr> <td><font size='2'>Clave &Uacute;nica de Registro de Poblaci&oacute;n </font>
  <br>
  <?php echo $curpt1."|".$curpt2."|".$curpt3."|".$curpt4."|".$curpt5."|".$curpt6."|".$curpt7."|".$curpt8."|".$curpt9."|".$curpt10."|".$curpt11."|".$curpt12."|".$curpt13."|".$curpt14."|".$curpt15."|".$curpt16."|".$curpt17."|".$curpt18; ?>
  </td> <td>
  <font size='2'>Ocupaci&oacute;n Espec&iacute;fica (Cat&aacute;logo Nacional de Ocupaciones)1/</font>
  <br>
  <input style="border:0px;" type="text" placeholder="" size="60"></td></tr>
  </table><br>

  <table width='100%' border='1'>
  <tr bgcolor='black'> <td colspan='2'><center><font color='white'>DATOS DE LA EMPRESA</font></center></td></tr>
  <tr> <td colspan='2'><font size='2'> Nombre o raz&oacute;n social (En caso de persona f&iacute;sica, anotar apellido paterno, apellido materno y nombre(s))</font> <br>
  COMPANIA MINERA AUTLAN S.A.B. DE C.V.  UNIDAD <?php echo $unidad; ?></td></tr>

  <tr> 
  <td><font size='2'>Registro Federal de Contribuyentes con homoclave (SHCP)</font><br>
      &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;M&nbsp;|&nbsp;A&nbsp;|&nbsp;U&nbsp;|&nbsp;-&nbsp;|&nbsp;5&nbsp;|&nbsp;3&nbsp;|&nbsp;1&nbsp;|&nbsp;0&nbsp;|&nbsp;0&nbsp;|
      &nbsp;5&nbsp;|&nbsp;-&nbsp;|&nbsp;M&nbsp;|&nbsp;3&nbsp;|&nbsp;9
  </td>
  
  <td><font size='2'>Registro Patronal ante el I.M.S.S. (Una letra o n&uacute;mero y 10 d&iacute;gitos)</font><br>
      <input type="text" size="1" style="border:0px;">|<input type="text" size="1" style="border:0px;">|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|  
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|       
      
  </td>
  </tr>

  <tr> <td colspan='2'><font size='2'> Actividad o giro principal  <br>
     <?php echo $actividad;?></td>
  </tr>
</table><br>

<table width='100%' height='70' border='1'>

  <tr bgcolor='black'> <td colspan='9'><center><font color='white'>DATOS DEL PROGRAMA DE CAPACITACI&Oacute;N Y ADIESTRAMIENTO</font></center></td></tr>
  <tr> <td colspan='9'> <font size='2'>Nombre del curso </font><br><?php echo $curso;?>

  </td> </tr>
  
  <tr> 
      <td><font size='2'>Duraci&oacute;n en horas </font><br><?php echo $duracionw; ?></td>
      <td><font size='2'>Periodo de <br> ejecuci&oacute;n de</font></td>
      <td><font size='2'>A&ntilde;o </font><br><?php echo $anioinicio; ?></td>
      <td><font size='2'>Mes </font><br><?php echo $mesinicio; ?></td>
      <td><font size='2'>Dia </font><br><?php echo $diainicio; ?></td>
      <td><br><font size='2'>a</font></td>
      <td><font size='2'>A&ntilde;o </font><br><?php echo $aniofin; ?></td>
      <td><font size='2'>Mes </font><br><?php echo $mesfin; ?></td>
      <td><font size='2'>Dia </font><br><?php echo $diafin; ?></td>      
  </tr>
  <tr> <td colspan='9'><font size='2'>&Aacute;rea tem&aacute;tica del curso 2/</font>
  <br>
  	<input style="border:0px;" type="text" placeholder="" size="60" list="areastem">
</td>
</tr>
  <tr> <td colspan='9'><font size='2'>Agente capacitador (Externo o interno, seg&uacute;n corresponda)</font>
  	<br>
  		<input style="border:0px;" type="text" placeholder="" size="60" list="tipoCap">
  </td></tr>
</table><br>

<table width='100%' height='70' border='1'>
<tr>
	<td>
		<table style="text-align:center;" width='100%'>
			<tr>
				<td colspan="3" >
					Los datos se asientan en esta constancia bajo protesta de decir la verdad, apercibidos de la responsabilidad en que <br>
      				incurre todo aquel que no se conduce con  verdad.
      			</td>
			</tr>
			<tr>
				<td rowspan="2">
					Capacitador<br>
					<input type="text"  placeholder="Escriba el nombre del representante aqu&iacute;" style="border:0px;text-align:center;background-color:#fff;" size="40">
					<br><br>
      			</td>
      			<td colspan="2">
					Representantes de la Comisi&oacute;n Mixta de Capacitaci&oacute;n y Adiestramiento
      			</td>
			</tr>
			<tr>
      			<td>
					Por la empresa<br>
					<input type="text"  placeholder="Escriba el nombre del representante aqu&iacute;" style="border:0px;text-align:center;" size="40">
					<br><br>
      			</td>
      			<td>
					Por los trabajadores<br>
					<input type="text"  placeholder="Escriba el nombre del representante aqu&iacute;" style="border:0px;text-align:center;" size="40" >
					<br><br>
      			</td>
			</tr>
			<tr>
      			<td>
					
      			</td>
      			<td>
					
      			</td>
      			<td>
					
      			</td>
			</tr>
			<tr>
      			<td>
					_____________________________
      			</td>
      			<td>
					_____________________________
      			</td>
      			<td>
					_____________________________
      			</td>
			</tr>
			<tr>
      			<td>
					Nombre y Firma
      			</td>
      			<td>
					Nombre y Firma
      			</td>
      			<td>
					Nombre y Firma
      			</td>
			</tr>
		</table>
  	</td>
</tr>
</table><br>
<div align='left'><b><font size='2'>INSTRUCCIONES</font></b><br>
<font size='1'> 
&nbsp;-Llenar a m&aacute;quina o con letra de molde.<br>
&nbsp;-Deber&aacute; entregarse al trabajador dentro de los veinte d&iacute;as h&aacute;biles siguientes al t&eacute;rmino del curso de capacitaci&oacute;n aprobado.<br> 

<u>1</u>/Las &aacute;reas y sub&aacute;reas ocupaciones del Cat&aacute;logo Nacional de Ocupaciones se encuentran disponibles en el reverso de este formato y en la p&aacute;gina www.stps.gob.mx<br> 
2/ Las &aacute;reas tem&aacute;ticas de los cursos se encuentran disponibles en el reverso de este formato y en la p&aacute;gina www.stps.gob.mx 
</div> 


<datalist id="tipoCap">
	<option value="Interno">Interno</option>
	<option value="Externo">Externo</option>
</datalist>

<datalist id="areastem">
	<option value="Produccion General">Produccion General</option>
	<option value="Administracion, contabilidad y economia">Administracion, contabilidad y economia</option>
	<option value="Comercializacion">Comercializacion</option>
	<option value="Seguridad">Seguridad</option>
	<option value="Desarrollo Personal y Familiar">Desarrollo Personal y Familiar</option>
	<option value="Uso de Tecnologias de la Informacion y Comunicacion">Uso de Tecnologias de la Informacion y Comunicacion</option>
	<option value="Participacion Social">Participacion Social</option>
</datalist>
</body>
</html>