<?
	include("../database.php");

	$delete = "DELETE FROM CONTRACT_GEN_USERS WHERE PERMISSIONS = 'PLANNER' AND TYPE = 'AUTO'";
	$db->query($delete);

	$sql = "SELECT * FROM EMPLOYEE@MAXIMO WHERE TITLE = 'Planner Planning & Design' OR TITLE = 'Planner Development Coordinator' OR TITLE = 'Assoc Planner Office Field Coordinator' ORDER BY GIVEN_NAME";

	while($row = $prod->fetch($sql)) {
            
        $full_name = $row['GIVEN_NAME'] . ' ' . $row['LAST_NAME'];
        $full_name = str_replace("'", "&#39;", $full_name);
                
		$sql2 = "INSERT INTO CONTRACT_GEN_USERS (NAME, USER_ID, PERMISSIONS, NOTIFICATION, TYPE, NOTIFICATION_STATUS) 
		    	 VALUES ('{$full_name}', '{$row['USER_ID']}', 'PLANNER', 'Welcome to the new CIAC Contracts Dashboard! Notifications will appear here in the future', 'AUTO', 'OPEN')";

		$db->query($sql2);
	}
?>