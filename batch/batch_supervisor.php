<?
	include("../database.php");

	$delete = "DELETE FROM CONTRACT_GEN_USERS WHERE PERMISSIONS = 'SUPERVISOR' AND TYPE = 'AUTO'";
	$db->query($delete);

	$sql = "SELECT * FROM EMPLOYEE@MAXIMO WHERE TITLE = 'Supervisor - Regional Planning'";
	
	while($row = $prod->fetch($sql)){
            
                $full_name = $row['GIVEN_NAME'] . ' ' . $row['LAST_NAME'];
                
		$sql2 = "INSERT INTO CONTRACT_GEN_USERS (NAME, USER_ID, PERMISSIONS, NOTIFICATION, TYPE, NOTIFICATION_STATUS)
                     VALUES ('{$full_name}', '{$row['USER_ID']}', 'SUPERVISOR', 'Welcome to the new CIAC Contracts Dashboard! Notifications will appear here in the future', 'AUTO', 'OPEN')";

		$db->query($sql2);
	}
?>