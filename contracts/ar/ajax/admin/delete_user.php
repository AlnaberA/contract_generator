<?
	include("../../../../database.php");

	$userid = $_POST['userid'];

	$sql = "DELETE FROM CONTRACT_GEN_USERS WHERE USER_ID = '{$userid}'"; 

	$db->query($sql);
?>