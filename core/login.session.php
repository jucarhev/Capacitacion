<?php
require_once "class.session.php";

if( isset($_POST["email"]) and isset($_POST["password"]) ) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if( $email == '' or $password =='' ){
		echo "Falta un dato";
	}else{
		session_start();
		$_SESSION['usuario'] = $email;
		header("Location: ../");
		die();
	}

}else{
	echo "string";
}
?>