<?
	include("../../../database.php");

	$name_planner = $_POST['name_planner'];

	$sql = "SELECT * FROM EMPLOYEE@MAXIMO WHERE CONCAT(CONCAT(GIVEN_NAME, ' '),LAST_NAME) = '{$name_planner}'";

	$row = $prod->fetch($sql);

	if ($row['WORK_LOCATION'] == "Lapeer Service Center"){
		$region_planner = "Lapeer";
		$address_planner = "1100 Clark";
		$address_planner2 = "Lapeer, MI 48446";
	}

	else if(strpos($row['WORK_LOCATION'], 'Macomb Center') !== false) {
		$region_planner = "NE";
		$address_planner = "15600 Nineteen Mile Rd.";
		$address_planner2 = "Clinton Township, MI 48038";
	}

	else if(strpos($row['LOCATION'], 'Walker Cisler Building') !== false) {
		$region_planner = "SE";
		$address_planner = "One Energy Plaza, 575 SB";
		$address_planner2 = "Detroit, MI 48226";
	}

	else if(strpos($row['WORK_LOCATION'], 'North Area Energy Center') !== false) {
		$region_planner = "NAEC";
		$address_planner = "4100 Doerr Rd.";
		$address_planner2 = "Cass City, MI 48726";
	}

	else if(strpos($row['WORK_LOCATION'], 'Western Wayne Center') !== false) {
		$region_planner = "SW";
		$address_planner = "8001 Haggerty Rd.";
		$address_planner2 = "Belleville, MI 48111";
	}

	else if(strpos($row['WORK_LOCATION'], 'NW Planning') !== false) {
		$region_planner = "NW";
		$address_planner = "37849 Interchange Drive";
		$address_planner2 = "Farmington Hills, MI 48335";
	}


	$output = '<div class="form-group">
              <label for="name_planner">Name:</label>
              <input type="text" class="form-control" id="name_planner" name="name_planner" placeholder="Name" value="'.$row['GIVEN_NAME'].' '.$row['LAST_NAME'].'">
            </div>
            <div class="form-group">
              <label for="title_planner">Title:</label>
              <input type="text" class="form-control" id="title_planner" name="title_planner" placeholder="Title" value="'.$row['TITLE'] .'">
            </div>
            <div class="form-group">
              <label for="phone_planner">Phone:</label>
              <input type="text" class="form-control" id="phone_planner" name="phone_planner" placeholder="Phone" value="'.$row['TELEPHONE_NUMBER'].'">
            </div>
            <div class="form-group">
              <label for="email_planner">Email:</label>
              <input type="text" class="form-control" id="email_planner" name="email_planner" placeholder="Email" value="'.$row['EMAIL_ID'].'">
            </div>
            <div class="form-group">
              <label for="region_planner">Region:</label>
              <input type="text" class="form-control" id="region_planner" name="region_planner" placeholder="Region" value="'.$region_planner.'">
            </div>
          <div class="form-group">
              <label for="address_planner">Address:</label>
              <input type="text" class="form-control" id="address_planner" name="address_planner" placeholder="Address" value="'.$address_planner.'">
              <input type="text" class="form-control" id="address_planner2" name="address_planner2" placeholder="Address Line 2" value="'.$address_planner2.'">
          </div>
          <div class="form-group">
          	<input type="hidden" class="form-control" id="id_planner" name="id_planner" value="'.$row['USER_ID'].'">
          </div>
          <div class="form-group">
          	<input type="hidden" class="form-control" id="id_planner" name="id_planner" value="'.$row['SUPERVISOR_USER_ID'].'">
          </div>';

    echo $output;

?>