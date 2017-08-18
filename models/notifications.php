<?php 
	//Get notification data from database
	function getNotificationData($userid, $db){
		$sql = "SELECT * FROM CONTRACT_GEN_USERS WHERE USER_ID = '{$userid}'";
		$row = $db->fetch($sql);

		return $row;
	}

	//Reset all notifications to the default one
	function resetNotifications($db){
		$notifyString = "Welcome to the Contract Generator Dashboard. Notifications will appear here in the future.";

		$sql = "UPDATE CONTRACT_GEN_USERS
				SET NOTIFICATION = '{$notifyString}'
				WHERE TYPE = 'MANUAL' OR TYPE = 'AUTO'";

		$db->query($sql);
	}

	//Send a notification to all users
	function sendNotification($db, $notification){
		$sql = "UPDATE CONTRACT_GEN_USERS
				SET NOTIFICATION = '{$notification}'
				WHERE TYPE = 'MANUAL' OR TYPE = 'AUTO'";

		$db->query($sql);
	}

	//Send a notification to a particular userid
	function sendNotificationToID($db, $userid, $notification){
		$sql = "UPDATE CONTRACT_GEN_USERS
				SET NOTIFICATION = '{$notification}'
				WHERE USER_ID = '{$userid}'";

		$db->query($sql);
	}

	//Send a notification to a particular username
	function sendNotificationToUsername($db, $username, $notification){
		$sql = "UPDATE CONTRACT_GEN_USERS
				SET NOTIFICATION = '{$notification}'
				WHERE NAME = '{$username}'";

		$db->query($sql);
	}

	//Send a notification to a group of users with the same permission type
	function sendNotificationToPermissionType($db, $permissionType, $notification){
		$sql = "UPDATE CONTRACT_GEN_USERS
				SET NOTIFICATION = '{$notification}'
				WHERE PERMISSIONS = '{$permissionType}'";

		$db->query($sql);
	}

?>