<?php
	$unidad=$_POST['unidad'];
	$anio=date('Y');	
?>
<fieldset class="fieldset">
	<legend class="legend">Generar Reporte</legend>
	<form action="../tabla/Corporativo.php" method="GET" accept-charset="utf-8" target="_blank">
		Mes:
		<select name="mesReporte" required>
            <option value="ENERO">ENERO</option>
            <option value="FEBRERO">FEBRERO</option>
            <option value="MARZO">MARZO</option>
            <option value="ABRIL">ABRIL</option>
            <option value="MAYO">MAYO</option>
            <option value="JUNIO">JUNIO</option>
            <option value="JULIO">JULIO</option>
            <option value="AGOSTO">AGOSTO</option>
            <option value="SEPTIEMBRE">SEPTIEMBRE</option>
            <option value="OCTUBRE">OCTUBRE</option>
            <option value="NOVIEMBRE">NOVIEMBRE</option>
            <option value="DICIEMBRE">DICIEMBRE</option>
        </select>
        A&ntilde;o: 
        <input type="text" name="anioReporte" id="anioreporte2"  value="<?php echo $anio+1;?>" required>
        <input type="hidden" name="Unidad" value="<?php echo $unidad; ?>">
        <input type="submit" name="" value="Generar" class="btn-primary">
	</form>
    <input type="submit" name="" value="Compilar" class="btn-primary" onclick="Compilar();return false">
</fieldset>
<div id="compilador"></div>