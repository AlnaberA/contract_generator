<?php 
	require_once('../../../secure.php');
	include("../../../database.php");
	$userId = $user['usid'];
	$name = $user['name'];

	$getEmployee = "SELECT * FROM EMPLOYEE@MAXIMO WHERE USER_ID = '{$userId}'";
	$row = $prod->fetch($getEmployee);

	$name_cust = $_POST['name_cust'];
	$attention = $_POST['attention'];
	$address_cust = $_POST['address_cust'];
	$city_cust = $_POST['city_cust'];
	$state_cust = $_POST['state_cust'];
	$zip_cust = $_POST['zip_cust'];
	$ar_estimate = $_POST['ar_estimate'];
	$address_site = $_POST['address_site'];
	$place_site = $_POST['place_site'];
	$type_site = $_POST['type_site'];
	$project_description = $_POST['project_description'];
	$county = $_POST['county'];
	$voltage = $_POST['voltage'];
	$phase = $_POST['phase'];
	$dwg_num = $_POST['dwg_num'];
	$dwg_date = $_POST['dwg_date'];
	$service_center = $_POST['service_center'];
	$region = $_POST['region'];
	$work_description = $_POST['work_description'];
	$today = date("m/d/Y", strtotime("now"));
	$supervisor = $row['SUPERVISOR_USER_ID'];
	$comments = $_POST['comments'];
        $wonum = $_POST['wonum'];
        $creator_name = $_POST['creator_name'];
        $creator_id = $_POST['creator_id'];
        $creator_title = $_POST['creator_title'];
        $creator_phone = $_POST['creator_phone'];
        $creator_email = $_POST['creator_email'];

	$sql = "INSERT INTO CONTRACT_GEN_AR (ID, CUST_NAME, ATTENTION, CUST_ADDRESS, CUST_CITY, CUST_STATE, CUST_ZIP, SITE_ADDRESS, SITE_PLACE, SITE_TYPE, SITE_COUNTY, PROJECT_DESC, VOLTAGE, PHASE, DRAW_NUM, DRAW_DATE, SERVICE_CENTER, REGION, ESTIMATE, WORK_DESCRIPTION, DATE_SUBMITTED, DATE_APPROVED, STATUS, SUPERVISOR, SUPERVISOR_SIGNATURE, CREATED_BY, CREATOR_ID, CREATOR_TITLE, CREATOR_PHONE, CREATOR_EMAIL, WONUM) 
    		VALUES (seq_contracts.nextval, '{$name_cust}', '{$attention}', '{$address_cust}', '{$city_cust}', '{$state_cust}', '{$zip_cust}', '{$address_site}', '{$place_site}', '{$type_site}', '{$county}', '{$project_description}', '{$voltage}', '{$phase}', '{$dwg_num}', '{$dwg_date}', '{$service_center}', '{$region}', '{$ar_estimate}', '{$work_description}', '{$today}', '', 'PENDING', '{$supervisor}', '', '{$creator_name}', '{$creator_id}', '{$creator_title}', '{$creator_phone}', '{$creator_email}', '{$wonum}')";

        $db->query($sql);


     //SEND EMAIL TO SUPERVISOR HERE
     //Use $comments variable to send the comments in the email to the supervisor
?>