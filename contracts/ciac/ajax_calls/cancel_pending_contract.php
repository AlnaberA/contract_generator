<?
	include("../../../database.php");

	$id = $_POST['id'];

	$sql = "UPDATE CONTRACT_GEN_CIO2 
			SET STATUS = 'SAVED'
			WHERE ID = '{$id}'"; 

	$db->query($sql);
?>