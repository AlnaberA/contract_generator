<?php
  include("../../secure.php");
  include("../../database.php");
  $userid = $user['usid'];

  $contract_type = $_POST['contract_type'];

  $sql = "UPDATE CONTRACT_GEN_USERS
          SET CONTRACT_TYPE = '{$contract_type}'
          WHERE USER_ID = '{$userid}'";

  $db->query($sql);

?>
