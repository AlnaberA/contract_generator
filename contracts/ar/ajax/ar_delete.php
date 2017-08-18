<?php
	require_once('../../../secure.php');
	include("../../../database.php");
        $id=$_POST['id'];
        
        $sql = "DELETE FROM CONTRACT_GEN_AR WHERE ID = '{$id}'"; 
        $db->query($sql);
?>