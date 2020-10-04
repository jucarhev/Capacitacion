<?php
require_once "../config/variables.php";

if( isset($_POST["email"]) and isset($_POST["password"]) ) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	if( $email == '' or $password =='' ){
		echo "Falta un dato";
	}else{
		 $result = $connection->read("select * from users where email='".$email."' and password='".sha1($password)."' limit 0,1"   );
		 if(count($result) == 1){
		 	session_start();	
			$_SESSION['usuario'] = $email;
			header("Location: ../");
			die();
		 }else{
		 	header("Location: ../login.php");
		 	die();
		 }
	}

}else{
	echo "string";
}
?>