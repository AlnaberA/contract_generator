<?
	include("../../../../database.php");
	$today = date("m/d/Y", strtotime("now"));

	$power_supply = $_POST['power_supply'];
	$distribution = $_POST['distribution'];
	$base_fuel = $_POST['base_fuel'];
	$service_charge = $_POST['service_charge'];

	$sql = "UPDATE CONTRACT_GEN_CIO2_VARS
			SET POWER_SUPPLY = '{$power_supply}',
				DISTRIBUTION = '{$distribution}',
				BASE_FUEL = '{$base_fuel}',
				SERVICE_CHARGE = '{$service_charge}'
			WHERE ID = '1'";

	$db->query($sql);

	$sql = "UPDATE CONTRACT_GEN_USERS
			SET NOTIFICATION = 'The standard allowance variables were last updated on ".$today."',
				NOTIFICATION_STATUS = 'OPEN'
			WHERE PERMISSIONS = 'ADMIN' OR PERMISSIONS = 'PLANNER' OR PERMISSIONS = 'SUPERVISOR'";

	$db->query($sql);
?>