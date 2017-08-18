<?
  //Navigation bar and CSS headers
  include('templates/navigation.php');

  if ($contract_type == "ciac"){ ?>
    <script src="js/ciac_scripts.js"></script>
  <?  
    include('contracts/ciac/ciac_edit.php');
  }

  else if($contract_type == "ar"){ ?>
    <script src="js/ar_scripts.js"></script>
  <?
    include('contracts/ar/ar_edit.php');
  }

  else { ?>
    <center>
      <div class="container">
      <h2>Please select a contract type from the navigation bar</h2>
      </div>
    </center>
<? } 

?>