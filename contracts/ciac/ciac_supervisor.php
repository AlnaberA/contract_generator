<?
  $sql3 = "SELECT * FROM CONTRACT_GEN_CIO2 WHERE STATUS = 'PENDING' ORDER BY PLANNER_NAME, DATE_SUBMITTED";
  $sql4 = "SELECT * FROM CONTRACT_GEN_CIO2 WHERE PLANNER_NAME IS NOT NULL AND STATUS IN('SAVED', 'PENDING') ORDER BY CUST_NAME DESC";

  $planners = getPlannersFromAdmin($db);
?>

<div class="container">
    <div class="col-md-12">
      <div class="panel panel-green panel-shadow">
          <div class="panel-heading">
            <div class="panel-title">Contracts Waiting Approval</div>
          </div>
          <div class="panel-body" style='margin-bottom: 25px; min-height: 600px;'>
            <table class='table table-striped table-condensed table-bordered' id='contract_approval_table'>
              <thead>
                <tr>
                  <td><strong>Customer</strong></td>
                  <td><strong>Site</strong></td>
                  <td><strong>Planner</strong></td>
                  <td><strong>Date Submitted</strong></td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
              <?
                  $count = 0;
                  while($row3 = $db->fetch($sql3))
                  { ?>
                    <tr>
                      <td><? echo $row3['CUST_NAME'] ?></td>
                      <td><? echo $row3['SITE_ADDRESS'] ?></td>
                      <td><? echo $row3['PLANNER_NAME'] ?></td>
                      <td><? echo $row3['DATE_SUBMITTED'] ?></td>
                      <td><a href='approval.php?id=<?echo $row3["ID"]?>' class='btn btn-success btn-sm'>Approval Page</a></td>
                    </tr>
                <?  
                    $count++;
                  } 
                if ($count == 0){ ?>
                    <tr>
                      <td colspan='5'><div class="alert alert-warning">No contracts waiting approval</div></td>
                    </tr>
              <? } ?>
              </tbody>
            </table>
          </div>
      </div>
    </div><br>

  <div class="col-md-12">
      <div class="panel panel-blue panel-shadow">
          <div class="panel-heading">
            <div class="panel-title">Reassign a Contract</div>
          </div>
          <div class="panel-body" style='margin-bottom: 25px;'>
            <table class='table table-striped table-condensed table-bordered' id='contract_assigned_table'>
              <thead>
                <tr>
                  <td><strong>Customer</strong></td>
                  <td><strong>Site</strong></td>
                  <td><strong>Planner Name</strong></td>
                  <td><strong>Planner ID</strong></td>
                  <td><strong>Date Saved</strong></td>
                  <td><strong>Status</strong></td>
                </tr>
              </thead>
              <tbody>
              <?
                  $count = 0;
                  while($row4 = $db->fetch($sql4))
                  { ?>
                    <tr>
                      <td><? echo $row4['CUST_NAME'] ?></td>
                      <td><? echo $row4['SITE_ADDRESS'] ?></td>
                      <td><?echo $row4['PLANNER_NAME']?></td>
                      <td><button class="modal_button" data-id="<?echo $row4['ID'] ?>" data-toggle="modal" data-target="#reassign_contract_modal" data-container='body'><font color="#000000"><b><? echo $row4['PLANNER_ID'] ?></b></font></button></td>
                      <td><? echo $row4['DATE_SUBMITTED'] ?></td>
                      <td><? echo $row4['STATUS'] ?></td>
                      <!-- <td><button id="cancel_super_contract_btn" class='btn btn-danger btn-sm' data-id="<?echo $row4['ID'] ?>">Cancel</button> -->
                    </tr>
              <?  $count++;
                  } 

               if ($count == 0){ ?>
                    <tr>
                      <td colspan='6'><div class="alert alert-warning">No contracts have been assigned</div></td>
                    </tr>
              <? } ?>
              </tbody>
            </table>
              <br>
              <h4><b><font color="#FF1919">*To reassign a contract, click the planner id</font></b></h4>
          </div>
      </div>
    </div>
  </div><br><br>

    <div id="reassign_contract_modal" class="modal fade" style="font-weight: normal;">
        <div class="modal-dialog">
              <div class="modal-content">

              </div>
        </div>
    </div>

  
  <script>

    $('#contract_approval_table').DataTable({
              "bLengthChange": false,
              "info": false,
              "scrollY": "500px",
              "scrollCollapse": true,
              "paging": false,
              "aaSorting": []
    });

    $('#contract_approval_table').css('width', '100%');

     $('#contract_assigned_table').DataTable({
              "bLengthChange": false,
              "info": false,
              "scrollY": "500px",
              "scrollCollapse": true,
              "paging": false,
              "aaSorting": []
    });

    $('#contract_assigned_table').css('width', '100%');

  </script>
 
</body>

</html>
