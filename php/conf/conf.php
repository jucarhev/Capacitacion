<?php
	$hostname="localhost";
	$username="root";
	//coloque entre las comillas la contraseña del servidor 
	//ejemplo $password="contraseña";
	$password="";
	$dbname="scc";

	$con = new mysqli($hostname,$username,$password,$dbname);
	$db = new mysqli($hostname,$username,$password,$dbname);
?>