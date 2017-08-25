<?php 
	include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$depa=$_POST['depa'];
 ?>
 <form onsubmit="Guardarlistas();return false">
 	<div class="inputT">
		<span class="label">Capacitacion:</span>
		<select id="ComboCursoCambio" onchange="ComboCurso();return false" required>
			<option value="">Elija una opcion</option>
			<option value="Planeada">Planeada</option>
			<option value="No planeada">No planeada</option>
		</select>
	</div>
	<div class="inputT" id="ComboCurso">
	</div>
	<div class="inputT">
		<span class="label">Hora incio:</span>
		<select id="HoraInicio" required>
			<option value="07">07:00 A.M.</option>
			<option value="08">08:00 A.M.</option>
			<option value="09">09:00 A.M.</option>
			<option value="10">10:00 A.M.</option>
			<option value="11">11:00 A.M.</option>
			<option value="12">12:00 P.M.</option>
			<option value="13">01:00 P.M.</option>
			<option value="14">02:00 P.M.</option>
			<option value="15">03:00 P.M.</option>
			<option value="16">04:00 P.M.</option>
			<option value="17">05:00 P.M.</option>
			<option value="18">06:00 P.M.</option>
			<option value="19">07:00 P.M.</option>
			<option value="20">08:00 P.M.</option>
		</select>
		<select id="MinutoInicio" required>
			<option value="00">00</option>
			<option value="05">05</option>
			<option value="10">10</option>
			<option value="15">15</option>
			<option value="20">20</option>
			<option value="25">25</option>
			<option value="30">30</option>
			<option value="35">35</option>
			<option value="40">40</option>
			<option value="45">45</option>
			<option value="50">50</option>
			<option value="55">55</option>
		</select>
	</div>
	<div class="inputT">
		<span class="label">Hora fin:</span>
		<select id="HoraFin" required>
			<option value="07">07:00 A.M.</option>
			<option value="08">08:00 A.M.</option>
			<option value="09">09:00 A.M.</option>
			<option value="10">10:00 A.M.</option>
			<option value="11">11:00 A.M.</option>
			<option value="12">12:00 P.M.</option>
			<option value="13">01:00 P.M.</option>
			<option value="14">02:00 P.M.</option>
			<option value="15">03:00 P.M.</option>
			<option value="16">04:00 P.M.</option>
			<option value="17">05:00 P.M.</option>
			<option value="18">06:00 P.M.</option>
			<option value="19">07:00 P.M.</option>
			<option value="20">08:00 P.M.</option>
		</select>
		<select id="MinutoFin" required>
			<option value="00">00</option>
			<option value="05">05</option>
			<option value="10">10</option>
			<option value="15">15</option>
			<option value="20">20</option>
			<option value="25">25</option>
			<option value="30">30</option>
			<option value="35">35</option>
			<option value="40">40</option>
			<option value="45">45</option>
			<option value="50">50</option>
			<option value="55">55</option>
		</select>
	</div>
	<div class="inputT"> <span class="label">Duracion:</span><input type="text" id="Duracion" onclick="calcularHoras();return false" required></div>
	<div class="inputT"><span class="label">Fecha inicio:</span><input type="date" required placeholder="" id="FechaInicioLista"></div>
    <div class="inputT"><span class="label">Fecha fin:</span><input type="date" required placeholder="" id="FechaFinLista"></div>
    <div class="inputT"><span class="label">Lugar:</span><input type="text" id="lugarCurso"></div>
    <div class="inputT"><span class="label">Instructor:</span><input type="text" name="" value="" placeholder="Nombre del intructor" id="instructor" required></div>
        <?php
                $mes=date('m');
                if ($mes == 1) {
                    $Mes1="Enero";
                }if ($mes == 2) {
                    $Mes1="Febrero";
                }if ($mes == 3) {
                    $Mes1="Marzo";
                }if ($mes == 4) {
                    $Mes1="Abril";
                }if ($mes == 5) {
                    $Mes1="Mayo";
                }if ($mes == 6) {
                    $Mes1="Junio";
                }if ($mes == 7) {
                    $Mes1="Julio";
                }if ($mes == 8) {
                    $Mes1="Agosto";
                }if ($mes == 9) {
                    $Mes1="Septiembre";
                }if ($mes == 10) {
                    $Mes1="Octubre";
                }if ($mes == 11) {
                    $Mes1="Noviembre";
                }if ($mes == 12) {
                    $Mes1="Diciembre";       
                }
            ?>
        <div class="inputT"><span class="label">Mes:</span><input type="text"  id="MesLista" value="<?php echo $Mes1;?>" disabled></div>
        <div><input type="hidden"  id="statusLista" value="Espera"></div> 
        <hr>
        <input type="submit" class="btn-primary" value="Guardar y pasar lista" >       
 </form>
 <div id="Pases">
 
 </div>	