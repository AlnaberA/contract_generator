<?php
   $sql2 = "SELECT * FROM CONTRACT_GEN_USERS WHERE PERMISSIONS = 'SUPERVISOR' ORDER BY NAME";
   $sql3 = "SELECT * FROM CONTRACT_GEN_AR WHERE STATUS = 'PENDING'";
   $sql5 = "SELECT * FROM CONTRACT_GEN_USERS WHERE PERMISSIONS = 'PLANNER' ORDER BY NAME";
   
 ?>


<div class="container">
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
      <div class="panel panel-green panel-shadow">
          <div class="panel-heading">
            <div class="panel-title">Contracts Waiting Approval</div>
          </div>
          <div class="panel-body">
            <table class='table table-striped table-condensed table-bordered' id='approval_table'>
              <thead>
                <tr>
                  <td><strong>Customer</strong></td>
                  <td><strong>Site</strong></td>
                  <td><strong>Planner</strong></td>
                  <td><strong>Region</strong></td>
                  <td><strong>Supervisor</strong></td>
                  <td><strong>Date Submitted</strong></td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
              <?
                  while($row3 = $db->fetch($sql3))
                  { ?>
                    <tr>
                      <td><? echo $row3['CUST_NAME'] ?></td>
                      <td><? echo $row3['SITE_ADDRESS'] ?></td>
                      <td><? echo $row3['CREATED_BY'] ?></td>
                      <td><? echo $row3['REGION'] ?></td>
                      <td><? echo $row3['SUPERVISOR'] ?></td>
                      <td><? echo $row3['DATE_SUBMITTED'] ?></td>
                      <td><a target='_blank' href='approval.php?id=<?echo $row3["ID"]?>' class='btn btn-success btn-sm'>Approval Page</a>
                    </tr>
              <?  } ?>
              </tbody>
            </table>
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
    
    <!--Admin table-->
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


<!--Modal for adding planner-->
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
  
<script>
    $(document).ready(function(){
      //Show admins ajax call to show_admins.php
      function fetch_users(){
        $('#users').hide();
          $.ajax({
              type:"POST",
              url:"contracts/ar/ajax/admin/show_admins.php",
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
      
      //Add Admin button action
      $(document).on('click', '#add_user_btn', function(){
        if ($('#admin_form').valid()){
          var name = $('input[name=name]').val();
          var id = $('input[name=id]').val();
          
          $.ajax({
            type:"POST",
            url:"contracts/ar/ajax/admin/add_admin.php",
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
        
       //Delete Admin button action
      $(document).on('click', '#delete_user_btn', function(){
        var userid = this.getAttribute('data-userid');

        $.ajax({
          type:"POST",
          url:"contracts/ar/ajax/admin/delete_user.php",
          data: {
            userid: userid
          },
          success:function(data){
            alert('User succesfully deleted');
            fetch_users();
          }
        });
      });
      
      
      $(document).on('click', '#add_supervisor_btn', function(){
        if ($('#supervisor_form').valid()){
          var name = $('input[name=name_supervisor]').val();
          var id = $('input[name=id_supervisor]').val();

          $.ajax({
            type:"POST",
            url:"contracts/ar/ajax/admin/add_supervisor.php",
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
            url:"contracts/ar/ajax/admin/add_planner.php",
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
      
      //DataTable for Supervisor_table
     $('#supervisors_table').DataTable({
            "bLengthChange": false,
            "info": false,
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false,
            "aaSorting": []
      });

      $('#supervisors_table').css('width', '100%');
      
      //DataTable for Planner_table
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
    });
        
</script>