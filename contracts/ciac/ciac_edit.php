<?
  $planners = getPlanners($prod);

  $id = $_GET['id'];

  $sql = "SELECT * FROM CONTRACT_GEN_CIO2 WHERE ID = '{$id}'";
  $row = $db->fetch($sql);

  $name_cust = $row['CUST_NAME'];
  $address_cust = $row['CUST_ADDRESS'];
  $city_cust = $row['CUST_CITY'];
  $state_cust = $row['CUST_STATE'];
  $zip_cust = $row['CUST_ZIP'];

  $address_site = $row['SITE_ADDRESS'];
  $city_site = $row['SITE_CITY_NAME'];
  $city_twn_vil = $row['SITE_CITY_TWN_VIL'];

  $cc_wo_num = $row['WO_NUM'];
  $agreement_num = $row['AGREE_NUM'];
  $dwg_num = $row['DRAW_NUM'];
  $dwg_date = $row['DRAW_DATE'];
  $voltage = $row['VOLTAGE'];
  $phase =  $row['PHASE'];
  $sic_code =  $row['SIC_CODE'];
  $sic_four_digit_code = substr($sic_code, -4);
  $sic_desc = strtolower(substr($sic_code, 0, -4));

  $name_planner = $row['PLANNER_NAME'];
  $id_planner = $row['PLANNER_ID'];
  $title_planner = $row['PLANNER_TITLE'];
  $phone_planner = $row['PLANNER_PHONE'];
  $email_planner = $row['PLANNER_EMAIL'];
  $region_planner = $row['PLANNER_REGION'];
  $address_planner_line1 = $row['PLANNER_ADDRESS_LINE1'];
  $address_planner_line2 = $row['PLANNER_ADDRESS_LINE2'];
  $supervisor_planner = $row['SUPERVISOR'];

  $trench_length = $row['TRENCH_LENGTH'];
  $add_trans_load = $row['TRANSFORMER_LOAD'];
  $winter_const = $row['WINTER_CONSTRUCT'];

  $ann_use = $row['ANNUAL_USAGE'];
  $ciac_credit =  $row['OPTION2_CREDIT'];

  $construct_cost = $row['COST_CONSTRUCT'];
  $permits_row = $row['PERMITS'];
  $ug_vs_oh =  $row['UGOH_EXTENSIONS'];
  $add_construct_cost = $row['ADD_CONSTRUCT_COST'];
  $add_construct_cost_reason =  $row['ADD_CONSTRUCT_DESC'];
  $system_mod_cost = $row['SYSTEM_MOD_COST'];
  $status = $row['STATUS'];
  $today = date("m/d/Y", strtotime("now"));

?>

