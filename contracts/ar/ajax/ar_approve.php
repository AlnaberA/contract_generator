<?php
	include("../../../database.php");
	$today = date("m/d/Y", strtotime("now"));

	$id = $_POST['id'];
        $supervisor_sig = $_POST['supervisor_sig'];
        $comment = $_POST['comment'];

	$sql = "UPDATE CONTRACT_GEN_AR 
			SET STATUS = 'APPROVED',
				DATE_APPROVED = '{$today}',
                                SUPERVISOR_SIGNATURE = '{$supervisor_sig}'  
			WHERE ID = '{$id}'";

	$db->query($sql);

	$sql2 = "SELECT * FROM CONTRACT_GEN_AR WHERE ID = '{$id}'";
	$row2 = $db->fetch($sql2);

	$to_email = $row2['CREATOR_EMAIL'];

	$body = "<div style='font-size: 13pt;'><h3>Contract Approved</h3>";

	$body .= "<p><u>Customer Name:</u> ".$row2['CUST_NAME']."<br>
	           <u>Site Address:</u> ".$row2['SITE_ADDRESS']."<br>
	           <u>Submission Date:</u> ".$row2['DATE_SUBMITTED']."<br><br>;
                    <b>Comments from supervisor:</b><br>".$comment."<br><br>";

	$body .= "Click <a href='http://lnx825:63404/index.php'>here</a> to view your contracts<br>";

	//Header for email 'from'
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
	$headers .= 'From: Contract Generator' . "\r\n";

	$test = "daoud.sleiman@dteenergy.com";
	//$to_email
	mail($test, "Contract approved for ".$row2['CUST_NAME'], $body, $headers);

?>