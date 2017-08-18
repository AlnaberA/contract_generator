<?
  require_once('../../../secure.php');
  $userId = $user['usid'];

  include("../../../database.php");

  $id = $_POST['id'];
  $new_planner = $_POST['planner'];

  $sql_get_new_planner =  "SELECT * FROM EMPLOYEES WHERE NAME = '{$new_planner}'";
  $row = $prod->fetch($sql_get_new_planner);

  $planner_name = $row['NAME'];
  $planner_id = $row['USID'];
  $planner_phone = $row['PHONE'];
  $planner_email = $row['EMAIL'];
  $planner_supervisor = $row['SUPERVISOR'];
  $planner_title = $row['TITLE'];

  $sql = "UPDATE CONTRACT_GEN_CIO2
          SET PLANNER_NAME = '{$planner_name}',
              PLANNER_ID = '{$planner_id}',
              PLANNER_PHONE = '{$planner_phone}',
              PLANNER_EMAIL = '{$planner_email}',
              SUPERVISOR = '{$planner_supervisor}',
              PLANNER_TITLE = '{$planner_title}'
          WHERE ID = '{$id}'";
          
  $db->query($sql);
  ?>
