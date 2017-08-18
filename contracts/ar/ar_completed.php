<?php
  $sql = "SELECT * FROM CONTRACT_GEN_AR WHERE STATUS = 'COMPLETED' ORDER BY DATE_SUBMITTED DESC";

  $table = "
      <div class='panel panel-black panel-shadow' style='width: 80%; margin: auto;'>
          <div class='panel-heading'>
            <div class='panel-title'>Completed Contracts</div>
          </div>
          <div class='panel-body' style='min-height: 600px;'>
            <table class='table table-striped table-condensed table-bordered' id='completed_contracts_table'>
              <thead>
                <tr>
                  <td><strong>Work Order</strong></td>
                  <td><strong>Customer Name</strong></td>
                  <td><strong>Work Site Address</strong></td>
                  <td><strong>Created By</strong></td>
                  <td><strong>Region</strong></td>
                  <td><strong>Date Approved</strong></td>
                  <td></td>
                </tr>
              </thead>
              <tbody>";

    $count = 0;
    while($row = $db->fetch($sql))
    {
      $table .= "
          <tr>
            <td>".$row['WONUM']."</td>
            <td>".$row['CUST_NAME']."</td>
            <td>".$row['SITE_ADDRESS']."</td>
            <td>".$row['CREATED_BY']."</td>
            <td>".$row['REGION']."</td>
            <td>".$row['DATE_APPROVED']."</td>
            <td style='width: 13.5%;''><a target='_blank' href='contracts/ar/view.php?id=".$row['ID']."&preview=false' id='view_contract_btn' class='btn btn-info btn-sm'>View</a></td>
          </tr>";

      $count++;
    }

    if($count == 0){
      $table.= "
          <tr>
            <td colspan='6'><div class='alert alert-warning'>There are no completed contracts</div></td>
          </tr>";
    }

    $table .= "
            </tbody>
        </table>
        </div>
        </div>";

  echo $table;

?>

  <script>
    $('#completed_contracts_table').DataTable({
            'bLengthChange': false,
            'info': false,
            'pageLength': 12,
            'aaSorting': []
    });

    $('#completed_contracts_table').css('width', '100%');

    $(function(){
      $("#from_date").datepicker();
      $("#to_date").datepicker();
    });
  </script>

</body>

<div id="dateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="margin-bottom: 0px;">Select Dates to Download</h4>
      </div>
      <div class="modal-body">
        <form action="contracts/ciac/excel_download.php" method="POST">
          <div class="form-group">
            <label for="from_date">From:</label>
            <div class="input-group date" id="from_datepicker">
              <input type="text" class="form-control" id="from_date" name="from_date" value="07/01/2016" placeholder="mm/dd/yyyy">
              <label for="from_date" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
            </div>
          </div>
          <div class="form-group">
            <label for="to_date">To:</label>
            <div class="input-group date" id="to_datepicker">
              <input type="text" class="form-control" id="to_date" value="<? echo $today; ?>" name="to_date" placeholder="mm/dd/yyyy">
              <label for="to_date" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
            </div>
          </div>
          <button type="submit" class="btn btn-success" id="excel_download_btn">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</html>
