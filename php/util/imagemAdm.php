<?php 
	include("../conf/conf.php");
	$query="SELECT * FROM utilidades where id=1";
    $res=$db->query($query);
    while ($fila=$res->fetch_array()) {
        $imagen=$fila['logo'];
    }
    echo "<img src='../photos/".$imagen."' height='96' width='277'>";
 ?>