<?
  require_once('../../../secure.php');
  $userId = $user['usid'];
  
  include("../../../database.php");

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
  $today = date("m/d/Y", strtotime("now"));

  $sql = "SELECT * FROM EMPLOYEE@MAXIMO WHERE USER_ID = '{$id_planner}'";
  $row = $prod->fetch($sql);

  $supervisor_planner = $row['SUPERVISOR_USER_ID'];

  $sql = "INSERT INTO CONTRACT_GEN_CIO2 (ID, CUST_NAME, CUST_ADDRESS, CUST_CITY, CUST_STATE, CUST_ZIP, SITE_ADDRESS, SITE_CITY_NAME, SITE_CITY_TWN_VIL, WO_NUM, AGREE_NUM, DRAW_NUM, DRAW_DATE, VOLTAGE, PHASE, SIC_CODE, PLANNER_NAME, PLANNER_ID, PLANNER_TITLE, PLANNER_PHONE, PLANNER_EMAIL, PLANNER_REGION, PLANNER_ADDRESS_LINE1, PLANNER_ADDRESS_LINE2, TRENCH_LENGTH, TRANSFORMER_LOAD, WINTER_CONSTRUCT, ANNUAL_USAGE, OPTION2_CREDIT, COST_CONSTRUCT, PERMITS, UGOH_EXTENSIONS, ADD_CONSTRUCT_COST, ADD_CONSTRUCT_DESC, SYSTEM_MOD_COST, DATE_SUBMITTED, DATE_APPROVED, STATUS, SUPERVISOR, SAVED_BY) 
    VALUES (seq_contracts.nextval, '{$name_cust}', '{$address_cust}', '{$city_cust}', '{$state_cust}', '{$zip_cust}', '{$address_site}', '{$city_site}', '{$city_twn_vil}', '{$cc_wo_num}', '{$agreement_num}', '{$dwg_num}', '{$dwg_date}', '{$voltage}', '{$phase}', '{$sic_code}', '{$name_planner}', '{$id_planner}', '{$title_planner}', '{$phone_planner}', '{$email_planner}', '{$region_planner}', '{$address_planner_line1}', '{$address_planner_line2}', '{$trench_length}', '{$add_trans_load}', '{$winter_const}', '{$ann_use}', '{$ciac_credit}', '{$construct_cost}', '{$permits_row}', '{$ug_vs_oh}', '{$add_construct_cost}', '{$add_construct_cost_reason}', '{$system_mod_cost}', '{$today}', '', 'SAVED', '{$supervisor_planner}', '{$userId}')";

  $db->query($sql);
  
?>