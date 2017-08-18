<?
	include("../../../database.php");

	$ann_use = $_POST['ann_use'];

	if ($ann_use == ''){
		echo '';
	}

	else{
		$sql = "SELECT * FROM CONTRACT_GEN_CIO2_VARS";
		$vars = $db->fetch($sql);


		$power_supply = $vars['POWER_SUPPLY'];
		$distribution = $vars['DISTRIBUTION'];
		$base_fuel = $vars['BASE_FUEL'];
		$service_charge = $vars['SERVICE_CHARGE'];
		
		$full_serviceless_fuel = $power_supply + $distribution + $base_fuel;
		$two_yr_service_charge = $service_charge * 24;

		$std_allowance = ($ann_use * ($full_serviceless_fuel * 2)) + $two_yr_service_charge;
		$std_allowance = round ($std_allowance, 2);

		echo $std_allowance;
	}

?>