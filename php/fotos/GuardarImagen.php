<?php
$cn = mysql_connect("localhost","root","");
mysql_select_db("scc", $cn);


    $destino = "../photos/";
    if(isset($_FILES['image'])){

        $nombre = $_FILES['image']['name'];
        $temp   = $_FILES['image']['tmp_name'];

        // subir imagen al servidor
        if(move_uploaded_file($temp, $destino.$nombre))
        {
            $query = mysql_query("INSERT INTO fotos VALUES('','".$nombre."')" ,$cn);
        }

        $query2 = mysql_query("SELECT * FROM fotos ORDER BY id_foto DESC", $cn);
	    while($row = mysql_fetch_array($query2))
	    {
	        echo  '<li>
	                <img src="php/photos/'.$row['nombre_foto'].'" />
	                <span>'.$row['nombre_foto'].'</span>
	                <span>'.$row['nombre_foto'].'</span>
	            </li>';
	    }
    }

?>