<?php

$sql = "SELECT * FROM CONTRACT_GEN_AR WHERE CREATOR_ID = '{$userId}' AND (STATUS = 'SAVED' OR STATUS = 'PENDING') ORDER BY STATUS, CUST_NAME DESC";

  $table = "
    <div class='container'>
      <div class='panel panel-grey panel-shadow'>
        <div class='panel-heading'>
          <div class='panel-title'>Contracts In Progress</div>
        </div>
        <div class='panel-body' style='min-height: 600px;'>
          <table class='table table-striped table-condensed table-bordered' id='saved_contracts_table'>
            <thead>
              <tr>
              
                <td><strong>Customer Name</strong></td>
                <td><strong>Work Order Number</strong></td>
                <td><strong>Last Modified</strong></td>
                <td><strong>Status</strong></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </thead>
            <tbody>";
    
    $count = 0;          
    while($row = $db->fetch($sql))
    {   
      $table .= "<tr>";

      $table .= " 
            <td>".$row['CUST_NAME']."</td>  
            <td>".$row['WONUM']."</td>
            <td>".$row['DATE_SUBMITTED']."</td>";

            if ($row['STATUS'] == 'SAVED'){
              $table .= "<td style='background-color: #ffffe6;'>".$row['STATUS']."</td>";
            }

            else if ($row['STATUS'] == 'PENDING'){
              $table .= "<td style='background-color: #fff3e6;'>".$row['STATUS']."</td>";
            }

            else if ($row['STATUS'] == 'ASSIGNED'){
              $table .= "<td style='background-color: #e6f9ff;'>".$row['STATUS']."</td>";
            }

          $table .= "<td style='width: 13.5%;'><a target='_blank' href='contracts/ar/view.php?id=".$row['ID']."&preview=true' id='preview_saved_contract_btn' class='btn btn-info btn-sm'>Preview</a></td>"; 
          $table .= "<td style='width: 13.5%;'><a href='edit.php?id=".$row['ID']."' id='edit_saved_contract_btn' class='btn btn-default btn-sm'>Edit</a></td>";

      if ($row['STATUS'] == 'SAVED'){
        $table .= "<td style='width: 13.5%;'><button id='delete_saved_contract_btn' class='btn btn-danger btn-sm' data-id=".$row['ID'].">Delete</button></td>";
      }

      else if ($row['STATUS'] == 'PENDING'){
        $table .= "<td style='width: 13.5%;'><button id='cancel_pending_contract_btn' class='btn btn-warning btn-sm' data-id=".$row['ID'].">Cancel</button></td>";
      }

      else if ($row['STATUS'] == 'ASSIGNED'){
        $table .= "<td style='width: 13.5%;'><button class='btn btn-danger btn-sm disabled' data-toggle='tooltip' title='Cannot delete a contract that has been assigned to you. Talk to supervisor for removal'>Delete</button></td>";
      }

      $table .= "</tr>";

      $count++;
    }

    if($count == 0){
      $table.= "
          <tr>
            <td colspan='7'><div class='alert alert-warning'>You have no saved contracts</div></td>
          </tr>";
    }

    $table .= "
            </tbody>
        </table>
        </div>
        </div>
        </div>";

  echo $table;

?>
  
  <div id='edit_form' style="display: none;"></div>

  <script>
    $('#saved_contracts_table').DataTable({
            'bLengthChange': false,
            'info': false,
            'pageLength': 10,
            'aaSorting': []
    });

    $('#saved_contracts_table').css('width', '100%');

    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();

      $('#saved_contracts_table').validate({
          rules: {
              name_cust: {
                  required: true
              },
              address_cust: {
                  required: true
              },
              city_cust: {
                  required: true
              },
              state_cust: {
                  required: true
              },
              zip_cust: {
                  required: true
              },
              address_site: {
                  required: true
              },
              city_site: {
                  required: true
              },
              cc_wo_num: {
                  required: true
              },
              agreement_num: {
                  required: true
              },
              dwg_num: {
                  required: true
              },
              dwg_date: {
                  required: true
              }
          },
          highlight: function (element) {
              $(element).closest('.form-group').removeClass('has-success').removeClass('remove-margin').addClass('has-error');
          }
          /*success: function (element) {
              element.closest('.form-group').removeClass('has-error').addClass('remove-margin');
          }*/
      });
    });

  </script>

</body> 

</html> 