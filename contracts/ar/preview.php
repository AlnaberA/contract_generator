<?php
	include("../../static/mpdf/mpdf.php");
        
  	//variable declaration from $_POST object goes here:
  	$name_cust = $_POST['name_cust'];
        $attention = $_POST['attention'];
        $address_cust = $_POST['address_cust'];
	$city_cust = $_POST['city_cust'];
	$state_cust = $_POST['state_cust'];
	$zip_cust = $_POST['zip_cust'];
        
	$ar_estimate = $_POST['ar_estimate'];
        
	$address_site = $_POST['address_site'];
	$place_site = $_POST['place_site'];
	$type_site = $_POST['type_site'];
        
	$project_description = $_POST['project_description'];
	$county = $_POST['county'];
	$voltage = $_POST['voltage'];
	$phase = $_POST['phase'];
	$dwg_num = $_POST['dwg_num'];
	$dwg_date = $_POST['dwg_date'];
	$service_center = $_POST['service_center'];
	$region = $_POST['region'];
        
        $creator_name = $_POST['creator_name'];
        $creator_id = $_POST['creator_id'];
        $creator_title = $_POST['creator_title'];
        $creator_phone = $_POST['creator_phone'];
        $creator_email = $_POST['creator_email'];
        
        if(substr($creator_phone, 0, 3) == '248')
        {
            $address_line1 = "37849 Interchange Dr.";
            $address_line2 = "Farmington Hills, MI 48336";
        }
        else if(substr($creator_phone, 0, 3) == '313')
        {
            $address_line1 = "One Energy Plaza, Room 570 SB";
            $address_line2 = "Detroit, MI 48226";
        }
        else if(substr($creator_phone, 0, 3) == '586')
        {
            $address_line1 = "15600 19 Mile Rd.";
            $address_line2 = "Clinton Twp, MI 48038";
        }
        else if(substr($creator_phone, 0, 3) == '734')
        {
            $address_line1 = "8001 Haggerty Rd.";
            $address_line2 = "Belleville, MI 48111";
        }
        else if(substr($creator_phone, 0, 7) == '801.364')
        {
            $address_line1 = "3223 Ravenswood Rd.";
            $address_line2 = "Marysville, MI 48040";
        }
        else if(substr($creator_phone, 0, 7) == '801.667')
        {
            $address_line1 = "1100 Clark Rd";
            $address_line2 = "Lapeer, MI 48446";
        }
        else if(substr($creator_phone, 0, 3) == '989')
        {
            $address_line1 = "4100 Doerr Road";
            $address_line2 = "Cass City, MI 48726";
        }
        else
        {
            $address_line1 = "ERROR HAS OCCURED";
            $address_line2 = "INCORRECT FIELD SUBMITTED";
        }
        
	
        $work_description = $_POST['work_description'];
	$today = getdate();
        $wonum = $_POST['wonum'];

  	//Declare new mPDF object and add preview watermark
  	$mpdf=new mPDF('utf-8', 'A4');
	$mpdf->SetWatermarkText("PREVIEW");
	$mpdf->showWatermarkText = true;
	$mpdf->watermark_font = 'DejaVuSansCondensed';
	$mpdf->watermarkTextAlpha = 0.06;
        
  	//HTML for pdf goes here:
        //Page 1
	$html .= '<div style="font-family: arial; font-size: 10pt;">';
        $html .= '<p style="margin-left: 60%; margin-top: 0px;">' . "{$address_line1}";
        $html .= "<br>{$address_line2}</p>";
        
        $html .= '<br><p style="margin-left: 60%; margin-top: 0px;">';
        $html .= '<div style="text-align: right; margin-right: 100px; margin-bottom: 0px;"><img src="../../images/dte-logo.png" style="width:220px; height:45px;"></div>';
        $html .= '<p style="margin-left: 60%; margin-top: 0px;">';
        $html .= "{$today['weekday']}, {$today['month']} {$today['mday']}, {$today['year']}";
        
        $html .= '<p style="margin-right: 60%; margin-top: 0px;">';
        $html .= "<br>";
        $html .= "{$attention} <br>";
        $html .= "{$name_cust} <br>";
        $html .= "{$address_cust} <br>";
        $html .= "{$city_cust}, {$state_cust} {$zip_cust}";
        
        $html .= '<p style="margin-right: 40%; margin-top: 0px;">';
        $html .= "<b>Regarding: {$address_site}, {$place_site} {$type_site}</b>";
        
        $html .= '<p style="margin-right: 100%; margin-top: 0px;">';
        $html .= 'Enclosed are two (2) copies of the Accounts Receivable Agreement for your signature. The payment for this work is $'.number_format($ar_estimate, 2).' based on:';
        $html .= "<br><br>";
       
        $html .= "{$work_description}";
        $html .= "<br><br>";
        
        $html .= "Please return the signed agreement to me with a check made payable to DTE Energy. Keep the " . '"Customer Copy"' . " documents for your records. To ensure proper credit, the Agreement number should be indicated on your remitted check. When we receive the signed agreement and your check, we will proceed to schedule the work.";
        $html .= "<br><br>";
        $html .= "If you have any questions regarding this job, please feel free to contact me at the phone number or e-mail address indicated below.";
        $html .= "<br><br><br><br>";
        
        $html .= '<p style="margin-left: 60%; margin-top: 0px;">';
        $html .= "Sincerely,";
        $html .= "<br><br>";
        $html .= "{$creator_name} <br> {$creator_title} <br> {$creator_phone} <br> {$creator_email}";
        $html .= "<br><br><br>";
        
        $html .= '<p style="margin-right: 100%; margin-top: 0px;">';
        $html .= "Enclosures: <br> Two copies of the Accounts Receivable Agreement";
        
        $html .= '<pagebreak />'; //End Page 1
        
        //Page 2
        $html .= '<div style="text-align: right; margin-right: 0px; margin-bottom: 0px;"><img src="../../images/dte-logo.png" style="width:180px; height:35px;"></div><div style="float:left;"><b>Accounts Receivable Agreement</b></div>';
        $html .= "<b>No. {$wonum}</b>";
        $html .= "<br><br>";
        $html .= '<b>' . '"DTE Energy"'. " and " . '"Customer"' . " make this agreement for consideration of the promises in the agreement. </b><br>";
       // $html .= '<div class="row"><div class="col-sm-6">DTE</div><div class="col-sm-6">Customer</div></div>';
        $html .= '<div style="float: right;  width: 40%;">
				"<b><u>Customer is:</u></b>"<br>'
				.$name_cust.'<br>'
				.$address_cust.'<br>'.$city_cust.'&#44;&nbsp;'.$state_cust.'&nbsp;'.$zip_cust
			  .'</div>';
        $html .= '<div style="float: right;  width: 40%;">
				"<b><u>DTE Electric is:</u></b>"<br>
				The DTE Electric Company<br>'
				.$address_line1.'<br>'
				.$address_line2.'<br>'
			  .'</div><br><br><br><br><br>';
        $html .= '<b>Background Statement:</b> Customer Requests DTE Energy to perform the work indicated below in the vicinity of ' . "{$address_site} {$city_cust}" . '. To do this, DTE Energy requires that payment be made in the amount indicated below. Under Michigan Public Service Commission rules, DTE Energy is permitted to require payment before performing this work.';
        $html .= '<br><br><hr>';
        $html .= '<div style="text-align: center;"><b>DTE Energy and Customer agree to the following terms:</b></div>';
        $html .= '<br>';
        $html .= 'Payment for the requested work is $'.number_format($ar_estimate, 2).'';
        $html .= '<br><br>';
        $html .= 'The type of work to be performed:';
        $html .= '<br><br>';
        $html .= "{$work_description}";
        $html .= '<br><br>';
        $html .= 'In return for the above payment, The DTE Energy Company agrees to perform the requested work, providing all necessary permits and rights-of-way can be secured. This job will not be scheduled until DTE Energy receives payment for the above work.';
        $html .= '<br><br>';
        $html .= 'Notwithstanding anything herein to the contrary, the installation, ownership, and maintenance of electric services and the rates, fees and charges to be made shall be subject to and in accordance with the orders and rules and regulations adopted and approved from time to by the Michigan Public Service Commission.';
        $html .= '<br><br>';
        $html .= '<b>DTE Energy: <br><br>';
        
        $html .= '<div style="float: left; width: 33.3%;">
				(sign) ___________________________
			  </div>';

	$html .= '<div style="float: right;  width: 33.3%;">
				Date: _______________
                    </div>';

	$html .= '<div style="float: right;  width: 33.3%;">
                                Title: ____________________________
                    </div><br><br>';
        
        $html .= '<div style="float: left; width: 33.3%;">
				(print) ___________________________
			  </div><br><br>';

        $html .= '<b>Customer: <br><br>';
        
        $html .= '<div style="float: left; width: 33.3%;">
				(sign) ___________________________
			  </div>';

	$html .= '<div style="float: right;  width: 33.3%;">
				Date: _______________
                    </div>';

	$html .= '<div style="float: right;  width: 33.3%;">
                                Title: ___________________________
                    </div><br><br>';
        
        $html .= '<div style="float: left; width: 33.3%;">
				(print) ___________________________
			  </div><br>';
        
        $html .= '<footer > <div style="text-align: center; font-size: 8pt;"><b>W.O. '."{$wonum}" .'</b></div></footer>';
        
        //$html .= '<pagebreak />'; //End Page 2

	//Write html to pdf
	$mpdf->WriteHTML($html);
	$mpdf->Output();
?>