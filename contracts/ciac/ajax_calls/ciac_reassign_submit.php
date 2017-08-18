<?php
    require_once('../../../secure.php');
    include("../../../database.php");
    
    $user_id = $_POST['user_id'];
    $btn_id = $_POST['btn_id'];
    
   $sql = "SELECT * FROM EMPLOYEE@MAXIMO WHERE USER_ID = '{$user_id}'";
   $row = $prod->fetch($sql);
   
   $planner_id = $user_id;
   $planner_name = $row['GIVEN_NAME'] . ' ' . $row['LAST_NAME'];
   $planner_title = $row['TITLE'];
   $planner_phone = $row['TELEPHONE_NUMBER'];
   $planner_email = $row['EMAIL_ID'];
   
   $sql_update = "UPDATE CONTRACT_GEN_CIO2
           SET PLANNER_NAME = '{$planner_name}',
           PLANNER_TITLE = '{$planner_title}',
           PLANNER_ID = '{$planner_id}',
           PLANNER_PHONE = '{$planner_phone}',
           PLANNER_EMAIL = '{$planner_email}'
           WHERE ID = '{$btn_id}'";
           
   $db->query($sql_update);
?>