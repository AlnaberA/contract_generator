<?php
	$address_cust = $_POST['address_cust'];
	$city_cust = $_POST['city_cust'];

	$output = '<div class="form-group">
                <label for="address_site">Address:</label>
                <input type="text" class="form-control" id="address_site" name="address_site" placeholder="Address" value="'.$address_cust.'">
              </div>
              <div class="form-group">
                <label for="city_site">City/Twnship/Village:</label>
                <input type="text" class="form-control" id="city_site" name="city_site" placeholder="City/Twnship/Village" value="'.$city_cust.'">
              </div>';

	echo $output;
?>