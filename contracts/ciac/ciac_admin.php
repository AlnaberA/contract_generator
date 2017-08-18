<?php
  include('ajax_calls/agreement_numbers.php');
  
  $sql = "SELECT * FROM CONTRACT_GEN_CIO2_VARS";
  $vars = $db->fetch($sql);

  $sql2 = "SELECT * FROM CONTRACT_GEN_USERS WHERE PERMISSIONS = 'SUPERVISOR' ORDER BY NAME";

  $sql3 = "SELECT * FROM CONTRACT_GEN_CIO2 WHERE STATUS = 'PENDING' ORDER BY PLANNER_NAME, PLANNER_REGION, DATE_SUBMITTED";

  $sql5 = "SELECT * FROM CONTRACT_GEN_USERS WHERE PERMISSIONS = 'PLANNER' ORDER BY NAME";
  
  
?>

<div class="container">
    <div class="col-md-6">
      <div class="panel panel-blue panel-shadow">
        <div class="panel-heading">
          <div class="panel-title">Agreement Numbers</div>
        </div>
        <div class="panel-body" style="height: 380px;">
            <form method="post" id="agreement_numbers_form">
                <div class="form-group">
                  <label for="current_AgrNumber">Current Number:</label>
                  <input type="text" class="form-control" id="current_AgrNumber" name="current_AgrNumber" value="<? echo $current?>">
                </div>
                <div class="form-group">
                  <label for="end_AgrNumber">Ending Agreement Number:</label>
                  <input type="text" class="form-control" id="end_AgrNumber" name="end_AgrNumber" value="<? echo $end?>">
                </div><br><br>
            </form>
            <center><button class="btn btn-default" id="update_agreementNum_btn" style="margin-bottom: 10px;">Update</button></center><br><br><br>
            <p><font color="red">For System Administrator use only.</font></p>
       </div>
        </div>
    </div>  
    
  <div class="col-md-6">
      <div class="panel panel-blue panel-shadow">
        <div class="panel-heading">
          <div class="panel-title">Standard Allowance Variables</div>
        </div>
        <div class="panel-body" style="height: 380px;">
                <form method="post" id="variables_form">
                          <div class="form-group">
                            <label for="power_supply">Power Supply Energy for all kWh:</label>
                            <input type="text" class="form-control" id="power_supply" name="power_supply" value="<? echo $vars['POWER_SUPPLY'];?>">
                          </div>
                          <div class="form-group">
                            <label for="distribution">Distribution Charge:</label>
                            <input type="text" class="form-control" id="distribution" name="distribution" value="<? echo $vars['DISTRIBUTION'];?>">
                          </div>
                          <div class="form-group">
                            <label for="base_fuel">Base Fuel:</label>
                            <input type="text" class="form-control" id="base_fuel" name="base_fuel" value="<? echo $vars['BASE_FUEL'];?>">
                          </div>
                          <div class="form-group">
                            <label for="service_charge">Service Charge:</label>
                            <input type="text" class="form-control" id="service_charge" name="service_charge" value="<? echo $vars['SERVICE_CHARGE'];?>">
                          </div>
            </form>
            <center><button class="btn btn-default" id="update_vars_btn" style="margin-bottom: 10px;">Update</button></center>
        </div>
        </div>
    </div>

    <div class="col-md-12">
    	<div class="panel panel-red panel-shadow">
          <div class="panel-heading">
              <div class="panel-title">Supervisors</div>
          </div>
          <div class="panel-body" style="height: 380px;">
            <table class='table table-striped table-condensed table-bordered' id='supervisors_table'>
              <thead>
                <tr>
                  <td></td>
                  <td><strong>Name</strong></td>
                  <td><strong>ID</strong></td>
                </tr>
              </thead>
              <tbody>
                <? $count = 1;
                  while($row2 = $db->fetch($sql2))
                { ?>
                    <tr>
                      <td><? echo $count ?></td>
                      <td><? echo $row2['NAME'] ?></td>
                      <td><? echo $row2['USER_ID'] ?></td>
                    </tr>
                <? $count++; } ?>
              </tbody>
            </table>
            <center>
              <button class="btn btn-primary" id="add_supervisor_modal" style="margin-top: 15px;" data-toggle='modal' data-target='#supervisorModal'>Add Supervisor</button>
            </center>
          </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="panel panel-orange panel-shadow">
          <div class="panel-heading">
              <div class="panel-title">Planners</div>
          </div>
          <div class="panel-body" style="height: 380px;">
            <table class='table table-striped table-condensed table-bordered' id='planners_table'>
              <thead>
                <tr>
                  <td></td>
                  <td><strong>Name</strong></td>
                  <td><strong>ID</strong></td>
                </tr>
              </thead>
              <tbody>
                <? $planner_count = 1;
                  while($row5 = $db->fetch($sql5))
                  { ?>
                    <tr>
                      <td><? echo $planner_count ?></td>
                      <td><? echo $row5['NAME'] ?></td>
                      <td><? echo $row5['USER_ID'] ?></td>
                    </tr>
               <? $planner_count++; } ?>
              </tbody>
            </table>
            <center>
              <button class="btn btn-primary" id="add_planner_modal" style="margin-top: 15px;" data-toggle='modal' data-target='#plannerModal'>Add Planner</button>
            </center>
          </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="panel panel-green panel-shadow">
          <div class="panel-heading">
            <div class="panel-title">Contracts Waiting Approval</div>
          </div>
          <div class="panel-body">
            <table class='table table-striped table-condensed table-bordered' id='approval_table'>
              <thead>
                <tr>
                  <th style="text-align: center"><strong>Customer</strong></th>
                  <th style="text-align: center"><strong>Site</strong></th>
                  <th style="text-align: center"><strong>Planner</strong></th>
                  <th style="text-align: center"><strong>Region</strong></th>
                  <th style="text-align: center"><strong>Supervisor</strong></th>
                  <th style="text-align: center"><strong>Date Submitted</strong></th>
                  <th style="text-align: center"></th>
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
                      <td><? echo $row3['PLANNER_REGION'] ?></td>
                      <td><? echo $row3['SUPERVISOR'] ?></td>
                      <td><? echo $row3['DATE_SUBMITTED'] ?></td>
                      <td><a target='_blank' href='approval_page.php?id=<?echo $row3["ID"]?>' class='btn btn-success btn-sm'>Approval Page</a></td>
                    </tr>
              <?  $count++; 
                 } ?>

              </tbody>
            </table>
          </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="panel panel-grey panel-shadow">
          <div class="panel-heading">
            <div class="panel-title">Admins</div>
          </div>
          <div class="panel-body">
            <div id="users"></div>
          </div>
          <center><button class='btn btn-primary' id='add_user_modal' data-toggle='modal' data-target='#adminModal' style="margin-bottom: 20px;">Add Admin</button>&nbsp;&nbsp;</center>
      </div>
    </div>
      