<form role="form" action="contracts/ciac/preview.php" target="_blank" method="post" id="contract_form">
  <div class="container" style="padding-bottom: 70px;">
    <div class="page-header">
      <h2 style="color: #666666;">Edit Contract Form</h2>
    </div>
    <div class="col-md-4">
      <div class="panel panel-blue panel-shadow">
        <div class="panel-heading">
          <div class="panel-title">Customer Mailing Address</div>
        </div>
        <div class="panel-body">
            <div class="form-group">
              <label for="name_cust">Name:</label>
              <input type="text" class="form-control" id="name_cust" name="name_cust" placeholder="Name" value="<? echo $name_cust; ?>">
            </div>
            <div class="form-group">
              <label for="address_cust">Address:</label>
              <input type="text" class="form-control" id="address_cust" name="address_cust" placeholder="Address" value="<? echo $address_cust; ?>">
            </div>
            <div class="form-group">
              <label for="city_cust">City:</label>
              <input type="text" class="form-control" id="city_cust" name="city_cust" placeholder="City" value="<? echo $city_cust; ?>">
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
              <input type="text" class="form-control" id="zip_cust" name="zip_cust" placeholder="Zip" value="<? echo $zip_cust; ?>">
            </div>
        </div>
      </div>

      <div class="panel panel-purple panel-shadow">
        <div class="panel-heading">
          <div class="panel-title">Customer Site Address</div>
        </div>
        <div class="panel-body">
            <div class="form-group">
              <input type="checkbox" name="same_as_cust" id="same_as_cust"> Same as mailing
            </div>
            <div id="site_info">
              <div class="form-group">
                <label for="address_site">Address:</label>
                <input type="text" class="form-control" id="address_site" name="address_site" placeholder="Address" value="<? echo $address_site; ?>">
              </div>
              <div class="form-group">
                <label for="city_site">City/Twnship/Village:</label>
                <input type="text" class="form-control" id="city_site" name="city_site" placeholder="City/Twnship/Village" value="<? echo $city_site; ?>">
              </div>
            </div>    

             <? if ($city_twn_vil == "City"){ ?>      
                  <div class="form-group">
                        <label class="radio-inline">
                          <input type="radio" name="city_twn_vil" value="City" checked>City
                        </label>  
                        <label class="radio-inline">                          
                          <input type="radio" name="city_twn_vil" value="Township">Township
                        </label> 
                        <label class="radio-inline">                          
                          <input type="radio" name="city_twn_vil" value="Village">Village
                        </label>             
                    </div>
              <? }

              else if ($city_twn_vil == "Township"){ ?>   
                  <div class="form-group">
                        <label class="radio-inline">
                          <input type="radio" name="city_twn_vil" value="City">City
                        </label>  
                        <label class="radio-inline">                          
                          <input type="radio" name="city_twn_vil" value="Township" checked>Township
                        </label> 
                        <label class="radio-inline">                          
                          <input type="radio" name="city_twn_vil" value="Village">Village
                        </label>             
                    </div>
              <? }

              else {  ?>   
                  <div class="form-group">
                        <label class="radio-inline">
                          <input type="radio" name="city_twn_vil" value="City">City
                        </label>  
                        <label class="radio-inline">                          
                          <input type="radio" name="city_twn_vil" value="Township">Township
                        </label> 
                        <label class="radio-inline">                          
                          <input type="radio" name="city_twn_vil" value="Village" checked>Village
                        </label>             
                    </div>
              <? } ?>       
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-orange panel-shadow form-top">
        <div class="panel-heading">
          <div class="panel-title">Workorder Details</div>
        </div>
        <div class="panel-body">
            <div class="form-group">
              <label for="cc_wo_num">CC Work Order Number:</label>
              <input type="text" class="form-control" id="cc_wo_num" name="cc_wo_num" placeholder="CC WO Number" value="<? echo $cc_wo_num; ?>">
            </div>
            <div class="form-group">
              <label for="agreement_num">Agreement Number:</label>
              <input type="text" class="form-control" id="agreement_num" name="agreement_num" placeholder="Agreement Number" value="<? echo $agreement_num; ?>">
            </div>
            <div class="form-group">
              <label for="dwg_num">Drawing Number:</label>
              <input type="text" class="form-control" id="dwg_num" name="dwg_num" placeholder="Drawing Number" value="<? echo $dwg_num; ?>">
            </div>
            <div class="form-group">
              <label for="dwg_date">Drawing Date:</label>
                <div class="input-group date" id="datepicker">
                  <input type="text" class="form-control" id="dwg_date" name="dwg_date" placeholder="mm/dd/yyyy" value="<? echo $dwg_date; ?>">
                  <label for="dwg_date" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                </div>
            </div><hr>
            <div class="form-group">
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
                <div class="form-group">
                      <b>Phase: &nbsp;</b>
                      <label class="radio-inline">
                        <input type="radio" name="phase" value="single" checked>Single
                      </label>  
                      <label class="radio-inline">                          
                        <input type="radio" name="phase" value="three">Three
                      </label>           
                  </div><hr>
           <? }

            else if ($phase == "three"){ ?>
                <div class="form-group">
                    <b>Phase: &nbsp;</b>
                    <label class="radio-inline">
                      <input type="radio" name="phase" value="single">Single
                    </label>  
                    <label class="radio-inline">                          
                      <input type="radio" name="phase" value="three" checked>Three
                    </label>           
                </div><hr>
           <? }

           else { ?>
              <div class="form-group">
                  <b>Phase: &nbsp;</b>
                  <label class="radio-inline">
                    <input type="radio" name="phase" value="single" checked>Single
                  </label>  
                  <label class="radio-inline">                          
                    <input type="radio" name="phase" value="three">Three
                  </label>           
              </div><hr>
        <? } ?>

            <div class="form-group">
              <label for="sic_code">SIC Code: </label>
              <select name="sic_code" class="form-control" id="sic_code">
                  <option></option>
                  <option>Admin. of educational programs 9411</option>
                  <option>Admin. of public health programs 9431</option>
                  <option>Advertising agencies 7311</option>
                  <option>Advertising 7319</option>
                  <option>Agriculture chemicals 2879</option>
                  <option>Air transportation, scheduled 4512</option>
                  <option>Air, water & solid waste management 9511</option>
                  <option>Aircraft parts and equipment 3728</option>
                  <option>Airports, flying fields, & Services 4581</option>
                  <option>Amusement and recreation 7999</option>
                  <option>Amusement parks 7996</option>
                  <option>Animal specialties 279</option>
                  <option>Animal specialty services 752</option>
                  <option>Apartment building operators 6513</option>
                  <option>Auto and home supply stores 5531</option>
                  <option>Automobile parking 7521</option>
                  <option>Automobiles and other motor vehicles 5012</option>
                  <option>Automotive and apparel trimmings 2396</option>
                  <option>Automotive dealers 5599</option>
                  <option>Automotive repair shops 7539</option>
                  <option>Automotive services 7549</option>
                  <option>Automotive stampings 3465</option>
                  <option>Bank holding companies 6712</option>
                  <option>Beauty shops 7231</option>
                  <option>Beef cattle, except feedlots 212</option>
                  <option>Beer and ale 5181</option>
                  <option>Beet sugar 2063</option>
                  <option>Bottled and canned soft drinks 2086</option>
                  <option>Bread, cake, and related products 2051</option>
                  <option>Brick, stone, and related materials 5032</option>
                  <option>Building maintenance services 7349</option>
                  <option>Bus terminal and service facilities 4173</option>
                  <option>Business and secretarial schools 8244</option>
                  <option>Business associations 8611</option>
                  <option>Business consulting 8748</option>
                  <option>Business services 7389</option>
                  <option>Cable and other pat TV services 4841</option>
                  <option>Carpentry work 1751</option>
                  <option>Carpets and rugs 2273</option>
                  <option>Carwashes 7542</option>
                  <option>Cash grains 119</option>
                  <option>Cement, hydraulic 3241</option>
                  <option>Cemetery subdividers and developers 6553</option>
                  <option>Ceramic wall and floor tile 3253</option>
                  <option>Chemical and fertilizer mining 1479</option>
                  <option>Chemical preparations 2899</option>
                  <option>Child day care services 8351</option>
                  <option>Civic and social associations 8641</option>
                  <option>Colleges and universities 8221</option>
                  <option>Commercial art and graphic design 7336</option>
                  <option>Commercial banks 6029</option>
                  <option>Commercial equipment 5046</option>
                  <option>Commercial lighting fixtures 3646</option>
                  <option>Communications equipment 3669</option>
                  <option>Communications services 4899</option>
                  <option>Computer integrated systems design 7373</option>
                  <option>Computer related services 7379</option>
                  <option>Concrete products 3272</option>
                  <option>Construction machinery 3531</option>
                  <option>Construction materials 5039</option>
                  <option>Construction sand and gravel 1442</option>
                  <option>Corn 115</option>
                  <option>Correctional institutions 9223</option>
                  <option>Crop planting and protecting 721</option>
                  <option>Crop preparation services for market 723</option>
                  <option>Crude petroleum and natural gas 1311</option>
                  <option>Crushed and broken limestone 1422</option>
                  <option>curtains and draperies 2391</option>
                  <option>Dairy farms 241</option>
                  <option>Dairy products stores 5451</option>
                  <option>Dance studios, schools, and halls 7911</option>
                  <option>Dental equipment and supplies 3843</option>
                  <option>Dental laboratories 8072</option>
                  <option>Department stores 5311</option>
                  <option>Drinking places 581</option>
                  <option>Drug stores and proprietary stores 5912</option>
                  <option>Durable goods 5099</option>
                  <option>Dwelling operators, except apartments 6514</option>
                  <option>Eating places 5812</option>
                  <option>Edible fats and oils 2079</option>
                  <option>Electric and other services combined 4931</option>
                  <option>Electric services 4911</option>
                  <option>Electrical apparatus and equipment 5063</option>
                  <option>Electrical work 1731</option>
                  <option>Electronic components 3679</option>
                  <option>Elementary and secondary schools 8211</option>
                  <option>Engineering services 8711</option>
                  <option>Entertainers & entertainment groups 7929</option>
                  <option>Environmental controls 3822</option>
                  <option>Excavation work 1794</option>
                  <option>Executive offices 9111</option>
                  <option>Fabricated metal products 3499</option>
                  <option>Facilities support services 8744</option>
                  <option>Family clothing stores 5651</option>
                  <option>Farm and garden machinery 5083</option>
                  <option>Farm machinery and equipment 3523</option>
                  <option>Farm management services 762</option>
                  <option>Farm product warehousing and storage 4221</option>
                  <option>Farm supplies 5191</option>
                  <option>Farm-product raw materials 5159</option>
                  <option>Federal credit unions 6061</option>
                  <option>Fertilizers, mixing only 2875</option>
                  <option>Fire protection 9224</option>
                  <option>Flour and other grain mill products 2041</option>
                  <option>Fluid power pumps and motors 3594</option>
                  <option>Food crops grown under cover 182</option>
                  <option>Food preparations 2099</option>
                  <option>Fresh fruits and vegetables 5148</option>
                  <option>Fruit and vegetable markets 5431</option>
                  <option>Fuel dealers 5989</option>
                  <option>Funeral service and crematories 7261</option>
                  <option>Furniture 5021</option>
                  <option>Furniture stores 5712</option>
                  <option>Gas and other services combined 44932</option>
                  <option>Gas production and/or distribution 4925</option>
                  <option>Gas transmission and distribution 4923</option>
                  <option>Gasoline service stations 5541</option>
                  <option>General automotive repair shops 7538</option>
                  <option>General farms, primarily animal 291</option>
                  <option>General farms, primarily crop 191</option>
                  <option>General government, 9199</option>
                  <option>General industrial machinery 3569</option>
                  <option>General livestock 219</option>
                  <option>General medical & surgical hospitals 8062</option>
                  <option>General warehousing and storage 4225</option>
                  <option>Gift, novelty, and souvenir shops 5947</option>
                  <option>Glass and glazing work 1793</option>
                  <option>Grain and field beans 5153</option>
                  <option>Groceries and related products 5149</option>
                  <option>Groceries, general line 5141</option>
                  <option>Grocery stores 5411</option>
                  <option>Hardware stores 5251</option>
                  <option>Hardware 3429</option>
                  <option>Health and allied services 8099</option>
                  <option>Heating equipment, except electric 3433</option>
                  <option>Heavy construction 1629</option>
                  <option>Highway and street construction 1611</option>
                  <option>Hobby, toy, and game shops 5945</option>
                  <option>Holding Companies 6719</option>
                  <option>Home health care services 8082</option>
                  <option>Horses and other equines 272</option>
                  <option>Hospital and medical service plans 6324</option>
                  <option>Hotels and motels 7011</option>
                  <option>Household furniture 2519</option>
                  <option>Housing program 9531</option>
                  <option>Ice cream and frozen desserts 2024</option>
                  <option>Individual and family services 8322</option>
                  <option>Industrial buildings and warehouses 1541</option>
                  <option>Industrial machinery and equipment 5084</option>
                  <option>Industrial machinery 3599</option>
                  <option>Industrial supplies 5085</option>
                  <option>Insurance agents, brokers, & service 6411</option>
                  <option>Intermediate care facilities 8052</option>
                  <option>Investors 6799</option>
                  <option>Iron and steel forging 3462</option>
                  <option>Irrigation systems 4971</option>
                  <option>Junior colleges 8222</option>
                  <option>Labor organizations 8631</option>
                  <option>Land, mineral, wildlife conservation 9512</option>
                  <option>Landscape counseling and planning 781</option>
                  <option>Lawn and garden services 782</option>
                  <option>Leather tanning and finishing 3111</option>
                  <option>Legal counsel and prosecution 9222</option>
                  <option>Legal services 8111</option>
                  <option>Libraries 8231</option>
                  <option>Lighting equipment 3648</option>
                  <option>Liquor stores 5921</option>
                  <option>Livestock 5154</option>
                  <option>Livestock services, exc. veterinary 751</option>
                  <option>Local and suburban transit 4111</option>
                  <option>Local trucking, without storage 4212</option>
                  <option>Machine tool accessories 3545</option>
                  <option>Machine tools, metal cutting types 3541</option>
                  <option>Machine tools, metal forming types 3542</option>
                  <option>Management investment, open-end 6722</option>
                  <option>Manufacturing industries 3999</option>
                  <option>Marinas 4493</option>
                  <option>Measuring & controlling devices 3829</option>
                  <option>Meat and fish markets 5421</option>
                  <option>Meat packing plants 2011</option>
                  <option>Meats and meat products 5147</option>
                  <option>Medical and hospital equipment 5047</option>
                  <option>Medical laboratories 8071</option>
                  <option>Medicinals and botanicals 2833</option>
                  <option>Membership organizations 8699</option>
                  <option>Membership sports & recreation clubs 7997</option>
                  <option>Metal coating and allied services 3479</option>
                  <option>Metal doors, sash, and trim 3442</option>
                  <option>Metal heat treating 3398</option>
                  <option>Metal stamping 3469</option>
                  <option>Metals service centers and offices 5051</option>
                  <option>Metalworking machinery 3519</option>
                  <option>Millwork 2431</option>
                  <option>Mining machinery 3532</option>
                  <option>Misc. apparel & accessory stores 5699</option>
                  <option>Misc. business credit institutions 6159</option>
                  <option>Misc. general merchandise stores 5399</option>
                  <option>Miscellaneous food stores 5499</option>
                  <option>Miscellaneous metal work 3449</option>
                  <option>Miscellaneous personal services 7299</option>
                  <option>Miscellaneous retail stores, 5999</option>
                  <option>Mobile home site operators 6515</option>
                  <option>Mortgage bankers and correspondents 6162</option>
                  <option>Motion picture theaters, ex drive-in 7832</option>
                  <option>Motor vehicle parts and accessories 3714</option>
                  <option>Museums and art galleries 8412</option>
                  <option>Nailed wood boxes and shook 2441</option>
                  <option>National commercial banks 6021</option>
                  <option>National security 97141</option>
                  <option>Natural gas distribution 4924</option>
                  <option>Natural gas liquids 1321</option>
                  <option>New and used car dealers 5511</option>
                  <option>Nonclassifiable establishments 9999</option>
                  <option>Noncommercial research organizations 8733</option>
                  <option>Nonmetallic minerals services 1481</option>
                  <option>Nonresidential building operators 6512</option>
                  <option>Nonresidential construction 1542</option>
                  <option>Nursing and personal care 8059</option>
                  <option>Office equipment 5044</option>
                  <option>Offices & clinics of medical doctors 8011</option>
                  <option>Offices and clinics of dentists 8021</option>
                  <option>Offices and clinics of optometrists 8042</option>
                  <option>Offices of health practitioners, 8049</option>
                  <option>Offices of osteopathic physicians 8031</option>
                  <option>Oil and gas exploration services 1382</option>
                  <option>Oil and gas field machinery 3533</option>
                  <option>Oil and gas field services 1389</option>
                  <option>Operative builders 1531</option>
                  <option>Optical instruments and lenses 3827</option>
                  <option>Ornamental nursery product 181</option>
                  <option>Outdoor advertising services 7312</option>
                  <option>Paint, glass, and wallpaper stores 5231</option>
                  <option>Paints and allied products 2851</option>
                  <option>Paints, varnishes, and supplies 5198</option>
                  <option>Paper industries machinery 3554</option>
                  <option>Passenger car rental 77514</option>
                  <option>Petroleum and coal products 2999</option>
                  <option>Petroleum products 5171</option>
                  <option>Petroleum refining 2911</option>
                  <option>Photographic studios, portrait 7221</option>
                  <option>Physical fitness facilities 7991</option>
                  <option>Pipelines 4619</option>
                  <option>Plastics materials and resins 2821</option>
                  <option>Plastics pipe 3084</option>
                  <option>Plastics plumbing fixtures 3088</option>
                  <option>Plastics products 3089</option>
                  <option>Plumbing, heating, air-conditioning 1711</option>
                  <option>Police protection 9221</option>
                  <option>Pottery products 3269</option>
                  <option>Poultry hatcheries 254</option>
                  <option>Prefabricated metal buildings 3448</option>
                  <option>Printing and writing paper 51111</option>
                  <option>Printing ink 2893</option>
                  <option>Printing trades machinery 3555</option>
                  <option>Private household 8811</option>
                  <option>Professional organizations 8621</option>
                  <option>Public building & related furniture 2531</option>
                  <option>Public golf courses 7992</option>
                  <option>Public order and safety 9229</option>
                  <option>Pumps and pumping equipment</option>
                  <option>Racing, including track operation 7948</option>
                  <option>Radio & TV communications equipment 3663</option>
                  <option>Radio broadcasting stations 4832</option>
                  <option>Radiotelephone communications 4812</option>
                  <option>Railroad equipment 3743</option>
                  <option>Railroads, line-haul operating 4011</option>
                  <option>Real estate agents and managers 6531</option>
                  <option>Refined petroleum pipelines 4613</option>
                  <option>Refrigerated warehousing and storage 4222</option>
                  <option>Refrigeration equipment and supplies 5078</option>
                  <option>Refuse systems 4953</option>
                  <option>Regulation misc. commercial sectors 9651</option>
                  <option>Regulation, admin. of transportation 9621</option>
                  <option>Regulation, admin. of utilities 9631</option>
                  <option>Religious organizations 8661</option>
                  <option>Repair services 7699</option>
                  <option>Residential care 8361</option>
                  <option>Residential construction 1522</option>
                  <option>Retail bakeries 5461</option>
                  <option>Retail nurseries and garden stores 5261</option>
                  <option>Roofing, siding, and sheet metal work 1761</option>
                  <option>Rooming and boarding houses 7021</option>
                  <option>Rubber & plastics hose & belting 3052</option>
                  <option>Sanitary services 4959</option>
                  <option>Savings institutions, except federal 6036</option>
                  <option>Sawmills and planing mills, general 2421</option>
                  <option>School buses 4151</option>
                  <option>Schools & educational services, 8299</option>
                  <option>Scrap and waste materials 5093</option>
                  <option>Security systems services 7382</option>
                  <option>Service establishment equipment 5087</option>
                  <option>Services allied to motion pictures 7819</option>
                  <option>Services 8999</option>
                  <option>Sewerage systems 4952</option>
                  <option>Sheet metal work 3444</option>
                  <option>Signs and advertising specialties 3993</option>
                  <option>Single-family housing construction 1521</option>
                  <option>Skilled nursing care facilities 8051</option>
                  <option>Special dies, tools, jigs & fixtures 3544</option>
                  <option>Special warehousing and storage 4226</option>
                  <option>Specialty hospitals exc. psychiatric 8069</option>
                  <option>Specialty outpatient clinics 8093</option>
                  <option>Sporting & recreational goods 5091</option>
                  <option>Sporting and athletic goods 3949</option>
                  <option>Sporting and recreational camps 7032</option>
                  <option>Sporting goods and bicycle shops 5941</option>
                  <option>Sports clubs, managers & promoters 7941</option>
                  <option>Steel pipe and tubes 3317</option>
                  <option>Steel wire and related products 3315</option>
                  <option>Subdividers and developers 6552</option>
                  <option>Surveying services 8713</option>
                  <option>Tax return preparation services 7291</option>
                  <option>Telegraph & other communications 4822</option>
                  <option>Telephone and telegraph apparatus 3661</option>
                  <option>Telephone communications, exc. radio 4813</option>
                  <option>Television broadcasting stations 4833</option>
                  <option>Terrazzo, tile, marble, mosaic work 1743</option>
                  <option>Testing laboratories 8734</option>
                  <option>Theatrical producers and services 7922</option>
                  <option>Tire retreading and repair shops 7534</option>
                  <option>Tires and tubes 5014</option>
                  <option>Tobacco stores and stands 5993</option>
                  <option>Trailer parks and campsites 7033</option>
                  <option>Transportation equipment & supplies 5088</option>
                  <option>Transportation equipment 3799</option>
                  <option>Transportation service 4789</option>
                  <option>Travel agencies 4724</option>
                  <option>Travel trailers and campers 3792</option>
                  <option>Truck and bus bodies 3713</option>
                  <option>Truck trailers 3715</option>
                  <option>Trucking terminal facilities 4231</option>
                  <option>Trucking, except local 4213</option>
                  <option>Urban and community development 9532</option>
                  <option>Used merchandise stores 5932</option>
                  <option>Valves and pipe fittings 3494</option>
                  <option>Variety stores 5331</option>
                  <option>Vegetables and melons 161</option>
                  <option>Veterinary services, specialties 742</option>
                  <option>Water passenger transportation 4489</option>
                  <option>Water supply 4941</option>
                  <option>Water well drilling 1781</option>
                  <option>Water, sewer, and utility lines 1623</option>
                  <option>Welding apparatus 3548</option>
                  <option>Wine and distilled beverages 5182</option>
                  <option>Wood containers  2449</option>
                  <option>Wood kitchen cabinets 2434</option>
                  <option>Wood office furniture 2521</option>
                  <option>Wood products 2499</option>
                  <option>Woodworking machinery 3553</option>
              </select>
            </div>

            <script>
              $("#sic_code").val("<? echo $sic_code; ?>");
            </script>

        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-red panel-shadow form-top">
        <div class="panel-heading">
          <div class="panel-title">Planner</div>
        </div>
        <div class="panel-body">
            <div class="form-group">
              <label for="select_planner">Select Planner: </label>
              <select name=select_planner class="form-control" id="select_planner">
                <option></option>
                <?
                  foreach($planners as $planner){
                    echo "<option>".$planner."</option>";
                  }
                ?>
              </select>
            </div><hr>
            <div id="planner_info"></div>
        </div>
      </div>
    </div>

    <script>
      $("#select_planner").val("<? echo $name_planner; ?>");
    </script>

    <div class="col-md-12">
      <div class="panel panel-grey panel-shadow">
        <div class="panel-heading">
          <div class="panel-title">Agreement Worksheet</div>
        </div>
        <div class="panel-body">
          <div class="col-md-4">
            <hr class="hr-no-spacing-top"><h4 class="form-group-heading">Construction Details</h4><hr class="hr-no-spacing-bottom">
              <div class="form-horizontal" style="padding-top: 0px;">
                <div class="form-group">
                  <label for="trench_length" class="checkbox inline col-md-7">Trench Length:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="trench_length" name="trench_length" placeholder="Feet" value="<? echo $trench_length; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="add_trans_load" class="checkbox inline col-md-7">Add'l. Transformer Load:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="add_trans_load" name="add_trans_load" placeholder="kVA" value="<? echo $add_trans_load; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="winter_const" class="checkbox inline col-md-7">Winter Construction Installation:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="winter_const" name="winter_const" placeholder="Feet" value="<? echo $winter_const; ?>">
                  </div>
                </div>
              </div><br>

            <hr class="hr-no-spacing-top"><h4 class="form-group-heading">Standard Allowance</h4><hr class="hr-no-spacing-bottom">
              <div class="form-horizontal" style="padding-top: 0px;">
                <div class="form-group">
                  <label for="ann_use" class="checkbox inline col-md-7">Annual Usage:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="ann_use" name="ann_use" placeholder="kWh" value="<? echo $ann_use; ?>">
                  </div>
                </div><br><br><br><br>
                <div class="form-group">
                  <label for="ciac_credit" class="checkbox inline col-md-7">Option 2 CIAC Credit (D3): </label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="ciac_credit" name="ciac_credit" placeholder="$" value="<? echo $ciac_credit; ?>" readonly>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-md-2"></div>

          <div class="col-md-6">
            <hr class="hr-no-spacing-top"><h4 class="form-group-heading">Cost Details</h4><hr class="hr-no-spacing-bottom">
            <div class="form-horizontal" style="padding-top: 0px;">
                <div class="form-group">
                  <label for="construct_cost" class="checkbox inline col-md-7">Estimated Cost of Construction:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="construct_cost" name="construct_cost" placeholder="$" value="<? echo $construct_cost; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="permits_row" class="checkbox inline col-md-7">Acquiring Permits/Right-of-Way:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="permits_row" name="permits_row" placeholder="$" value="<? echo $permits_row; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ug_vs_oh" class="checkbox inline col-md-7">UG vs OH Perimeter/Offsite Ext.:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="ug_vs_oh" name="ug_vs_oh" placeholder="$" value="<? echo $ug_vs_oh; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="system_mod_cost" class="checkbox inline col-md-7">System Modification Cost:</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" id="system_mod_cost" name="system_mod_cost" placeholder="$" value="<? echo $system_mod_cost; ?>">
                    </div>
                </div> 
                <div class="form-group">
                  <label for="add_construct_cost" class="checkbox inline col-md-7">Additional Construction Costs:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="add_construct_cost" name="add_construct_cost" placeholder="$" value="<? echo $add_construct_cost; ?>">
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="add_construct_cost_reason" name="add_construct_cost_reason" placeholder="Work Done" value="<? echo $add_construct_cost_reason; ?>">
                  </div>
                </div>
                <input type="hidden" class="form-control" id="userid" name="userid" value="<?echo $userId;?>">
          </div>
        </div>
      </div>
    </div>
    <!-- <input type="submit" value="Submit" class="btn btn-lg btn-primary"> -->
    <br>
      <center>
        <input type="submit" value="Preview" class="btn btn-info btn-lg" />&emsp; &emsp;
        <button type="button" class="btn btn-default btn-lg" id="edit_save_btn" data-id="<? echo $id ?>">Save</button>
        <?if($status == 'PENDING'){?>
            &emsp; &emsp;<button type="button" class="btn btn-success btn-lg disabled" data-toggle='tooltip' title='Cannot submit a contract that has already been submitted - press save instead.'>Submit</button>
        <? }

        else {?>
            &emsp; &emsp;<button type="button" class="btn btn-success btn-lg" id="edit_submit_modal" data-toggle="modal" data-target="#ec_comment_modal">Submit</button>
        <? } ?>
      </center>
    </form>
  </div>
</div>

  <script>
    $(function(){
      $("#dwg_date").datepicker();
    });

    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();

       $('#sic_code').select2({
          placeholder: 'Select SIC Code...'
       });

       $('#select_planner').select2({
          placeholder: 'Select a Planner...'
       });

      function getPlanner(){
        var name_planner = $("#select_planner option:selected").text();

        $.ajax({
          type: "POST",
          url: "contracts/ciac/form_actions/select_planner.php",
          data:{
            name_planner:name_planner
          },
          success:function(data){
            $('#planner_info').html(data);
          }
        });
      }

      getPlanner();

      $('#contract_form').validate({
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

</body> 

<!-- Modal for scheduling a new presentation -->
<div id="ec_comment_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="margin-bottom: 0px;">Comments for Planner</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
          </div>
          <input type="hidden" name="id" id="id" value="<?echo $id;?>" />
          <button type="button" class="btn btn-success" id="edit_submit_btn" data-id="<? echo $id ?>">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</html>