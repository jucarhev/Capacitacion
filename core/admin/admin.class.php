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
	$name = $_POST['name'];
	$id = $_POST['id'];
	$result = $adm->update_data($id, $name);
	echo $result;

}elseif ($action == 'delete') {
	$result = $adm->delete_company($_POST['id']);

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

	function delete_company($id){
		return $this->connection->delete( 'companies', 'id='.$id );
	}

	function update_data($id, $name){
		$data = array(
			"name"=>$name
		);
		$where = "id=".$id;
		return $this->connection->update('companies', $data, $where);
		//Esto retornara un Ok o un Error
	}
}


?>