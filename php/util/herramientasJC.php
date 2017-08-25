<?php 
include("../conf/conf.php");
	$unidad=$_POST['unidad'];
	$user=$_POST['user'];
	$query="SELECT * FROM usuario WHERE usuario='$user' and unidad='$unidad'";
    $res=$db->query($query);
    while ($fila=$res->fetch_array()) {
        echo "<div style='text-align:right;'>";
        echo "Nombre del usuario<input type='text' value='".$fila['nombreuser']."' disabled><br><br>";
        echo "Usuario<input type='text' value='".$fila['usuario']."' disabled><br><br>";
        echo "Password<input type='text' value='".$fila['password']."' disabled><br><br>";
        echo "Tipo de usuario<input type='text' value='".$fila['tipouser']."' disabled><br><br>";
        echo "Unidad<input type='text' value='".$fila['unidad']."' disabled><br><br>";
        $anio=$fila['anio'];
        $idUser=$fila['id'];
        echo "</div>";
    }
 ?>