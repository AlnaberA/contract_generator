<?

  $id = $_GET['id'];

  $sql = "SELECT * FROM CONTRACT_GEN_AR WHERE ID = '{$id}'";
  $row = $db->fetch($sql);
  
  $name_cust = $row['CUST_NAME'];
  $attention = $row['ATTENTION'];
  $address_cust = $row['CUST_ADDRESS'];
  $city_cust = $row['CUST_CITY'];
  $state_cust = $row['CUST_STATE'];
  $zip_cust = $row['CUST_ZIP'];
  
  $address_site = $row['SITE_ADDRESS'];
  $place_site = $row['SITE_PLACE'];
  $type_site = $row['SITE_TYPE'];
  $project_description = $row['PROJECT_DESC'];
  $county = $row['SITE_COUNTY'];
          
  $voltage = $row['VOLTAGE'];
  $phase = $row['PHASE'];
          
  $dwg_num = $row['DRAW_NUM'];
  $dwg_date = $row['DRAW_DATE'];
          
  $service_center = $row['SERVICE_CENTER'];
  $region = $row['REGION'];
          
  $ar_estimate = $row['ESTIMATE'];
  $wonum = $row['WONUM'];
   
  $creator_name = $row['CREATED_BY'];
  $creator_id = $row['CREATOR_ID'];
  $creator_title = $row['CREATOR_TITLE'];
  $creator_phone = $row['CREATOR_PHONE'];
  $creator_email = $row['CREATOR_EMAIL'];
  
  $work_description = $row['WORK_DESCRIPTION'];
?>


