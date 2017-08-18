<?
	include("../../static/mpdf/mpdf.php");
  	include("../../database.php");

  	$id = $_GET['id'];
  	$preview = $_GET['preview'];

  	$sql = "SELECT * FROM CONTRACT_GEN_CIO2 WHERE ID = '{$id}'";
  	$row = $db->fetch($sql);

  	$name_cust = $row['CUST_NAME'];
  	$address_cust = $row['CUST_ADDRESS'];
  	$city_cust = $row['CUST_CITY'];
  	$state_cust = $row['CUST_STATE'];
  	$zip_cust = $row['CUST_ZIP'];

  	$address_site = $row['SITE_ADDRESS'];
  	$city_site = $row['SITE_CITY_NAME'];
  	$city_twn_vil = $row['SITE_CITY_TWN_VIL'];

  	$cc_wo_num = $row['WO_NUM'];
  	$agreement_num = $row['AGREE_NUM'];
  	$dwg_num = $row['DRAW_NUM'];
  	$dwg_date = $row['DRAW_DATE'];
  	$voltage = $row['VOLTAGE'];
  	$phase =  $row['PHASE'];
  	$sic_code =  $row['SIC_CODE'];
  	$sic_four_digit_code = preg_replace('/\s+/', '', substr($sic_code, -5));
  	$sic_desc = strtolower(substr($sic_code, 0, -5));

  	$name_planner = $row['PLANNER_NAME'];
  	$id_planner = $row['PLANNER_ID'];
  	$title_planner = $row['PLANNER_TITLE'];
  	$phone_planner = $row['PLANNER_PHONE'];

  	$first3digits = substr($phone_planner, 0, 3);
  	$second3digits = substr($phone_planner, 3, 3);
  	$lastfour = substr($phone_planner, -4, 4);

  	$phone_planner =  $first3digits . "." . $second3digits . "." . $lastfour;

  	$email_planner = $row['PLANNER_EMAIL'];
  	$region_planner = $row['PLANNER_REGION'];
  	$address_planner_line1 = $row['PLANNER_ADDRESS_LINE1'];
  	$address_planner_line2 = $row['PLANNER_ADDRESS_LINE2'];
  	$supervisor_planner = $row['SUPERVISOR'];

  	$trench_length = $row['TRENCH_LENGTH'];
  	$add_trans_load = $row['TRANSFORMER_LOAD'];
  	$winter_const = $row['WINTER_CONSTRUCT'];

  	$ann_use = $row['ANNUAL_USAGE'];
  	$ciac_credit =  $row['OPTION2_CREDIT'];

  	$construct_cost = $row['COST_CONSTRUCT'];
  	$permits_row = $row['PERMITS'];
  	$ug_vs_oh =  $row['UGOH_EXTENSIONS'];
  	$add_construct_cost = $row['ADD_CONSTRUCT_COST'];
  	$add_construct_cost_reason =  $row['ADD_CONSTRUCT_DESC'];
  	$system_mod_cost = $row['SYSTEM_MOD_COST'];
  	$today = date("m/d/Y", strtotime("now"));

  	$trench_cost = $trench_length * 4.30;
	$transformer_cost = $add_trans_load * 7.50;
	$winter_cost = $winter_const * 1.00;

	$non_refund_total = $trench_cost + $transformer_cost + $permits_row + $winter_cost + $ug_vs_oh + $add_construct_cost;

	$non_refund_contribution = $trench_cost + $transformer_cost;

	$total_refundable_construct = ($construct_cost - $non_refund_contribution) - $ciac_credit;
	$remaining_allow = $ciac_credit - ($construct_cost - $non_refund_contribution);

	if ($remaining_allow < 0){
		$remaining_allow = 0.00;
	}

	if($total_refundable_construct < 0){
		$total_refundable_construct = 0.00;
	}

	$total_systems_work = $system_mod_cost - $remaining_allow;

	if($total_systems_work < 0){
		$total_systems_work = 0.00;
	}

	$total_cost = $non_refund_total + $total_refundable_construct + $total_systems_work;

  	$mpdf=new mPDF();
  	if ($preview == "true"){
  		$mpdf->SetWatermarkText("PREVIEW");
		$mpdf->showWatermarkText = true;
		$mpdf->watermark_font = 'DejaVuSansCondensed';
		$mpdf->watermarkTextAlpha = 0.06;
  	}

  	//Page 1
	$html = '<div style="font-family: arial; font-size: 10pt; line-height: 1.33;">';
	$html .= '<div style="text-align: right; margin-right: 40px; margin-bottom: 0px;"><img src="../../images/dte-logo.png" style="width:220px; height:45px;"></div>';
	$html .= '<p style="margin-left: 70%; margin-top: 0px;">'.$address_planner_line1.'<br>'.$address_planner_line2.'<br>'.$today.'</p>';
	$html .= '<br><br><p style="text-align: left;">'.$name_cust.'<br>'.$address_cust.'<br>'.$city_cust.'&nbsp;'.$state_cust.'&#44;&nbsp;'.$zip_cust.'</p>';
	$html .= '<br><p><b>Regarding: <u>'.$address_site.'&#44;&nbsp;'.$state_cust.' in '.$city_site.'&nbsp;'.$city_twn_vil.'</u></b></p>';

	$html .= '
		<p>Enclosed are copies of the Line Extension Agreement and the Electrical Drawing for the address referenced above. Please make sure that the information on these documents agrees with the information in your building plans. When you are satisfied that the information is correct, please sign and date the Agreement.<br><br>';

	if ($total_cost > 0 && $trench_length > 0){
		$html .= '
			Also included for your signature are the Certificate of Grade documents. Please note that two (2) copies of the Certificate of Grade document are required. Return the signed document(s) to me along with a check payable to DTE Electric for $'.number_format($total_cost, 2).'. To ensure proper credit of your payment, the work order number should be indicated on your remitted check.<br><br>';
	}

	else if ($total_cost > 0 && $trench_length == 0){
		$html .= '
			Return the signed document(s) to me along with a check payable to DTE Electric for $'.number_format($total_cost, 2).'. To ensure proper credit of your payment, the work order number should be indicated on your remitted check.<br><br>';
	}


	if ($total_cost > 0){
		$html .= '
			When we receive the signed document(s) and payment, we will proceed to schedule the work necessary to provide electric service to your development.  If you have any questions regarding this job, please feel free to contact me at the phone number or e-mail address indicated below.<br><br></p>';
	}

	else if ($total_cost == 0){
		$html .= '
			When we receive the signed document(s), we will proceed to schedule the work necessary to provide electric service to your development.  If you have any questions regarding this job, please feel free to contact me at the phone number or e-mail address indicated below.<br><br></p>';
	}

	if ($total_cost == 0 && $trench_length == 0){
		$html .= '<br><br><br><br>';
	}

	else if ($total_cost > 0 && $trench_length == 0){
		$html .= '<br>';
	}
																					//Change to full title?
	$html .= '<br><p style="margin-left: 65%;">Sincerely, <br><br><br><br>'.$name_planner.'<br>Planner<br>'.$phone_planner.'<br>'.$email_planner.'</p>';

	if ($trench_length > 0){
		$html .= '<br><br><br><p>
					Enclosures:<br>
					Line Extension Agreement<br>
					Electrical Layout (Attachment A)<br>
					Certificate of Grade<br>
				  </p><pagebreak />'; //End Page 1
	}

	else if ($trench_length == 0){
		$html .= '<br><br><br><p>
					Enclosures:<br>
					Line Extension Agreement<br>
					Electrical Layout (Attachment A)<br>
				  </p><pagebreak />'; //End Page 1
	}

	//Page 2
	$html .= '<div class ="header"><img src="../../images/dte-logo-bw.jpg" style="width:160px; height:32px; float: right; margin-right: 10px; margin-bottom: 0px;">';
	$html .= '<h3 style="margin-bottom: 0px; position:relative;">DTE Electric Company</h3>';
	$html .= '<h4 style="margin-top: 0px; margin-bottom: 0px; position:relative;">Line Extension Agreement for Commercial/Industrial Customers</h4><hr></div>';

	$html .= '<div style="float: left; width: 33.3%;">
				Date: '.$today.'<br>'
				.'Agreement #: '.$agreement_num.'<br>'
				.'Workorder #: '.$cc_wo_num.'<br>'
			  .'</div>';

	$html .= '<div style="float: right;  width: 33.3%;">
				"<u>Customer</u> is:"<br>'
				.$name_cust.'<br>'
				.$address_cust.'<br>'.$city_cust.'&nbsp;'.$state_cust.'&#44;&nbsp;'.$zip_cust
			  .'</div>';

	$html .= '<div style="float: right;  width: 33.3%;">
				"<u>DTE Electric</u> is:"<br>
				The DTE Electric Company<br>'
				.$address_planner_line1.'<br>'
				.$address_planner_line2.'<br>'
			  .'</div><br>';

	$html .= '<p>This Line Extension Agreement for Commercial/Industrial Customers (“Agreement�?) is made by and between “DTE
			  Electric�? and “Customer�?.  Customer requests DTE Electric to install a '.$voltage.' volt ac, '.$phase.' phase electric service at
			  '.$address_site.', '.$state_cust.' in '.$city_site.'&nbsp;'.$city_twn_vil.', for a(n) '.$sic_desc.' business (SIC Code '.$sic_four_digit_code.').  DTE Electric will construct a
			  “Line Extension�? shown on Attachment A, DTE Electric electrical layout No. '.$dwg_num.' dated '.$dwg_date.' which is part of
			  this Agreement.</p>';

	$html .= '<h3 style="margin-bottom: 0px;">Agreement Terms</h3><hr style="margin-top: 0px;">';

	$html .= '<p style="margin-top: 0px;">DTE Electric and Customer agree to the Terms and Conditions attached to this Agreement titled “Terms & Conditions – Line Extension for Commercial/Industrial Customers�? (Recital A and B and Terms 1 through 17).<br><br>';

	if ($total_cost > 0){
		$html .= '
			Please send payment and signed agreement to:  '.$name_planner.', DTE Electric Company, '.$address_planner_line1.', '.$address_planner_line2.'.  Payments by check are to be made payable to DTE Electric Company and include the Work Order number.</p>';
	}

	else if ($total_cost == 0){
		$html .= '
			Please send signed agreement to:  '.$name_planner.', DTE Electric Company, '.$address_planner_line1.', '.$address_planner_line2.'.</p>';
	}

	$html .= '<div style="float: left; width: 70%;">
				<b>Payment Details: </b>
				<ol type="A" style="margin-top: 0px; padding-top: 0px; padding-left: 2.0em; padding-bottom: 0px; margin-bottom: 0px; line-height: 1.5;">
					<li><u>Non-Refundable Costs</u><br>
						Item 752: <u>'.$trench_length.'</u> Trench feet x $4.30/ft<br>
						Item 753: <u>'.$add_trans_load.'</u> Transformer kVA x $7.50 kVA<br>
						Item 780: Acquiring Permits/Rights-of-Way<br>
						Item 801: Winter Construction Costs <u>'.$winter_const.'</u> feet x $1.00/ft<br>
						Item 804: Underground vs Overhead Perimeter/Offsite Extensions<br>
						Item 779: Other: <u>'.$add_construct_cost_reason.'</u><br>
						&emsp;&emsp;<i>Total Non-Refundable Costs:</i>
					</li><br>
					<li><u>Refundable Construction Advance</u><br>
						Estimated Cost of Construction<br>
						Non-Refundable Contribution<br>
						Standard Allowance (2 Year Full Service Credit less fuel)<br>
						&emsp;&emsp;<i>Total Refundable Construction Advance:</i>
					</li><br>
					<li><u>System Work</u><br>
						System Modification<br>
						Remaining Standard Allowance<br>
						&emsp;&emsp;<i>Total System Work:</i>
					</li>
				</ol>
			  </div><br>';

	$html .= '<div style="float: right; width: 20%; line-height: 1.5;">
				<br>'.
				number_format($trench_cost, 2).'<br>'.
				number_format($transformer_cost, 2).'<br>'.
				number_format($permits_row, 2).'<br>'.
				number_format($winter_cost, 2).'<br>'.
				number_format($ug_vs_oh, 2).'<br>'.
				number_format($add_construct_cost, 2).'<br>&emsp;&emsp;<u>'.
				number_format($non_refund_total, 2).'</u><br>'.
				'<br><br>'.
				number_format($construct_cost, 2).'<br>('.
				number_format($non_refund_contribution, 2).')<br>('.
				number_format($ciac_credit, 2).')<br>&emsp;&emsp;<u>'.
				number_format($total_refundable_construct, 2).'</u><br>'.
				'<br><br>'.
				number_format($system_mod_cost, 2).'<br>'.
				number_format($remaining_allow, 2).'<br>&emsp;&emsp;<u>'.
				number_format($total_systems_work, 2).'</u><br>
			  </div><br>';

	$html .= '<div style="float: right; line-height: 1.5; display:block">
				$<br>
				$<br>
				$<br>
				$<br>
				$<br>
				$<br>
				&emsp;&emsp;$<br>
				<br><br>
				$<br>
				$<br>
				$<br>
				&emsp;&emsp;$<br>
				<br><br>
				$<br>
				$<br>
				&emsp;&emsp;$<br>
			  </div>';


	$html .= '<hr><div style="float: left; width: 70%;"><strong>Total Payment Due</strong></div>';
	$html .= '<div style="float: right; width: 20%;"><u>'.number_format($total_cost, 2).'</u></div>';
	$html .= '<div style="float: right;">$</div>';

	$html .= '<p>The parties have executed this Line Extension for Commercial/Industrial Customers Agreement as dated below:';

	$html .= '<div class="signature" style="line-height: 2; font-size: 9pt; word-spacing: 1px;">
						DTE Electric: Sign:______________________________________ Print:______________________________________ Date:_________________<br>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Title:<br>
			  </div>';

	$html .= '<div class="signature" style="line-height: 2; font-size: 9pt; word-spacing: 1px;">
						Customer:&emsp; Sign:______________________________________ Print:______________________________________ Date:_________________<br>
			  </div>';
	$html .= '<div class="signature" style="line-height: 2; font-size: 9pt; word-spacing: 1px;">
						&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign:______________________________________ Print:______________________________________ Date:_________________
			  </div>';


	$html .= '<pagebreak />'; //End Page 2

	//Page 3
	$html .= '<div class ="header"><img src="../../images/dte-logo-bw.jpg" style="width:130px; height:30px; float: right; margin-right: 10px; margin-bottom: 0px;">';
	$html .= '<h4 style="margin-bottom: 0px; position:relative;">Terms & Conditions - Line Extension for Commercial/Industrial Customers</h4></div><hr>';

	$html .= '<h4 style="text-align: center;">RECITALS</h4>';

	$html .= '<div style="font-size: 9.5pt;"><ol type="A" style="padding-left: 1.2em;">
				<li>Customer desires to obtain electric power service for its Facility from DTE Electric and to obtain an allowance for certain design and construction costs related to DTE Electric’s line extension to serve Customer’s Facility.</li><br>

				<li>DTE Electric desires to supply electric power to Customer and provide an allowance for certain design and construction costs related to DTE Electric’s line extension to serve Customer’s Facility on the terms and conditions set forth herein.</li>
				</ol>

				In consideration of the foregoing premises, the parties agree as follows<br><br>';

	$html .= '<h4 style="text-align: center;">AGREEMENT</h4>';

	$html .= '<ol style="padding-left: 1.2em;">
		<li><b>MPSC Rules</b> – This Agreement is subject to the Michigan Public Services Commission (MPSC) Rules, including but not limited to, Rule C6.1, “Extension of Service�?; Rule C6.3 “Underground Distribution Systems�?; and Rule C6.4 “Underground Service Connections�?, which are incorporated herein by reference.</li><br>

		<li><b>Underground Line Extension</b> – Customer agrees to provide the following on Customer’s property:  a) all necessary trenching backfilling, conduits, and manholes, and b) suitable space and necessary foundations for padmounted transformers, primary switching equipment and all other above grade equipment.</li><br>


		<li><b>Easements</b> – Customer shall provide DTE Electric with a ten (10) foot wide, or wider if required by field conditions, easement for the Line Extension.</li><br>

		<li><b>Right-of-Way</b> – Before DTE Electric constructs the Line Extension, Customer shall provide DTE Electric, at no cost to DTE Electric, all right-of-way and line clearance permits required for the Line Extension.  DTE Electric will assist Customer in this process by giving Customer the appropriate land owner’s names, the right-of-way forms for signatures and a sketch of the proposed Line Extension route.  If Customer cannot obtain the right-of-way, DTE Electric will extend its line on an alternate route, which may result in additional costs to Customer.  If additional costs are not paid after DTE Electric submits to Customer the costs of using an alternate route, DTE Electric may cancel this Agreement after giving the Customer five (5) days written notice.</li><br>

		<li><b>Total Payment</b> – By executing this Agreement, Customer agrees to pay DTE Electric the “Total Payment�? calculated on the front of this agreement.  The Total payment calculation may include additional Non-Refundable costs for the services performed by DTE Electric in addition to those understood as standard services.</li><br>

			<ol type="a">
				<li><b>Standard Allowance</b> – The Standard Allowance amount is calculated as follow:  two (2) times the full service credit less fuel.  This is a standard amount that DTE Electric agrees to contribute to the servicing of a customer with a five (5) year term commitment.  This amount is seen as a credit and deducted from the “Estimated Cost of Construction�? total listed on the front page of this Agreement.</li>
				<li><b>Refundable Construction Advance</b> – The Refundable Construction Advance reflects a deposit made by the Customer to construct the Line Extension, a portion of which may be refundable.  (Refer to Refunds, paragraph 6 below).</li>
				<li><b>Non-Refundable Costs</b> – The Customer agrees to contribute a portion of the cost needed to construct the Line Extension.  This amount is included in the “Estimated Cost of Construction�? total.  The “Non-Refundable Contribution�? is calculated separately and then deducted from the “Refundable Construction Advance�?.</li>
			</ol><br>

		<li><b>Refunds</b> – At the end of the first complete twelve (12) month period immediately following the date of completion of the Line Extension, DTE Electric will compute the actual revenue provided during the previous twelve (12)  months.  If the actual revenue multiplied by two (2) exceeds DTE Electric’s estimated annual revenue, this amount will be refunded to the original customer.  Refunds will also be paid for additional new customers directly connected to the financed extension during the refund period and are calculated as follow:  the amount of any such refund shall be equal to two (2) times the actual annual revenue or $500 (whichever is greater) for each customer </li></ol></div>';

	$html .= '<pagebreak />'; //End Page 3

	//Page 4
	$html .= '<div class = "header"><img src="../../images/dte-logo-bw.jpg" style="width:130px; height:30px; float: right; margin-right: 10px; margin-bottom: 0px;">';
	$html .= '<h4 style="margin-bottom: 0px; position:relative;">Terms & Conditions - Line Extension for Commercial/Industrial Customers</h4></div>';

	$html .= '<p style="padding-left: 1.2em;">who is subsequently connected directly to the facilities financed by the original customer.  Directly connected commercial and industrial customers are those who do not require payment of a refundable construction advance.  The total refund shall not exceed the total refundable construction advance.  DTE Electric will keep any part of the Refundable Construction Advance that has not been refunded within five (5) years after completion of the Line Extension.  If this Agreement is terminated, DTE Electric will refund, without interest, all payments made by Customer under this Agreement.  DTE Electric reserves the right to obtain and apply refunds to any outstanding monies owed to the Company by same customer.</p>';

	$html .= '
		<div style="font-size: 9.5pt;"><ol style="padding-left: 1.2em;" start="7">
			<li><b>Construction Postponement</b> – After DTE Electric receives full payment of the Total Payments, scheduling of construction shall be done on a mutually agreeable basis to DTE Electric and the Customer.  However, if DTE Electric believes that the customer will not be prepared to receive electric service on the expected construction completion date, then DTE Electric may notify Customer in writing of the postponement of the construction start date and delay when electric service will be available to Customer.  DTE Electric will begin to construct the System when all of the customers are prepared to receive electric service on the anticipated date of completion of the System construction.</li><br>

			<li><b>Termination prior to Commencement of Line Extension</b> – If Customer fails to complete any obligations under this Agreement within six (6) months from the date DTE Electric receives full payment or the Total payment, then, upon written notice DTE Electric may cancel this Agreement and a refund may be issued to Customer, less all reasonable costs incurred by DTE Electric.</li><br>

			<li><b>Failure to Execute Agreement; Changes to Agreement</b> – If the Customer fails to execute this Agreement and pay the Total payment due to DTE Electric within six (6) months of the date of this Agreement, then this Agreement shall become null and void.  Further, Customer shall not make any changes to this Agreement including, but not limited to, handwritten changes or striking any language.  In the event Customer makes any changes to this Agreement, without the specific written consent of DTE Electric, then this Agreement shall become null and void.</li><br>

			<li><b>Damage to System</b> – If Customer, its contractors, agents, employees, successors and assigns cause damage to the System, then Customer shall reimburse DTE Electric for all costs arising out of the damage.  This includes damages caused by grade changes, which create hazards or make the facilities difficult to maintain.  DTE Electric reserves the right to retain portions of the Refundable Construction Advance to offset such damages.</li><br>

			<li><b>Assignment and Notices</b> – Customer agrees not to assign this Agreement, other than the refunds of the advance,  without DTE Electric’s prior written consent.  All notices required by this Agreement must be in writing and sent by U.S. mail or delivered in person to the address listed on the front page of this Agreement.</li><br>

			<li><b>Entire Agreement</b> – This Agreement contains the entire Agreement between the parties, and supersedes any previous oral or written representations of agreements.</li><br>

	 		<li><b>Additional Customer Obligations</b></li>
				<ol type="a">
					<li>In consideration for the allowance provided to Customer hereunder, Customer will purchase all its requirements for electric power for the Facility from DTE Electric consistent with Rule C6.2 (4) of Company’s Rate Book.</li><br>
					<li>In entering into this Agreement, DTE Electric is materially relying upon the Customer-provided estimated site aggregate monthly electrical demand in evaluating Customer&#39;s electrical service needs, eligibility for Standard Allowance amounts and responsibility for CIAC amounts. In the event that Customer&#39;s actual energy utilization is materially different than the Customer-provided estimated site aggregate monthly electrical demand then Customer agrees that Company can and will extend this Agreement for a period, determined in the sole judgment of Company, sufficient to recover the Company&#39;s distribution system design and construction costs for Customer&#39;s site, excluding Service Connection Fees.</li>
				</ol><br>
		</ol></div>';

	$html .= '<pagebreak />'; //End Page 4

	//Page 5
	$html .= '<div class = "header"><img src="../../images/dte-logo-bw.jpg" style="width:130px; height:30px; float: right; margin-right: 10px; margin-bottom: 0px;">';
	$html .= '<h4 style="margin-bottom: 0px; position:relative;">Terms & Conditions - Line Extension for Commercial/Industrial Customers</h4></div>';

	$html .= '
		<br><div style="font-size: 9.5pt;"><ol style="padding-left: 1.2em;" start="14">
			<li><b>Term</b> – The term of this Agreement begins on execution and shall continue for five (5) years from the date the line extension work is complete and energized for service, subject to Section 13 of this Agreement.</li><br>

			<li><b>Confidentiality</b> – This Agreement is confidential and neither party will disclose the terms of this Agreement or its existence without the consent of the other party, except to the extent required by applicable law or regulation.</li><br>

			<li><b>Warranty; Limitation of Liability</b></li>
				<ol type="a">
					<li>DTE Electric makes no warranties, express or implied, including but not limited to merchantability, fitness for purpose, energy savings or concerning any goods or services supplied by any third party.</li><br>
					<li>DTE Electric’s liability under this Agreement is limited by Rule C-1.2 of the Rate Book. In no event will Company or its supplier be liable under this Agreement or under any cause of action relating to the subject matter of Agreement, whether based on contract, warranty, tort, strict liability, indemnity or otherwise for any incidental or consequential damages, including but not limited to loss of use, increased costs of purchased or replacement power, interest charges, inability to operate full capacity, lost profits or claims of Customer’s customers.</li>
				</ol><br>

			<li><b>Miscellaneous</b></li>
				<ol type="a">
					<li>This Agreement is governed by the laws of the State of Michigan. The parties agree to the exclusive venue of the state and federal courts located in the State of Michigan.</li><br>
					<li>This Agreement and the rights and obligations hereunder may not be assigned by Customer without the written consent of Company. This Agreement will inure to the benefit of and be binding upon the parties’ successors and permitted assigns.</li><br>
					<li>Any waiver of the provisions in this Agreement must be in writing and signed by the party against whom the waiver is to be enforced. The failure of a party to insist upon strict performance of the provisions of this contract will not be construed as a waiver of any rights.</li><br>
					<li>This Agreement and the applicable provisions of the DTE Electric’s Rate Book constitute the entire agreement of the parties concerning the subject matter hereof and supersede all prior or contemporaneous agreements or understandings.</li>
				</ol><br>
		</ol></div>';

	if($trench_length > 0){
		$html .= '<pagebreak />'; //End Page 5

		//Page 6
		$html .= '<div style="text-align: right; margin-right: 40px; margin-bottom: 0px;"><img src="../../images/dte-logo.png" style="width:220px; height:45px;"></div>';
		$html .= '<p style="margin-left: 70%; margin-top: 0px;">'.$address_planner_line1.'<br>'.$address_planner_line2.'<br>'.$today.'</p>';
		$html .= '<br><br><p style="text-align: left;">'.$name_cust.'<br>'.$address_cust.'<br>'.$city_cust.'&nbsp;'.$state_cust.'&#44;&nbsp;'.$zip_cust.'</p>';

		$html .= '<h2 style="text-align: center;">Certificate of Grade</h2><br>';

		$html .= '<p>Work Order Number: '.$cc_wo_num.'</p><br>';

		$html .= '<p><b>Regarding: <u>'.$address_site.'&#44;&nbsp;'.$state_cust.' in '.$city_site.'&nbsp;'.$city_twn_vil.'</u></b></p>';

		$html .= '
			<p>I/We, the undersigned, hereby certify to the DTE Electric Company that all grading in utility easements and/or the routes of the underground facilities for the above subject development have been completed within four (4) inches of the final grade.<br><br>

			   I/We further agree that a stake will be placed at the location for each piece of above grade equipment, indicating the final grade to be achieved.  A copy of the DTE Electric Company underground construction Drawing No. '.$dwg_num.' for this development is in our possession and will be used for this purpose.</p><br><br>';


		$html .= '<p>Approval: <br><br><br>
					<div style="float:left; width: 40%;">
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Name (Print)<br><br><br>
						</div>
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Signature and Date<br><br><br>
						</div>
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Title and Company (Print)<br><br>
						</div>
					</div>

					<div style="float: right; overflow:hidden; width: 40%;">
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Name (Print)<br><br><br>
						</div>
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Signature and Date<br><br><br>
						</div>
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Title and Company (Print)<br><br>
						</div>
					</div></p>';

		$html .= '<pagebreak />'; //End Page 6

		//Page 7
		$html .= '<div style="text-align: right; margin-right: 40px; margin-bottom: 0px;"><img src="../../images/dte-logo.png" style="width:220px; height:45px;"></div>';
		$html .= '<p style="margin-left: 70%; margin-top: 0px;">'.$address_planner_line1.'<br>'.$address_planner_line2.'<br>'.$today.'</p>';
		$html .= '<br><br><p style="text-align: left;">'.$name_cust.'<br>'.$address_cust.'<br>'.$city_cust.'&nbsp;'.$state_cust.'&#44;&nbsp;'.$zip_cust.'</p>';

		$html .= '<h2 style="text-align: center;">Certificate of Grade</h2><br>';

		$html .= '<p>Work Order Number: '.$cc_wo_num.'</p><br>';

		$html .= '<p><b>Regarding: <u>'.$address_site.'&#44;&nbsp;'.$state_cust.' in '.$city_site.'&nbsp;'.$city_twn_vil.'</u></b></p>';

		$html .= '
			<p>I/We, the undersigned, hereby certify to the DTE Electric Company that all grading in utility easements and/or the routes of the underground facilities for the above subject development have been completed within four (4) inches of the final grade.<br><br>

			   I/We further agree that a stake will be placed at the location for each piece of above grade equipment, indicating the final grade to be achieved.  A copy of the DTE Electric Company underground construction Drawing No. '.$dwg_num.' for this development is in our possession and will be used for this purpose.</p><br><br>';


		$html .= '<p>Approval: <br><br><br>
					<div style="float:left; width: 40%;">
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Name (Print)<br><br><br>
						</div>
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Signature and Date<br><br><br>
						</div>
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Title and Company (Print)<br><br>
						</div>
					</div>

					<div style="float: right; overflow:hidden; width: 40%;">
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Name (Print)<br><br><br>
						</div>
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Signature and Date<br><br><br>
						</div>
						<div class="signature" style=" height: 30px; word-spacing: 1px;">
							_____________________________________________<br>
							Title and Company (Print)<br><br>
						</div>
					</div></p>';

		//End Page 7
	}
        
        $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
	$mpdf->WriteHTML($html);
	$mpdf->Output();

?>
