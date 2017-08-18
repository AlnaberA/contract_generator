<?php
    require_once('../../../secure.php');
    include("../../../database.php");
    
    $btn_id = $_POST['id'];
    
    $sql = "SELECT * FROM CONTRACT_GEN_CIO2 WHERE ID = '{$btn_id}'";
    $row = $db->fetch($sql);
   
    $sql2 = "SELECT * FROM CONTRACT_GEN_USERS WHERE PERMISSIONS != 'ADMIN' ORDER BY NAME";
   
?>
    
    <input id="btn_id" type="text" style="display:none" value="<?echo $btn_id?>">
    
    <center>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="margin-bottom: 0px;"><b>Reassign a Contract:</b></h4><br>
          <b>Work Order # <?echo $row['WO_NUM'];?></b>
        </div>
            <div class="modal-body">
                <label for="currently_assigned">Currently Assigned To:</label>
                <input class="form-control text-center" type="text" placeholder="Name" value="<?echo $row['PLANNER_NAME']?>" style="width:40%" readonly>
            </div>
            <div class="modal-body">
                <label for="reassign_planner">Reassign To:</label>
                <select class="form-control" id="reassign_planner_select" style="width:40%">
                    <option>Make a Selection</option>
                    <? while ($row2 = $db->fetch($sql2)) { 
                       echo '<option value="'.$row2['USER_ID'].'">'.$row2['NAME'].'</option>';
                    } ?>
                </select>
            </div>
        <div class="modal-footer">
            <center>
                <button type="button" id="reassign_btn" class="btn btn-success" data-dismiss="modal">Reassign</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </center>
        </div>
    </center>