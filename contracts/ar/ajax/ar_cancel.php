<?php
	require_once('../../../secure.php');
	include("../../../database.php");
        $id=$_POST['id'];
        
        $sql = "UPDATE CONTRACT_GEN_AR SET STATUS='SAVED' WHERE ID= '{$id}'"; 
        $db->query($sql);
?>