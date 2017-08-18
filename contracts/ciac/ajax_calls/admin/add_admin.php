<?
  	include("../../../../database.php");

	$name = $_POST['name'];
	$userid = $_POST['id'];

	$sql = "INSERT INTO CONTRACT_GEN_USERS (NAME, USER_ID, PERMISSIONS, NOTIFICATION, TYPE, NOTIFICATION_STATUS) 
		    VALUES ('{$name}', '{$userid}', 'ADMIN', 'Welcome to the new CIAC Contracts Dashboard! Notifications will appear here in the future', 'MANUAL', 'OPEN')";

	$db->query($sql);
?>