<form role="form" action="contracts/ar/preview.php" target="_blank" method="post" id="ar_contract_form">
  <div class="container" style="padding-bottom: 70px;">
    <div class="page-header">
      <h2 style="color: #666666;">Edit Accounts Receivable Agreement</h2>
    </div>
    <div class="col-md-4">
        <div class="panel panel-orange panel-shadow">
        <div class="panel-heading">
          <div class="panel-title">Work Order Information</div>
        </div>
         <div class="panel-body">
            <div class="form-group">
                <label for="wonum">Work Order Number:</label>
                <input type="text" class="form-control" id="wonum" name="wonum" placeholder="WO Number" value="<?echo $wonum?>">
            </div>
        </div>
        </div>
      <div class="panel panel-blue panel-shadow">
        <div class="panel-heading">
          <div class="panel-title">Project Information</div>
        </div>
        <div class="panel-body">
            <div class="form-group">
              <label for="address_site">Worksite Address:</label>
              <input type="text" class="form-control" id="address_site" name="address_site" placeholder="Address" value="<? echo $address_site ?>">
            </div>
            <div class="form-group">
              <label for="place_site">City/Township/Village Name:</label>
              <input type="text" class="form-control" id="place_site" name="place_site" placeholder="City/Township/Village" value="<? echo $place_site ?>">
            </div>
            
        <? if ($type_site == "City"){ ?>  
            <div class="form-group" style="display:none;">
              <label class="radio-inline">
                <input type="radio" name="type_site" value="City" checked>City
              </label>  
              <label class="radio-inline">                          
                <input type="radio" name="type_site" value="Township">Township
              </label> 
              <label class="radio-inline">                          
                <input type="radio" name="type_site" value="Village">Village
              </label>             
            </div>         
        <? }

        else if ($type_site == "Township"){ ?>   
            <div class="form-group" style="display:none;">
                  <label class="radio-inline">
                    <input type="radio" name="type_site" value="City">City
                  </label>  
                  <label class="radio-inline">                          
                    <input type="radio" name="type_site" value="Township" checked>Township
                  </label> 
                  <label class="radio-inline">                          
                    <input type="radio" name="type_site" value="Village">Village
                  </label>             
              </div>
        <? }

        else if ($type_site == "Village"){  ?>   
            <div class="form-group" style="display:none;">
                  <label class="radio-inline">
                    <input type="radio" name="type_site" value="City">City
                  </label>  
                  <label class="radio-inline">                          
                    <input type="radio" name="type_site" value="Township">Township
                  </label> 
                  <label class="radio-inline">                          
                    <input type="radio" name="type_site" value="Village" checked>Village
                  </label>             
              </div>
        <? } 

        else { ?>   
            <div class="form-group" style="display:none;">
                  <label class="radio-inline">
                    <input type="radio" name="type_site" value="City">City
                  </label>  
                  <label class="radio-inline">                          
                    <input type="radio" name="type_site" value="Township">Township
                  </label> 
                  <label class="radio-inline">                          
                    <input type="radio" name="type_site" value="Village">Village
                  </label>             
              </div>
        <? } ?>       

            <div class="form-group" style="display:none;">
              <label for="project_description">Project Description:</label>
              <input type="text" class="form-control" id="project_description" name="project_description" placeholder="Description" value="<? echo $project_description ?>">
            </div>
            <div class="form-group">
              <label for="county">County:</label>
              <input type="text" class="form-control" id="county" name="county" placeholder="County" value="<? echo $county ?>">
            </div>
            <div class="form-group" style="display:none;">
              <label for="voltage">Voltage:</label>
              <select name="voltage" class="form-control" id="voltage">
                <option value="" selected style="color: #b3b3b3;">Select a Voltage...</option>
                <option value="120/208">120/208</option>
                <option value="120/240">120/240</option>
                <option value="277/480">277/480</option>
                <option value="4,800">4,800</option>
                <option value="13,200">13,200</option>
              </select>
              
                <script>
                $("#voltage").val("<? echo $voltage; ?>");
              </script>
            </div>
            
        <? if ($phase == "single"){ ?>
            <div class="form-group" style="display:none;">
                  <b>Phase: &nbsp;</b>
                  <label class="radio-inline">
                    <input type="radio" name="phase" value="single" checked>Single
                  </label>  
                  <label class="radio-inline">                          
                    <input type="radio" name="phase" value="three">Three
                  </label>           
              </div>
           <? }

        else if ($phase == "three"){ ?>
            <div class="form-group" style="display:none;">
                <b>Phase: &nbsp;</b>
                <label class="radio-inline">
                  <input type="radio" name="phase" value="single">Single
                </label>  
                <label class="radio-inline">                          
                  <input type="radio" name="phase" value="three" checked>Three
                </label>           
            </div>
        <? }

        else { ?>
              <div class="form-group" style="display:none;">
                  <b>Phase: &nbsp;</b>
                  <label class="radio-inline">
                    <input type="radio" name="phase" value="single">Single
                  </label>  
                  <label class="radio-inline">                          
                    <input type="radio" name="phase" value="three">Three
                  </label>           
              </div>
        <? } ?>
              
            <div class="form-group" style="display:none;">
              <label for="dwg_num">Drawing Number:</label>
              <input type="text" class="form-control" id="dwg_num" name="dwg_num" placeholder="Drawing Number" value="<? echo $dwg_num ?>">
            </div>
            <div class="form-group" style="display:none;">
              <label for="dwg_date">Drawing Date:</label>
                <div class="input-group date" id="datepicker">
                  <input type="text" class="form-control" id="dwg_date" name="dwg_date" placeholder="mm/dd/yyyy" value="<? echo $dwg_date ?>">
                  <label for="dwg_date" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                </div>
            </div>
        </div>
      </div>

    <div class="panel panel-purple panel-shadow">
        <div class="panel-heading">
          <div class="panel-title">Accounts Receivable Estimate</div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="ar_estimate">Total Overhead and Underground estimated construction costs:</label>
                <input type="text" class="form-control" id="ar_estimate" name="ar_estimate" placeholder="$0.00"
                value="<? echo $ar_estimate ?>">
            </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-grey panel-shadow" style="min-height: 655px;">
        <div class="panel-heading">
          <div class="panel-title">Customer Mailing Address</div>
        </div>
        <div class="panel-body">
            <div class="form-group">
              <label for="name_cust">Name:</label>
              <input type="text" class="form-control" id="name_cust" name="name_cust" placeholder="Name" value="<? echo $name_cust ?>">
            </div>
            <div class="form-group">
              <label for="attention">Attention:</label>
              <input type="text" class="form-control" id="attention" name="attention" placeholder="Attention" value="<? echo $attention ?>">
            </div>
            <div class="form-group">
              <label for="address_cust">Address:</label>
              <input type="text" class="form-control" id="address_cust" name="address_cust" placeholder="Address" value="<? echo $address_cust ?>">
            </div>
            <div class="form-group">
              <label for="city_cust">City:</label>
              <input type="text" class="form-control" id="city_cust" name="city_cust" placeholder="City" value="<? echo $city_cust ?>">
            </div>
            <div class="form-group">
              <label for="state_cust">State:</label>
              <select class="form-control" id="state_cust" name="state_cust">
                <option value="" selected style="color: #b3b3b3;">Select State...</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
              </select>
            </div>
            
             <script>
              $("#state_cust").val("<? echo $state_cust; ?>");
            </script>
            
            <div class="form-group">
              <label for="zip_cust">Zip:</label>
              <input type="text" class="form-control" id="zip_cust" name="zip_cust" placeholder="Zip" value="<? echo $zip_cust ?>">
            </div>
        </div>
    </div>
    </div>
      
    <div class="col-md-4">
      <div class="panel panel-red panel-shadow" style="min-height: 655px">
        <div class="panel-heading">
          <div class="panel-title">Contract Orginator Information</div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="Creator Name">Name:</label>
              <input type="text" class="form-control" id="creator_name" name="creator_name" value="<?echo $name?>" readonly>
            </div>
            <div class="form-group" style="display:none;">
              <label for="Creator ID">Creator ID:</label>
              <input type="text" class="form-control" id="creator_id" name="creator_id" value="<?echo $userId?>" readonly>
            </div>
            <div class="form-group" >
              <label for="Creator Title">Title:</label>
              <input type="text" class="form-control" id="creator_title" name="creator_title" value="<?echo $creator_title?>" readonly>
            </div>
            <div class="form-group">
              <label for="Creator Phone Number">Phone Number:</label>
              <input type="text" class="form-control" id="creator_phone" name="creator_phone" value="<?echo $creator_phone?>">
            </div>
            <div class="form-group">
              <label for="Creator Email">Email:</label>
              <input type="text" class="form-control" id="creator_email" name="creator_email" value="<?echo $creator_email?>" >
            </div>
             <div class="form-group">
              <label for="service_center">Service Center:</label>
              <input type="text" class="form-control" id="service_center" name="service_center" placeholder="Service Center" value="<? echo $service_center ?>">
            </div>
            <div class="form-group">
              <label for="region">Region:</label>
              <input type="text" class="form-control" id="region" name="region" placeholder="Region" value="<? echo $region ?>">
            </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="panel panel-green panel-shadow">
        <div class="panel-heading">
          <div class="panel-title">Project Information</div>
        </div>
        <div class="panel-body">
            <div class="form-group">
              <label for="work_description">Description of Work to be Performed:</label>
              <textarea class="form-control" id="work_description" style="resize:none;" name="work_description" rows="6" maxlength = "900" onKeyPress="return taLimit(this)" onKeyUp="return taCount(this,'myCounter')"><? echo $work_description ?></textarea>
              <div style="float:right; height: 10px;">
                Remaining characters: <b><span id=myCounter>900</span></b>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
    
  <div class="create_button_group">
      <center>
        <input type="submit" value="Preview" class="btn btn-info btn-lg" />&emsp; &emsp;
        <button type="button" class="btn btn-default btn-lg" id="save_saved_ar_btn" data-id="<? echo $id ?>">Save</button>
        <?if($status == 'PENDING'){?>
            &emsp; &emsp;<button type="button" class="btn btn-success btn-lg disabled" data-toggle='tooltip' title='Cannot submit a contract that has already been submitted - press save instead.'>Submit</button>
        <? }

        else {?>
            &emsp; &emsp;<button type="button" class="btn btn-success btn-lg" id="ar_edit_submit_modal" data-toggle="modal" data-target="#ar_comment_modal">Submit</button>
        <? } ?>
      </center>
  </div>
  </form>

  <script>
      $(function(){
        $("#dwg_date").datepicker();

        $('#ar_contract_form').validate({
            ignore: [],
            rules: {
                name_cust: {
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

  <script>
    maxL=900;
    var bName = navigator.appName;

    /*Function taLimit is used  for the Key Press event for the text box or text area. When a key is pressed this function checks if the total number of characters typed equals the limit allowed (value maxL defined in the javascript code). If the limit is reached then it return false thus not allowing any further key press event.*/
    function taLimit(taObj) {
      if (taObj.value.length==maxL) return false;
      return true;
    }

    /*Function taCount is used for the Key Up event. We use this to change the value of the counter displayed and to truncate the excess characters if any (example if someone has cut and pasted the value into the field when we have allowed paste). To disable paste add the property onpaste="return false" to the field. We have used the inner text property of the span element to change the counter displayed.*/
    function taCount(taObj,Cnt) {
      objCnt=createObject(Cnt);
      objVal=taObj.value;

      if (objVal.length>maxL)
        objVal=objVal.substring(0,maxL);

      if (objCnt) {
        if(bName == "Netscape"){
          objCnt.textContent=maxL-objVal.length;}
        else{objCnt.innerText=maxL-objVal.length;}
      }

      return true;
    }

    function createObject(objId) {
      if (document.getElementById)
        return document.getElementById(objId);

      else if (document.layers)
        return eval("document." + objId);

      else if (document.all)
        return eval("document.all." + objId);

      else
        return eval("document." + objId);
    }
  </script>

</body> 

<div id="ar_comment_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="margin-bottom: 0px;">Comments for Supervisor</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
          </div>
          <input type="hidden" name="id" id="id" value="<?echo $id;?>" />
          <button type="button" class="btn btn-success" id="ar_saved_submit_btn" data-id="<? echo $id ?>">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>