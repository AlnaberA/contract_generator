<?
	include("../../../database.php");

	$id = $_POST['id'];

	$sql = "DELETE FROM CONTRACT_GEN_CIO2 WHERE ID = '{$id}'"; 

	$db->query($sql);
?>