<?php
	function getAdminIDs($db){
		$sql = "SELECT * FROM CONTRACT_GEN_USERS WHERE PERMISSIONS = 'ADMIN' ORDER BY NAME";

		$admin_id = array();
		while($row = $db->fetch($sql)){
			array_push($admin_id, $row['USER_ID']);
		}

		return $admin_id;
	}

	function getSupervisorIDs($db){
		$supervisors = array();
		$sql = "SELECT * FROM CONTRACT_GEN_USERS WHERE PERMISSIONS = 'SUPERVISOR' ORDER BY NAME";

		while($sv = $db->fetch($sql)){
			array_push($supervisors, $sv['USER_ID']);
		}

		return $supervisors;
	}

	function getUserIDs($db){
		$users = array();
		$sql = "SELECT * FROM CONTRACT_GEN_USERS";

		while($row = $db->fetch($sql)){
		  array_push($users, $row['USER_ID']);
		}

		return $users;
	}

	//Get all data for all users
	function getAllUserData($db){
		$users_all = array();
		$sql = "SELECT * FROM CONTRACT_GEN_USERS";

		while($row = $db->fetch($sql)){
			array_push($users_all, $row);
		}

		return $users_all;
	}

	//Get the number of the current supervisor's pending contracts
	function getPendingCount($userid, $db){
		$pending = 0;
		$contract_type = getUserContractType($userid, $db);

		if ($contract_type == "ciac"){
			$sql = "SELECT * FROM CONTRACT_GEN_CIO2 WHERE STATUS = 'PENDING'";
		}

		else if ($contract_type == "ar"){
			$sql = "SELECT * FROM CONTRACT_GEN_AR WHERE STATUS = 'PENDING'";
		}

		while($row = $db->fetch($sql)){
			$pending++;
		}

		return $pending;
	}

	//Get the number of the current user's assigned contracts
	function getAssignedCount($userid, $db){
		$assigned = 0;
		$sql2 = "SELECT * FROM CONTRACT_GEN_CIO2 WHERE STATUS = 'ASSIGNED' AND SAVED_BY = '{$userid}'";

		while ($row2 = $db->fetch($sql2)){
			$assigned++;
		}

		return $assigned;
	}

	//Get all planners from database
	function getPlanners($prod){
		$planners = array();
		$sql = "SELECT * FROM EMPLOYEE@MAXIMO WHERE TITLE = 'Planner Planning & Design' OR TITLE = 'Planner Development Coordinator' OR TITLE = 'Assoc Planner Office Field Coordinator' ORDER BY GIVEN_NAME";

		while($row = $prod->fetch($sql)) {
			array_push($planners, $row['GIVEN_NAME'].' '.$row['LAST_NAME']);
		}

		return $planners;
	}

	function getPlannersFromAdmin($db){
		$planners = array();
		$sql = "SELECT * FROM CONTRACT_GEN_USERS WHERE PERMISSIONS = 'PLANNER' ORDER BY NAME";

		while($row = $db->fetch($sql)){
			array_push($planners, $row);
		}

		return $planners;

	}

	function getUserContractType($userid, $db){
		$sql = "SELECT * FROM CONTRACT_GEN_USERS WHERE USER_ID = '{$userid}'";
		$row = $db->fetch($sql);

		return $row['CONTRACT_TYPE'];
	}

?>
