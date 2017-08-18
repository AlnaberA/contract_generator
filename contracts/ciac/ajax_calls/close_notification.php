<?
	include("../../../database.php");

	$userid = $_POST['userid'];

	$sql = "UPDATE CONTRACT_GEN_USERS SET NOTIFICATION_STATUS = 'CLOSED' WHERE USER_ID = '{$userid}'";
	$db->query($sql);

?>