</div><br><br><br>

  <script>
    $(document).ready(function(){
      function fetch_users(){
        $('#users').hide();
          $.ajax({
              type:"POST",
              url:"contracts/ciac/ajax_calls/admin/show_admins.php",
              success:function(data){
                  $('#users').html(data);
                  $('#users').show();
                  $("#user_form").trigger('reset');
                  $('#users_table').DataTable({
                        "bLengthChange": false,
                        "info": false,
                        "scrollY": "300px",
                        "scrollCollapse": true,
                        "paging": false,
                        "aaSorting": []
                  });

                  $('#users_table').css('width', '100%');
              }
          });
      }

      fetch_users();

      $('#variables_form').validate({
          rules: {
              power_supply: {
                  required: true
              },
              distribution: {
                  required: true
              },
              base_fuel: {
                  required: true
              },
              service_charge: {
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
      
      $('#agreement_numbers_form').validate({
          rules: {
              current_AgrNumber: {
                  required: true
              },
              end_AgrNumber: {
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

      $('#admin_form').validate({
          rules: {
              name: {
                  required: true
              },
              id: {
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

      $('#supervisor_form').validate({
          rules: {
              name: {
                  required: true
              },
              id: {
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

      $(document).on('click', '#add_user_btn', function(){
        if ($('#admin_form').valid()){
          var name = $('input[name=name]').val();
          var id = $('input[name=id]').val();

          $.ajax({
            type:"POST",
            url:"contracts/ciac/ajax_calls/admin/add_admin.php",
            data: {
              name: name,
              id: id
            },
            success:function(data){
              alert('User succesfully added');
              $('#adminModal').modal('hide');
              fetch_users();
            }
          });
        }
      });

      $(document).on('click', '#add_supervisor_btn', function(){
        if ($('#supervisor_form').valid()){
          var name = $('input[name=name_supervisor]').val();
          var id = $('input[name=id_supervisor]').val();

          $.ajax({
            type:"POST",
            url:"contracts/ciac/ajax_calls/admin/add_supervisor.php",
            data: {
              name: name,
              id: id
            },
            success:function(data){
              alert('User succesfully added');
              location.reload();
            }
          });
        }
      });

      $(document).on('click', '#add_planner_btn', function(){
        if ($('#supervisor_form').valid()){
          var name = $('input[name=name_planner]').val();
          var id = $('input[name=id_planner]').val();

          $.ajax({
            type:"POST",
            url:"contracts/ciac/ajax_calls/admin/add_planner.php",
            data: {
              name: name,
              id: id
            },
            success:function(data){
              alert('User succesfully added');
              location.reload();
            }
          });
        }
      });

      $(document).on('click', '#delete_user_btn', function(){
        var userid = this.getAttribute('data-userid');

        $.ajax({
          type:"POST",
          url:"contracts/ciac/ajax_calls/admin/delete_user.php",
          data: {
            userid: userid
          },
          success:function(data){
            alert('User succesfully deleted');
            fetch_users();
          }
        });
      });

      $(document).on('click', '#update_vars_btn', function(){
        if ($('#variables_form').valid()){
          var power_supply = $('input[name=power_supply]').val();
          var distribution = $('input[name=distribution]').val();
          var base_fuel = $('input[name=base_fuel]').val();
          var service_charge = $('input[name=service_charge]').val();

          $.ajax({
            type:"POST",
            url:"contracts/ciac/ajax_calls/admin/update_vars.php",
            data: {
              power_supply: power_supply,
              distribution: distribution,
              base_fuel: base_fuel,
              service_charge: service_charge
            },
            success:function(data){
              alert('Variables updated succesfully');
              location.reload();
            }
          });
        }

        else{
          alert('All variables must have a value');
        }
      });

      $(document).on('click', '#update_supervisors_btn', function(){
        $.ajax({
          type:"POST",
          url:"contracts/ciac/ajax_calls/admin/update_supervisors.php",
          success:function(data){
            alert('Supervisors list has been updated successfully');
            location.reload();
          }
        });
      });

      $('#supervisors_table').DataTable({
            "bLengthChange": false,
            "info": false,
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false,
            "aaSorting": []
      });

      $('#supervisors_table').css('width', '100%');

      $('#planners_table').DataTable({
            "bLengthChange": false,
            "info": false,
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false,
            "aaSorting": []
      });

      $('#planners_table').css('width', '100%');

      $('#approval_table').DataTable({
            "bLengthChange": false,
            "info": false,
            'pageLength': 8,
            "aaSorting": []
      });

      $('#approval_table').css('width', '100%');
      
    $(document).on('click', '#update_agreementNum_btn', function(){
         
            var flag1Input = false;//assume wrong input if the input is null
            var flag2Input = false;//assume wrong input if input is incorrect
            var CURRENT = $('input[name=current_AgrNumber]').val();
            var END = $('input[name=end_AgrNumber]').val();
            
            
            if ($('#agreement_numbers_form').valid()){ //if the input is null
               flag1Input = true;
            }else{
               flag1Input = false;
            }
            if (CURRENT < END){ //if input is incorrect
                  flag2Input = true;
            }else{
                flag2Input = false;
            }
            
            if(flag1Input && flag2Input){
                   $.ajax({
                     type:"POST",
                     url:"contracts/ciac/ajax_calls/admin/update_agreement_number.php",
                     data: {
                         CURRENT: CURRENT,
                         END: END
                       },
                     success:function(data){
                         alert("Successfully updated agreement numbers.");
                         location.reload();
                     }
                   });
            } else if(!(flag1Input)){
               alert('All variables must have a value');
               return false;
            }else if(!(flag2Input)){
               alert("Current number must be less than end number!");
               return false;
            }
            
            
      });
      
    });
    
  </script>

<!-- Modal for adding an admin -->
<div id="adminModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="margin-bottom: 0px;">Add Admin</h4>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" id="admin_form">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" placeholder="DTE ID">
          </div>
        </form>
        <button id="add_user_btn" class="btn btn-primary btn-sm">Submit</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for adding an supervisor -->
<div id="supervisorModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="margin-bottom: 0px;">Add Supervisor</h4>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" id="supervisor_form">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name_supervisor" name="name_supervisor" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id_supervisor" name="id_supervisor" placeholder="DTE ID">
          </div>
        </form>
        <button id="add_supervisor_btn" class="btn btn-primary btn-sm">Submit</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="plannerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="margin-bottom: 0px;">Add Planner</h4>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" id="supervisor_form">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name_planner" name="name_planner" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id_planner" name="id_planner" placeholder="DTE ID">
          </div>
        </form>
        <button id="add_planner_btn" class="btn btn-primary btn-sm">Submit</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
