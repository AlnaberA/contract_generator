<?
  require_once('secure.php');
  include("database.php");
  include('models/utilities.php');
  include('models/notifications.php');

  $userId = $user['usid'];
  $name = $user['name'];

  //Utilities
  $admin_id = getAdminIDs($db);
  $supervisors = getSupervisorIDs($db);
  $users = getUserIDs($db);
  $pending_contracts_count = getPendingCount($userId, $db);
  $assigned_contracts_count = getAssignedCount($userId, $db);
  $contract_type = getUserContractType($userId, $db);

  //Notification utilities
  $notification_data = getNotificationData($userId, $db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="icon" href="../../favicon.ico"> -->

  <title>Contract Generator</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="css/design.css">

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.min.js"></script>
  <script src="js/scripts.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Contract Generator</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
       <? if (in_array($userId, $users)){ ?>
            <li id="home_nav"><a href="index.php">Home</a></li>
            <li id="create_nav"><a href="create.php">Create</a></li>
            <? if ($assigned_contracts_count == 0) {?>
                  <li id="inprogress_nav"><a href="in_progress.php">In Progress</a></li>
            <? }

               else { ?>
                  <li id="inprogress_nav"><a href="in_progress.php">In Progress <span class="label label-danger" style="font-size: 8pt;"><?echo $assigned_contracts_count?></span></a></li>
            <? }
          } ?>
          <li id="approved_nav"><a href="approved.php">Approved</a></li>
          <li id="completed_nav"><a href="completed.php">Completed</a></li>
          <? if (in_array($userId, $supervisors)){
                if ($pending_contracts_count == 0) {?>
                  <li id="supervisor_nav"><a href="supervisor.php">Supervisor</a></li>
                <? }

                else { ?>
                  <li id="supervisor_nav"><a href="supervisor.php">Supervisor <span class="label label-danger" style="font-size: 8pt;"><?echo $pending_contracts_count?></span></a></li>
                <?}
             } ?>
          <? if (in_array($userId, $admin_id)){ ?>
                <li id="admin_nav"><a href="admin.php">Admin</a></li>
          <? } ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <div class="form-group" style="margin-top: 10px; margin-bottom: 0px;">
              <select class="form-control" name="contract_type" id="contract_type" style="width: 250px;">
                <option value="">Please select a contract type...</option>
                <option value="ar">Accounts Receivable</option>
                <option value="ciac">Commercial/Industrial Option 2</option>
              </select>
            </div>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user"></span><? echo ' '; echo $name; ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li style="padding-bottom: 5px;"><center><?mcl_Header::logout_btn();?></center></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav><br><br><br><br>

  <script>
    setContractType();
    setActivePage();

    $('#contract_type').select2({
        placeholder: 'Select a Contract Type...'
     });

    function setContractType(){
      var contract_type = <?php echo json_encode($contract_type); ?>;
      $("#contract_type").val(contract_type);
    }

    function setActivePage(){
      var page = window.location.href;
      var slashLocation = page.lastIndexOf('/');
      page = page.substring(slashLocation + 1, page.length);

      if (page == "index.php" || page == "" || page == "#"){
        $('#home_nav').addClass('active');
      }

      else if (page == "create.php"){
        $('#create_nav').addClass('active');
      }

      else if (page == "in_progress.php"){
        $('#inprogress_nav').addClass('active');
      }

      else if (page == "approved.php"){
        $('#approved_nav').addClass('active');
      }

      else if (page == "completed.php"){
        $('#completed_nav').addClass('active');
      }

      else if (page == "supervisor.php"){
        $('#supervisor_nav').addClass('active');
      }

      else if (page == "admin.php"){
        $('#admin_nav').addClass('active');
      }
    }
  </script>
