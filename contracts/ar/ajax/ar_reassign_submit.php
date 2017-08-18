<?php
    require_once('../../../secure.php');
    include("../../../database.php");
    
    $user_id = $_POST['user_id'];
    $btn_id = $_POST['btn_id'];
    
   $sql = "SELECT * FROM EMPLOYEE@MAXIMO WHERE USER_ID = '{$user_id}'";
   $row = $prod->fetch($sql);
   
   $creator_id = $user_id;
   $creator_name = $row['GIVEN_NAME'] . ' ' . $row['LAST_NAME'];
   $creator_title = $row['TITLE'];
   $creator_phone = $row['TELEPHONE_NUMBER'];
   $creator_email = $row['EMAIL_ID'];
   
   $sql = "UPDATE CONTRACT_GEN_AR 
           SET CREATED_BY = '{$creator_name}',
           CREATOR_TITLE = '{$creator_title}',
           CREATOR_ID = '{$creator_id}',
           CREATOR_PHONE = '{$creator_phone}',
           CREATOR_EMAIL = '{$creator_email}'
           WHERE ID = '{$btn_id}'";
           
   $db->query($sql);
?>