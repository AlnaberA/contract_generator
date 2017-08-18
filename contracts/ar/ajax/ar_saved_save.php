<?php
        require_once('../../../secure.php');
	include("../../../database.php");
	$userId = $user['usid'];
	$name = $user['name'];

        $btn_id = $_POST['id'];

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
        $wonum = $_POST['wonum'];
        $creator_name = $_POST['creator_name'];
        $creator_id = $_POST['creator_id'];
        $creator_title = $_POST['creator_title'];
        $creator_phone = $_POST['creator_phone'];
        $creator_email = $_POST['creator_email'];


	$sql = "UPDATE CONTRACT_GEN_AR 
            SET CUST_NAME = '{$name_cust}',
            ATTENTION = '{$attention}',
            CUST_ADDRESS = '{$address_cust}',
            CUST_CITY = '{$city_cust}',
            CUST_STATE = '{$state_cust}',
            CUST_ZIP = '{$zip_cust}',
            SITE_ADDRESS =  '{$address_site}',
            SITE_PLACE = '{$place_site}',
            SITE_TYPE = '{$type_site}',
            SITE_COUNTY = '{$county}',
            PROJECT_DESC = '{$project_description}',
            VOLTAGE = '{$voltage}',
            PHASE = '{$phase}',
            DRAW_NUM = '{$dwg_num}',
            DRAW_DATE = '{$dwg_date}',
            SERVICE_CENTER = '{$service_center}',
            REGION = '{$region}',
            ESTIMATE = '{$ar_estimate}',
            WORK_DESCRIPTION = '{$work_description}',
            DATE_SUBMITTED = '{$today}',
            WONUM = '{$wonum}',
            CREATED_BY = '{$creator_name}',
            CREATOR_ID = '{$creator_id}',
            CREATOR_TITLE = '{$creator_title}',
            CREATOR_PHONE = '{$creator_phone}',
            CREATOR_EMAIL = '{$creator_email}'
            WHERE ID = '{$btn_id}'";


     $db->query($sql);
     
?>