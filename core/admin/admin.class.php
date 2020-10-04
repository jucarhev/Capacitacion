<?php 
require_once "../../config/var.php"; 
require_once "../comodo.php";

$adm = new admin($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE, $SOCKET, $PORT);

$action = $_POST['action'];

if($action == 'create'){
	# $_POST['name'];
	$result = $adm->save_company($_POST['name']);
	echo $result;
}elseif ($action == 'update') {
	# code...
}elseif ($action == 'delete') {
	# code...
}elseif ($action == 'select') {
	# code...
}


/**
 * 
 */
class admin{
	var $connection;
	
	function __construct($host, $user, $pass, $base, $socket, $port ){
		$this->connection = new Comodo($host, $user, $pass, $base, $socket, $port);
	}

	function save_company($name){
		$data = array(
			"name"=>$name
		);
		return $this->connection->create( 'companies', $data );
	}
}


?>