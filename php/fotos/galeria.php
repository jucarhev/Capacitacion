<?php 
	include("../conf/conf.php");
	$query="SELECT * FROM fotos";
    $res=$db->query($query);
    while ($fila=$res->fetch_array()) {
        $imagen=$fila['nombre_foto'];
        $id=$fila['id_foto'];
        echo "<div class='ima-gal'>";
        echo "<img src='../photos/".$imagen."' height='96' width='273'><br>";
        echo $imagen."<br>";
        echo "<a href='#' title='' onclick='EliminarImagen(".$id.");return false' class='link1'>Eliminar</a>";
        echo "</div>";
    }
    
 ?>