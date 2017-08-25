<?php 
	include("../conf/conf.php");
	$unidad=$_POST['unid'];
	$query="SELECT logo FROM unidad where nombre='$unidad'";
    $res=$db->query($query);
    while ($fila=$res->fetch_array()) {
        $imagen=$fila['logo'];
    }
    echo "<img src='../photos/".$imagen."' height='96' width='277'>";
 ?>