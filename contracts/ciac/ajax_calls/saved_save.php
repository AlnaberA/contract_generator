<?
       include("../../../database.php");
       require_once('../../../secure.php');
       $userId = $user['usid'];

       $name_cust = $_POST['name_cust'];
       $address_cust = $_POST['address_cust'];
       $city_cust = $_POST['city_cust'];
       $state_cust = $_POST['state_cust'];
       $zip_cust = $_POST['zip_cust'];

       $address_site = $_POST['address_site'];
       $city_site = $_POST['city_site'];
       $city_twn_vil = $_POST['city_twn_vil'];

       $cc_wo_num = $_POST['cc_wo_num'];
       $agreement_num = $_POST['agreement_num'];
       $dwg_num = $_POST['dwg_num'];
       $dwg_date = $_POST['dwg_date'];
       $voltage = $_POST['voltage'];
       $phase =  $_POST['phase'];
       $sic_code =  $_POST['sic_code'];

       $name_planner = $_POST['name_planner'];
       $id_planner = $_POST['id_planner'];
       $title_planner = $_POST['title_planner'];
       $phone_planner = $_POST['phone_planner'];
       $email_planner = $_POST['email_planner'];
       $region_planner = $_POST['region_planner'];
       $address_planner_line1 = $_POST['address_planner_line1'];
       $address_planner_line2 = $_POST['address_planner_line2'];

       $trench_length = $_POST['trench_length'];
       $add_trans_load = $_POST['add_trans_load'];
       $winter_const = $_POST['winter_const'];

       $ann_use = $_POST['ann_use'];
       $ciac_credit =  $_POST['ciac_credit'];

       $construct_cost = $_POST['construct_cost'];
       $permits_row = $_POST['permits_row'];
       $ug_vs_oh =  $_POST['ug_vs_oh'];
       $add_construct_cost = $_POST['add_construct_cost'];
       $add_construct_cost_reason =  $_POST['add_construct_cost_reason'];
       $system_mod_cost = $_POST['system_mod_cost'];

       $id = $_POST['id'];
       $today = date("m/d/Y", strtotime("now"));

 	$sql = "UPDATE CONTRACT_GEN_CIO2 SET CUST_NAME = '{$name_cust}',
              CUST_ADDRESS = '{$address_cust}',
              CUST_CITY = '{$city_cust}',
              CUST_STATE = '{$state_cust}',
              CUST_ZIP = '{$zip_cust}',
              SITE_ADDRESS = '{$address_site}',
              SITE_CITY_NAME = '{$city_site}',
              SITE_CITY_TWN_VIL = '{$city_twn_vil}',
              WO_NUM = '{$cc_wo_num}',
              AGREE_NUM = '{$agreement_num}',
              DRAW_NUM = '{$dwg_num}',
              DRAW_DATE = '{$dwg_date}',
              VOLTAGE = '{$voltage}',
              PHASE = '{$phase}',
              SIC_CODE = '{$sic_code}',
              PLANNER_NAME = '{$name_planner}',
              PLANNER_ID = '{$id_planner}',
              PLANNER_TITLE = '{$title_planner}',
              PLANNER_PHONE = '{$phone_planner}',
              PLANNER_EMAIL = '{$email_planner}',
              PLANNER_REGION = '{$region_planner}',
              PLANNER_ADDRESS_LINE1 = '{$address_planner_line1}',
              PLANNER_ADDRESS_LINE2 = '{$address_planner_line2}',
              TRENCH_LENGTH = '{$trench_length}',
              TRANSFORMER_LOAD = '{$add_trans_load}',
              WINTER_CONSTRUCT = '{$winter_const}',
              ANNUAL_USAGE = '{$ann_use}',
              OPTION2_CREDIT = '{$ciac_credit}',
              COST_CONSTRUCT = '{$construct_cost}',
              PERMITS = '{$permits_row}',
              UGOH_EXTENSIONS = '{$ug_vs_oh}',
              ADD_CONSTRUCT_COST = '{$add_construct_cost}',
              ADD_CONSTRUCT_DESC = '{$add_construct_cost_reason}',
              SYSTEM_MOD_COST = '{$system_mod_cost}',
              DATE_SUBMITTED = '{$today}',
              SUPERVISOR = '{$supervisor_id}',
              SAVED_BY = '{$userId}'
              WHERE ID = '{$id}'";

       $db->query($sql);


?>