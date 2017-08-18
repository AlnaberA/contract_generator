<?php
  if (!in_array($userId, $users)){
    echo "<div class='container'>
            <center><h2>You currently do not have access to all of the create contract functionality in this dashboard.</h2></center>
           </div>";
  }

  else{
    $sql = "SELECT * FROM CONTRACT_GEN_CIO2 WHERE SAVED_BY = '{$userId}' ORDER BY STATUS, CUST_NAME";

    $table = "<div class='col-md-2'></div>
        <div class='col-md-8'>
        <div class='panel panel-blue panel-shadow'>
            <div class='panel-heading'>
              <div class='panel-title'>My Contracts</div>
            </div>
            <div class='panel-body' style='min-height: 600px;'>
              <table class='table table-striped table-condensed table-bordered' id='my_contracts_table'>
                <thead>
                  <tr>
                    <td><strong>Work Order</strong></td>
                    <td><strong>Customer Name</strong></td>
                    <td><strong>Site Address</strong></td>
                    <td><strong>Date Submitted</strong></td>
                    <td><strong>Status</strong></td>
                    <td></td>
                  </tr>
                </thead>
                <tbody>";

      $count = 0;
      while($row = $db->fetch($sql))
      {

        $table .= "<tr>";

        $table .= "
              <td>".$row['WO_NUM']."</td>
              <td>".$row['CUST_NAME']."</td>
              <td>".$row['SITE_ADDRESS']."</td>
              <td>".$row['DATE_SUBMITTED']."</td>";

        if ($row['STATUS'] == 'APPROVED')   {
          $table .= "<td style='background-color: #e6ffe6'>".$row['STATUS']."</td>";
          $table .= "<td style='width: 13.5%;''><a target='_blank' href='contracts/ciac/view_contract.php?id=".$row['ID']."&preview=false' id='view_contract_btn' class='btn btn-default btn-sm'>View</a></td></tr>";
        }

        else if ($row['STATUS'] == 'PENDING')  {
          $table .= "<td style='background-color: #fff3e6;'>".$row['STATUS']."</td>";
          $table .= "<td style='width: 13.5%;''><a target='_blank' href='contracts/ciac/view_contract.php?id=".$row['ID']."&preview=true' id='view_contract_btn' class='btn btn-default btn-sm'>View</a></td></tr>";
        }

        else if ($row['STATUS'] == 'SAVED')    {
          $table .= "<td style='background-color: #ffffe6'>".$row['STATUS']."</td>";
          $table .= "<td style='width: 13.5%;''><a target='_blank' href='contracts/ciac/view_contract.php?id=".$row['ID']."&preview=true' id='view_contract_btn' class='btn btn-default btn-sm'>View</a></td></tr>";
        }

        else if ($row['STATUS'] == 'ASSIGNED')  {
          $table .= "<td style='background-color: #e6f9ff;'>".$row['STATUS']."</td>";
          $table .= "<td style='width: 13.5%;''><a target='_blank' href='contracts/ciac/view_contract.php?id=".$row['ID']."&preview=true' id='view_contract_btn' class='btn btn-default btn-sm'>View</a></td></tr>";
        }


        $count++;
      }

      if($count == 0){
        $table.= "
            <tr>
              <td colspan='6'><div class='alert alert-warning'>You have no contracts</div></td>
            </tr>";
      }

      $table .= "
              </tbody>
          </table>
          </div>
          </div>
          </div>";

    echo $table;

    if ($notification_data['NOTIFICATION_STATUS'] == 'OPEN') { ?>
      <div class="alert alert-danger bounce fragment" id="fragment">
        <a href="#" class="close" id="close_alert" data-dismiss="alert" aria-label="close" data-userid="<?echo $userId ?>">&times;</a>
          <? echo $notification_data['NOTIFICATION']; ?>
      </div>
 <? } ?>

    <script>
  		$('#my_contracts_table').DataTable({
  		      'bLengthChange': false,
  		      'info': false,
  		      'pageLength': 12,
  		      'aaSorting': []
  		});

  		$('#my_contracts_table').css('width', '100%');
    </script>
<? } ?>

</body>

</html>
