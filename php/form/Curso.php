<style type="text/css">
		#meses
		{
			width: 110px;
			text-align: center;
			border: 1px solid #aaa;
			float: left;
			padding: 2px;
			margin: 2px 8px;
		}
		#contenedormeses
		{
			width: 420px;
			overflow: hidden;
			text-align:center;
		}
		#datos2
		{
			text-align: right;
			width: 50%;
			float: left;
		}
		#datos1
		{
			text-align: right;
			width: 100%;
			float: left;
		}
		#datos0
		{
			text-align: right;
			width: 520px;
			overflow: hidden;
		}
	</style>
<?php 

 ?>
 <form method="POST" action="" onsubmit="guardarCursoJD();return false">
 	<div class="inputT">
		<span class="label">A&ntilde;o:</span>
		<input type="text" id="anioCurso01" class="inputTT" value="<?php echo date('Y')+1; ?>" required disabled>
	</div>
	<div class="inputT">
		<span class="label">Lugar:</span>
		<input type="text" id="lugarcurso02" class="inputTT" placeholder="Lugar" required autofocus>
	</div>
	<div class="inputT">
		<span class="label">Instructor:</span>
		<input type="text" id="instructor04" class="inputTT" placeholder="Instructor" list="TipoAjCapac" required>
	</div>
	<div class="inputT">
		<span class="label">Rubro:</span>
		<select id="rubrocurso03" required onchange="ComboCurso2();return false">
		<option value="">Seleccione uno</option>
			<?php  
				include("../conf/conf.php");
				$unidad=$_POST['unidad'];
				$query="SELECT rubro, r.id FROM rubro as r join unidad as u on r.idunidad=u.id where nombre='$unidad'";

				$res=$db->query($query);
				while ($fila=$res->fetch_array()) 
				{
					$nombre=$fila['rubro'];
					$idnombre=$fila['id'];
					echo "<option value='".$nombre."'>".$nombre."</option>";
				}
			?>
		</select>
	</div>
	<div class="inputT">
		<span class="label">Nombre del curso:</span>
		<input type="text" id="ncurso05" class="inputTT" placeholder="Nombre del curso" required list="jilo">
	</div>
	<div class="inputT">
		<span class="label">Objetivos:</span>
		<input type="text" id="objetivos06" class="inputTT" placeholder="Objetivos" required>
	</div><hr><br>	
	<div style="text-align: center;">
		Meses y horas
	</div>
	<div id="contenedormeses">
			<div id="meses">Enero:<br/>
				<input type="text" size="1" placeholder="Hrs." id="EneroHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="EneroMin" onkeyUp="return ValNumero(this);">
			</div>
			<div id="meses">Febrero:<br/>
				<input type="text" size="1" placeholder="Hrs." id="FebreroHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="FebreroMin" onkeyUp="return ValNumero(this);">
			</div>
			<div id="meses">Marzo:<br/>
				<input type="text" size="1" placeholder="Hrs." id="MarzoHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="MarzoMin" onkeyUp="return ValNumero(this);">
			</div>
			<div id="meses">Abril:<br/>
				<input type="text" size="1" placeholder="Hrs." id="AbrilHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="AbrilMin" onkeyUp="return ValNumero(this);">
			</div>
			<div id="meses">Mayo:<br/>
				<input type="text" size="1" placeholder="Hrs." id="MayoHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="MayoMin" onkeyUp="return ValNumero(this);">
			</div>
			<div id="meses">Junio:<br/>
				<input type="text" size="1" placeholder="Hrs." id="JunioHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="JunioMin" onkeyUp="return ValNumero(this);">
			</div>
			<div id="meses">Julio:<br/>
				<input type="text" size="1" placeholder="Hrs." id="JulioHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="JulioMin" onkeyUp="return ValNumero(this);">
			</div>
			<div id="meses">Agosto:<br/>
				<input type="text" size="1" placeholder="Hrs." id="AgostoHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="AgostoMin" onkeyUp="return ValNumero(this);">
			</div>
			<div id="meses">Septiembre:<br/>
				<input type="text" size="1" placeholder="Hrs." id="SeptiembreHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="SeptiembreMin" onkeyUp="return ValNumero(this);">
			</div>
			<div id="meses">Octubre:<br/>
				<input type="text" size="1" placeholder="Hrs." id="OctubreHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="OctubreMin" onkeyUp="return ValNumero(this);">
			</div>
			<div id="meses">Noviembre:<br/>
				<input type="text" size="1" placeholder="Hrs." id="NoviembreHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="NoviembreMin" onkeyUp="return ValNumero(this);">
			</div>
			<div id="meses">Diciembre:<br/>
				<input type="text" size="1" placeholder="Hrs." id="DiciembreHrs" onkeyUp="return ValNumero(this);">
				<input type="text" size="1" placeholder="Min." id="DiciembreMin" onkeyUp="return ValNumero(this);">
			</div>
		</div>
		<hr><br>
			<select id="status10">
				<option value="1">No requiere presupuesto</option>
				<option value="0">Para presupuesto</option>
			</select>
			<input type="submit" name="" value="Guardar" class="btn-primary">
 </form>
 <datalist id="jilo">
</datalist>

<datalist id="TipoAjCapac">
	<option value="Interno">Interno</option>
	<option value="Externo">Externo</option>
</datalist>