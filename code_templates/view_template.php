<?php
	include("../../static/mpdf/mpdf.php");
  	include("../../database.php");

	$id = $_GET['id'];
	$preview = $_GET['preview'];

	$sql = "SELECT * FROM CONTRACT_GEN_AR WHERE ID = '{$id}'";
  	$row = $db->fetch($sql);

  	//variable declaration from $row goes here:
  	$name_cust = $row['CUST_NAME'];

  	//Declare new mPDF object and add watermark if this is only a preview
  	$mpdf=new mPDF();
  	if ($preview == "true"){
  		$mpdf->SetWatermarkText("PREVIEW");
		$mpdf->showWatermarkText = true;
		$mpdf->watermark_font = 'DejaVuSansCondensed';
		$mpdf->watermarkTextAlpha = 0.06;
  	}

  	//HTML for pdf goes here:
	$html = "<h1>PDF VIEW TEMPLATE HERE</h1>";
	$html .= "------------------------------";
	$html .= "<h2>Customer Name: {$name_cust}";
	$html .= "<h5 style='color: red;'>CSS works too!";

	//Write html to pdf
	$mpdf->WriteHTML($html);
	$mpdf->Output();
?>