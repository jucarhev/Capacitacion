<?php
include("../conf/conf.php");
    $destino = "../photos/";
    if(isset($_FILES['image'])){
 
        $nombre = $_FILES['image']['name'];
        $temp   = $_FILES['image']['tmp_name'];
 
        // subir imagen al servidor
        if(move_uploaded_file($temp, $destino.$nombre))
        {
            $query = "INSERT INTO fotos VALUES('','".$nombre."')";
            $con->query($query)
        }
    }
?>