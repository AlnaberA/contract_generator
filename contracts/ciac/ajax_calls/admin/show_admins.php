<?
	include("../../../../database.php");
	include('../../../../models/utilities.php');

	$users_all = getAllUserData($db);

	$users_table = "
	    <table class='table table-striped table-condensed table-bordered' id='users_table'>
            <thead>
              <tr>
                <td><strong>Name</strong></td>
                <td><strong>ID</strong></td>
                <td></td>
              </tr>
            </thead>
            <tbody>";
              
	  foreach($users_all as $user)
	  {   	
	  	if ($user['PERMISSIONS'] == 'ADMIN'){
			$users_table .= "
	        <tr class='dataRows'>   
	          <td class='scheddate'>".$user['NAME']."</td>   
	          <td class='projectname'>".$user['USER_ID']."</td> 
	          <td class='view' style='width: 13.5%;''><button id='delete_user_btn' class='btn btn-danger btn-xs' data-userid=".$user['USER_ID'].">X</button></a></td>
	        </tr>";
	    }
	  }

    $users_table .= "  
            </tbody>
        </table>";

    echo $users_table;

?>