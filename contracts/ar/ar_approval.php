<?php
  $id = $_GET['id'];
?>

  <center>
    <div style="margin-top: 20px;">
        <iframe src="contracts/ar/view.php?id=<? echo $id ?>&preview=false" style="height: 700px; width: 1000px;" wmode="Opaque"></iframe>
    </div><br>
  </center>


<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
      <form role="form" method="post" id="signature_form" class="form-inline" style="float: left;">
          <div class="input-group">
                <label for="approval_sig">eSignature:</label>
                <input type="text" class="form-control" id="approval_sig" name="approval_sig" placeholder="Name">
          </div>
      </form>
      <br><div style="float: right;"><button type="button" style="margin-top: 5px;" class="btn btn-default" id="approve_btn" data-id="<? echo $id ?>">Approve</button></div>
  </div>
  <div class="col-md-4"></div>
</div>
<br><br><br><br>

<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
      <form role="form" method="post" class="form-inline" style="float: left;">
          <div class="input-group">
                <label for="comment">Comments:</label>
                <textarea class="form-control" rows="3" id="comment" name="comment"></textarea>
          </div>
          <input type="hidden" id="id" name="id" value=<?echo $id;?>>
      </form>
      <br><div style="float: right;"><button type="button" class="btn btn-danger" id="reject_btn" style="margin-bottom: 100px; margin-top: 25px;">Reject</button></div>
  </div>
  <div class="col-md-4"></div>
</div>
