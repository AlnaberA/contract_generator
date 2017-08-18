<?php
	include("../../../../database.php");

	$sql= "SELECT * FROM HUDDLE_DASH WHERE STATUS = 'PENDING' OR STATUS = 'OPEN' ORDER BY INVESTIGATOR";

	$table = "
      <div class='container'>
      <center>
	    <table class='table table-striped table-bordered' id='info_table' style='margin-top: 40px;'>
            <caption><h2><strong>Pending Calls</strong></h2></caption>
            <thead>
              <tr>
                <td></td>
                <td><strong>Investigator</strong></td>
                <td><strong>Complaint ID</strong></td>
                <td><strong>Date of Complaint</strong></td>
                <td><strong>Date of Contact</strong></td>
              </tr>
            </thead>
            <tbody>";

    $count = 0;
    $number = 1;
    while($row = $prod->fetch($sql)){
    	$table .= "<tr>";
        $table .= "<td><strong>".$number.'.'."</strong></td>";
        $table .= "<td>".$row['INVESTIGATOR']."</td>";
    		$table .= "<td>".$row['CALL_ID']."</td>";
    		$table .= "<td>".$row['DATE_COMPLAINT']."</td>";
    		$table .= "<td>".$row['DATE_CONTACT']."</td>";
    	$table .= "</tr>";

      $number++;
      $count++;
    }

    if ($count == 0){
      $table .= "<td colspan='5'><div class='alert alert-warning'><strong>Alert:</strong>&nbsp; There are no pending calls.</div></td>";
    }

    $table .= "  
            </tbody>
        </table>
        </center>
      </div>";

	echo $table;
?>