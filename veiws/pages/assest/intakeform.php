<ul>
    <li id="foli101" class="notranslate">
        <label class="desc" id="title116" for="uh_id">UH ID Number</label>
        <div>
        <input type='text' name='uh_id' id='uh_id' class="field text medium" 
             maxlength="255" value = '<?php echo (isset($uh_id))?$uh_id:""; ?>'/> 
             <span>Note: You can get this from <a href="#" target="_blank">foo</a></span>
        </div>
    </li>

    <li id="foli102" class="notranslate ">
        <label class="desc" id="title101" for="last_name"> <!--header for the block-->
            Name
        </label>

        <span>
            <input type='text' name='first_name' id='first_name' class="field text long"  maxlength="255"  onkeyup="" value='<?php echo (isset($first_name))?$first_name:""; ?>' required/> 
           <label for="last_name">First<span class="req">*</span></label>
        </span>
        <span>
            <input type='text' name='last_name' id='last_name' class="field text long" 
               maxlength="255"  onkeyup=""
               value = '<?php echo (isset($last_name))?$last_name:""; ?>' required/> 
           <label for="last_name">Last<span class="req">*</span></label>
        </span>

    </li>
</ul>
    
<ul>
    <li id="foli103" class="notranslate ">
        <label class="desc" id="title103" for="homephone"> <!--header for the block-->
           Phone Numbers
        </label>
     
        <span>
            <input type='text' name='homephone' id='homephone'  placeholder='xxx-xxx-xxxx' 
               class="field text long"  maxlength="255"  onkeyup=""
               value='<?php echo (isset($homephone))?$homephone:""; ?>'/>
            <label for="homephone">Home Phone<span class="req">*</span></label>
        </span>
        <span>
           <input type='text' name='cellphone' id='cellphone' placeholder='xxx-xxx-xxxx'
           class="right field text long" size="25" maxlength="255"  onkeyup=""
           value='<?php echo (isset($cellphone))?$cellphone:""; ?>'/>
           <label for='cellphone'>Cell Phone Number<span class="req">*</span></label>
        </span>		

    </li>
</ul>
<ul>
    <!-- put the address row-block here -->
    <li id="foli104" class="complex notranslate">
        <label class="desc" id="title107" for="address">
          Residence Address
         <span id="req_110" class="req">
            *
          </span>
        </label>
        <div>
            <span class="full addr1">
                <input id="address" name="address" type="text" class="field text addr" 
                     value='<?php echo (isset($address)) ?$address:"";?>'
                      required />
                <label for="address">Street Address<span class="req">*</span>
                </label>
            </span>
            <span class="left city">
                <input id="city" name="city" type="text" class="field text addr" 
                value='<?php echo (isset($city)) ?$city:"";?>'
                 required />
                <label>City</label>
              </span>
            <span class="right state">
                <input id="state" name="state" type="text" class="field text addr" 
                value= '<?php echo (isset($state)) ?$state:"";?>'
                required />
                <label for="state">
                  State / Province / Region
                </label>
            </span>
            <span class="left zip">
                <input id="zip" name="zip" type="text" class="field text addr" 
                value='<?php echo (isset($zip)) ?$zip:"";?>' 
                maxlength="15"  required />
                <label for="zip">
                  Postal / Zip Code
                </label>
            </span>
            <span class="right country">   
                
                <select name='country' id='country' class="field select addr" >
                    <option value="">Choose a country</option>
                    <?php $countryArray = array("Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia",
                          "Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus",
                          "Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei",
                          "Bulgaria","Burkina Faso","Burma","Burundi","Cambodia","Cameroon","Canada","Cape Verde",
                          "Central African Republic","Chad","Chile","China","Colombia","Comoros","Congo","Costa Rica",
                          "Cote d'Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica",
                          "Dominican Republic","East Timor (see Timor-Leste)","Ecuador","Egypt","El Salvador","Equatorial Guinea",
                          "Eritrea","Estonia","Ethiopia","Fiji","Finland","France","Gabon","Gambia","Georgia","Germany",
                          "Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana",	"Haiti","Holy See","Honduras",
                          "Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica",
                          "Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea, North","Korea, South","Kosovo","Kuwait",
                          "Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania",
                          "Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta",
                          "Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia",
                          "Montenegro","Morocco","Mozambique","Namibia","Nauru","Nepal","Netherlands","Netherlands Antilles",
                          "New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau",
                          "Palestinian Territories","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland",
                          "Portugal","Qatar","Romania","Russia","Rwanda","Saint Kitts and Nevis","Saint Lucia",
                          "Saint Vincent and the Grenadines","Samoa ","San Marino","Sao Tome and Principe","Saudi Arabia",
                          "Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Sint Maarten","Slovakia","Slovenia",
                          "Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain ","Sri Lanka",
                          "Sudan","Suriname","Swaziland ","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania",
                          "Thailand","Timor-Leste","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan",
                          "Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","Uzbekistan","Vanuatu",
                          "Venezuela","Vietnam","Yemen","Zambia","Zimbabwe");
                          foreach($countryArray as $k=>$value){
                          echo'<option '.((isset($country)&& $country==$value)?"selected":"").'>'.$value.'</option>';
                        }
                        ?>	
                </select>	
                <label for="country">Country</label>
            </span> 
        </div>
    </li>		
    
    <!-- put the Mailing address row-block here -->
    <li id="foli105" class="complex notranslate">
        <label class="desc" id="title109" for="address">
          Mailing Address if different from residence address
        <span id="req_108" class="req">
            *
          </span>
        </label>
    <div>
        <span class="full addr1">
            <input id="mailaddress" name="mailaddress" type="text" class="field text addr" 
                 value='<?php echo (isset($mailaddress)) ?$mailaddress:"";?>'
                 required />
            <label for="mailaddress">Street Address<span class="req">*</span>
            </label>
        </span>
        <span class="left city">
            <input id="mailcity" name="mailcity" type="text" class="field text addr" 
            value='<?php echo (isset($mailcity)) ?$mailcity:"";?>'
            required />
            <label>City</label>
          </span>
        <span class="right state">
            <input id="mailstate" name="mailstate" type="text" class="field text addr" 
            value= '<?php echo (isset($mailstate)) ?$mailstate:"";?>'
             required />
            <label for="mailstate">
              State / Province / Region
            </label>
          </span>
        <span class="left zip">
            <input id="mailzip" name="mailzip" type="text" class="field text addr" 
            value='<?php echo (isset($mailzip)) ?$mailzip:"";?>' 
            maxlength="15"  required />
            <label for="zip">
              Postal / Zip Code
            </label>
          </span>
        <span class="right country">   
          
           <select name='mailcountry' id='mailcountry' 
                class="field select addr" >
                <option value="">Choose a country</option>
                      <?php $mailcountryArray = array("Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia",
                      "Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus",
                      "Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei",
                      "Bulgaria","Burkina Faso","Burma","Burundi","Cambodia","Cameroon","Canada","Cape Verde",
                      "Central African Republic","Chad","Chile","China","Colombia","Comoros","Congo","Costa Rica",
                      "Cote d'Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica",
                      "Dominican Republic","East Timor (see Timor-Leste)","Ecuador","Egypt","El Salvador","Equatorial Guinea",
                      "Eritrea","Estonia","Ethiopia","Fiji","Finland","France","Gabon","Gambia","Georgia","Germany",
                      "Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana",	"Haiti","Holy See","Honduras",
                      "Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica",
                      "Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea, North","Korea, South","Kosovo","Kuwait",
                      "Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania",
                      "Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta",
                      "Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia",
                      "Montenegro","Morocco","Mozambique","Namibia","Nauru","Nepal","Netherlands","Netherlands Antilles",
                      "New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau",
                      "Palestinian Territories","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland",
                      "Portugal","Qatar","Romania","Russia","Rwanda","Saint Kitts and Nevis","Saint Lucia",
                      "Saint Vincent and the Grenadines","Samoa ","San Marino","Sao Tome and Principe","Saudi Arabia",
                      "Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Sint Maarten","Slovakia","Slovenia",
                      "Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain ","Sri Lanka",
                      "Sudan","Suriname","Swaziland ","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania",
                      "Thailand","Timor-Leste","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan",
                      "Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","Uzbekistan","Vanuatu",
                      "Venezuela","Vietnam","Yemen","Zambia","Zimbabwe");
                      foreach($countryArray as $k=>$value){
                      echo'<option '.((isset($country)&& $country==$value)?"selected":"").'>'.$value.'</option>';
            }
            ?>	
            </select>	
                 <label for="mailcountry">Country</label>	
        </span> 
     </div>
    </li>	
<!--new sub section of contact -->
    <li id="foli106" class="complex notranslate">	
        <label class="desc" id="title110" for="address">
            Email Address And Preferred Method of contact
        <span id="req_109" class="req">*</span>
        </label>
     <div>
           <!--text field-->
        <span class="radio field" style="margin-right:125px;">
            <input type='email' name='email_address' id='email_address' placeholder='name@domain.com' 
               class="field select addr" maxlength="255"  onkeyup=""
                value ='<?php echo (isset($email_address)) ?$email_address:"";?>' />
         <label for='email_address'>E-mail address<span class="req">*</span></label>
        </span>
    
    <!--   THREE CHOICE ARRAY choose one-->
        
        <span class="radio field"> 
            <?php $notificationArray = array("E-mail","Postal Mail ","Telephone");
                foreach($notificationArray as $k=>$v){
                    $is_checked =((isset($notification) && $notification==$v)?"checked":"");
                    echo "<span><input type='radio' name='notification'  value='".$v."' /> ".$v."</span>";	
                }
            ?>
            <label>Preferred Method of Notification. choose one<span class="req">*</span></label>
        </span>
        
    </div>	
    </li>
</ul>

<h3 class="block_header" style="">Demographics</h3>
<ul>
    <li id="foli109" class="complex notranslate">  
    <div>
        <span class="radio field"> <!-- fields with in the block-->
            <label for='age'>Age</label> 
            <input type='text' name='age' id='age'  class="field select addr" maxlength="3" value='<?php echo (isset($age)) ?$age:"";?>'/>
              
        </span>       
   
        <span class="radio field" style="margin-right:45px";>
            <label for='dob'>Birth Date</label>      
             <input type='date' name='dob' id='dob' class="field select addr" placeholder='MM-DD-YYYY'  value='<?php echo (isset($dob)) ?$dob:"";?>'/>

         
        </span>  
     </div>	 
    </li>
     
    <li id="foli110" class="complex notranslate"> 
     <div>		 
        <span class="radio field" style="margin-right:45px;" >
         <label>Gender</label>
            <?php $genderArray = array("Male","1"=>"Female");
               foreach($genderArray as $v){
               $is_checked=((isset($gender) && $gender==$v)?"checked":"");
               //we now replace the template with the vars holding the data
               $thePattern_aka_template = "<input type='radio' name='gender' {$is_checked} value='{$v}' /> {$v}";
                echo $thePattern_aka_template;

            }
         ?>
        </span>  
         
        <span class="radio field"  style="margin-right:25px;" >
          <label>Single Parent</label>
             <?php
              $single_parentArray = array("Yes","No");
              foreach($single_parentArray as $k =>$v){
               echo "<input type='radio' name='single_parent' ". ((isset($single_parent) && $single_parent==$v)?"checked":"")." value='".$v."' /> ".$v."";
           }
           ?> 
        </span>	
         
        <span class="radio field" style="margin-left:25px;" >
         <label>Is English your First language?</label>			
          <?php
           $englishArray = array("Yes","No");
           foreach($englishArray as $k =>$v){
           echo "<input type='radio' name='english' ".
           ((isset($english) && $english==$v)?"checked":"").
            " value='".$v."' /> ".$v."";
          }
          ?>
        </span>			 
     </div>	 
    </li>
     
    <li id="foli111" class="complex notranslate"> 
     <div>
        <!--TWO RADIO BUTTON-->
        <span class="radio field" style="margin-right:25px;" > 
            <label>Are you a resident of the state of Hawaii?</label>

            <?php $residentArray = array("Yes","No");
                foreach($residentArray as $v){
                    echo "<input type='radio' name='resident' ". 
                ((isset($resident) && $resident==$v)?"checked":"")." 
                value='".$v."' /> ".$v."";
                }
            ?>
       <!--    <label for="resident">Are you a resident of the state of Hawaii?</label> -->
        </span>
          <!--short dropdown select -->
        <span style="margin-left:55px;" ><!--<label for='island'>Island</label>-->
        <label for='island'>Island</label> 
            <select name='island' id='island' class="field select addr" >
                <option value="">Choose Island</option>
                <?php
                  $islandArray = array("Hawai`i","Maui","O`ahu","Kaua`i","Moloka`i","Lana`i");
                  foreach($islandArray as $k=>$value){
                  echo '<option '. ((isset($island) && $island==$value)?"selected":"") .'>'.$value.'</option>';
               }
               ?>
          </select>
        </span>

      </div>
      <div>
        <span class="radio field" > 
            <label>Are you a U.S. Citizenship? choose one</label>
            <?php $citizenArray = array("U.S. Citizen","Non-Citizen Allowed to Work ","Non-Citizen NOT Allowed to Work");
                foreach($citizenArray as $k=>$v){
                   echo "<span><input type='radio' name='citizen' ". 
                 ((isset($citizen) && $citizen==$v)?"checked":"")."value='".$v."' /> ".$v."</span>";
                }
             ?>	   
        </span>	
    </div>
    </li>
    
    <li id="foli112" class="complex notranslate"> 
    <div>
        <span class="radio field" >
             <label>Hispanic or Latino</label>
             <?php
             $hispanicArray = array("Yes","No");
              foreach($hispanicArray as $k =>$v){
               echo "<input type='radio' name='hispanic'  ". ((isset($hispanic) && $hispanic==$v)?"checked":"")." value='".$v."' /> ".$v."";
            }
          ?>
        </span>

        <span style="margin-left:100px" class="radio field" >
             <label>Native Hawaiian Ancestry</label>
             
                <?php
                 $nativehawArray = array("Yes","No");
                 foreach($nativehawArray as $k =>$v){
                 echo "<input type='radio' name='nativehaw' ". ((isset($nativehaw) && $nativehaw==$v)?"checked":"")." value='".$v."' /> ".$v."";
               }
             ?> 				 
        </span>
         
        <span class="radio field" > 
           <label>Race Select all that apply</label>
            <?php $raceArray = array("American Indian","Alaskan Native","Native Hawaiian or Pacific Islander","Asian","Hispanic","African American or Black","Caucasian or White");
               foreach($raceArray as $k =>$v){
                echo "<span><input type='checkbox' name='race[]' ".
              ((isset($race) && in_array($v,$race))?"checked":"").
            " value='".$v."' />".$v."</span>"; 
                }
             ?>
        </span>
     </div>
    </li>
</ul>

<h3 class="block_header">Military and Veteran Status</h3>
<ul>
    <li id="foli115" class="complex notranslate">  
     <div>
        <span class="radio field">  	   
         <label>Active or prior member of the Military?</label>
                <?php
                $militaryArray = array("Yes","No");
                foreach($militaryArray as $k =>$v){
              echo "<input type='radio' name='military' ". ((isset($military) && $military==$v)?"checked":"")." value='".$v."' /> ".$v."";
             }
            ?> 
        </span>

        <span style="margin-left :25px" class="radio field" >	 
         <label>Spouse served in U.S. Military?</label>    
             <?php
             $military_spouseArray = array("Yes","No");
             foreach($military_spouseArray as $k =>$v){
             echo "<input type='radio' name='military_spouse' ". ((isset($military_spouse) && $military_spouse==$v)?"checked":"")." value='".$v."' /> ".$v."";
             }
           ?>
        </span>
    </div>
    </li>
      
    <li id="foli113" class="complex notranslate">
     <div>

       
        <span class="radio field" >  
        <label>Veteran Status?:</label>
             <?php
            $va_statusArray = array("Less than 180 days","Eligible Vet","Eligible Spouse","Dependent","Not Eligible");
            foreach($va_statusArray as $k =>$v){
            echo "<span><input type='radio' name='va_status' ". ((isset($va_status) && $va_status==$v)?"checked":"")." value='".$v."' /> ".$v."</span>";
           }
          ?>  
        </span>
        <span class="radio field" >
       <label class="radio field">Campaign Veteran</label>
           <?php
            $vet_campaignArray = array("Yes","No","N/A");
            foreach($vet_campaignArray as $k =>$v){
             echo "<input type='radio' name='vet_campaign' ". ((isset($vet_campaign) && $vet_campaign==$v)?"checked":"")." value='".$v."' /> ".$v."";
           }
           ?>  
        </span>
     </div>
    </li>
      
   
    
    <li id="foli114" class="complex notranslate">
     <div>
        <span class="radio field" > 	 
           <label>Recently Separated Veteran</label>
                <?php
                 $vet_separatedArray = array("Yes","No","N/A");
                 foreach($vet_separatedArray as $k =>$v){
                 echo "<input type='radio' name='vet_separated' ". ((isset($vet_separated) && $vet_separated==$v)?"checked":"")." value='".$v."' /> ".$v."";
               }
               ?>
        </span>

        <span class="radio field" style="margin-left :55px;">
           <label>Disabled Veteran</label>	             
               <?php
                $vet_disabledArray = array("Yes","Yes, Special Disabled","N/A");
                foreach($vet_disabledArray as $k =>$v){
                echo "<input type='radio' name='vet_disabled' ". ((isset($vet_disabled) && $vet_disabled==$v)?"checked":"")." value='".$v."' /> ".$v."";
              }
              ?>
        </span>
     </div>
    </li>
</ul>
    
<h3 class="block_header">Education</h3>
<ul>
    <li id="foli116" class="complex notranslate">  
    <div> 
        <span class="radio field">
        <label>What is your current educational Status?</label>
            <?php
            $ed_statusArray = array("In school,High School or less","In School, Alternative School","In school,Post-High School","Not attending school, High School Drop-out","Not attending school, High School Graduate");
            foreach($ed_statusArray as $k =>$v){
            echo "<input type='radio' name='ed_status' ". ((isset($ed_status) && $ed_status==$v)?"checked":"")." value='".$v."' /> ".$v."<br/>";
          }
          ?>	   
        </span>

        <span class="radio field" style="padding-right:10px; border-right:1px solid #494949;margin-right:15px;" >
           <label>Highest grade completed:</label>
               <?php
                $highestgradeArray = array("No School Grades Completed","GED or Equivalent","High School Diploma","Certificate of Attendance/Completion","Associate Diploma or Degree","Bachelor's Degree or Equivalent","Other Post-Secondary Degree or Certificate","Education beyond Bachelor's Degree");
                foreach($highestgradeArray as $k =>$v){
                echo "<input type='radio' name='highestgrade' ". ((isset($highestgrade) && $highestgrade==$v)?"checked":"")." value=\"".$v."\" /> ".$v."<br/>";
               }
               ?>	  	   
        </span>
 
        <span>
           <label>Pell Grant Recipient</label>
               <?php
                $pellArray = array("Yes","No");
                foreach($pellArray as $k =>$v){
                echo "<input type='radio' name='pell' ". ((isset($pell) && $pell==$v)?"checked":"")." value='".$v."' /> ".$v."<br/>";
               }
              ?>   
        </span>
     </div>
    </li>
</ul>


<h3 class="block_header">Economics</h3>	
<ul>
    <li id="foli117" class="complex notranslate">  
    <div>
        <span class="radio field">
           <label>Low Income</label>	   
                <?php
                 $lowincomeArray = array("Yes","No");
                 foreach($lowincomeArray as $k =>$v){
                 echo "<input type='radio' name='lowincome' ". ((isset($lowincome) && $lowincome==$v)?"checked":"")." value='".$v."' /> ".$v."";
                }
               ?>   	   
        </span>
 
        <span style="margin-left :45px" class="center radio field">
           <label>Food Stamp Recipient</label>
                <?php
                $foodstampsArray = array("Yes","No");
                 foreach($foodstampsArray as $k =>$v){
                 echo "<input type='radio' name='foodstamps' ". ((isset($foodstamps) && $foodstamps==$v)?"checked":"")." value='".$v."' /> ".$v."";
                }
               ?>	   
        </span>

        <span style="margin-left :125px" class="radio field">
           <label>Foster Child</label>
                <?php
                $fosterchildArray = array("Yes","No");
                foreach($fosterchildArray as $k =>$v){
                echo "<input type='radio' name='fosterchild' ". ((isset($fosterchild) && $fosterchild==$v)?"checked":"")." value='".$v."' /> ".$v."";
               }
              ?> 	   	   
        </span>		 
 </div>
    </li>

    <li id="foli118" class="complex notranslate">  
 <div>
        <span class="radio field">
             <label for='familysize'>Family Size</label>
                 <select name='familysize' id='familysize'>
                 <option value="">Choose a country</option>
                  <option value="">Family Size</option>
                      <?php
                     $familysizeArray = array("1","2","3","4","5","6","7","8","9","10 or More");
                     foreach($familysizeArray as $k=>$value){
                     echo '<option '. ((isset($familysize) && $familysize==$value)?"selected":"") .'>'.$value.'</option>';
                     }
                     ?>
                </select>
        </span>
  
        <span class="right radio field">	 
          <label for='income'>Annual Family Income</label>
               <select name='income' id='income'>
               <option value="">Income</option>
                    <?php
                    $incomeArray = array("$0 to $20,000","$21,000 to $35,000","$36,000 to $50,000","$50,000 to $70,000","$71,000 to $150,000");
                    foreach($incomeArray as $k=>$value){
                    echo '<option '. ((isset($income) && $income==$value)?"selected":"") .'>'.$value.'</option>';
                   }
                  ?>	
              </select>
        </span>
 </div>
 </li>
 
    <li id="foli119" class="complex notranslagte">
<div>
        <span class="radio field">	 
            <label for='laborstatus'>Labor Force Status</label>
              <select name='laborstatus' id='laborstatus'>
               <option value="">Employment Status</option>
                    <?php
                     $laborstatusArray = array("Employed","Not Employed","Employed, but Received Notice of Termination or Military Separation");
                     foreach($laborstatusArray as $k=>$value){
                     echo '<option '. ((isset($laborstatus) && $laborstatus==$value)?"selected":"") .'>'.$value.'</option>';
                   }
                   ?>
              </select>
        </span>	
   
       <span class="radio field">	 
            <label for='unemp-comp'>Unemployment Compensation</label>
              <select name='unemp-comp' id='unemp-comp'>
               <option value="">Receiving Unemployment?</option>
                   <?php
                    $unemp_compArray = array("Claimant","Exhaustee","None");
                    foreach($unemp_compArray as $k=>$value){
                    echo '<option '. ((isset($unemp_comp) && $unemp_comp==$value)?"selected":"") .'>'.$value.'</option>';
                  }
                  ?>
             </select>
        </span>	
</div>
</li> 		
</ul>

<h3 class="block_header">Barriers to Employment and College</h3> 
<ul>			
    <li id="foli120" class="complex notranslate">  
      <div>
       <span class="radio field">	 
        <label>Select all that apply</label>
             <?php
               $barriersArray = array("Limited English","Displaced Home-maker","Single Parent","Offender","Runaway under 18",
                               "Pregnant or Parenting","Requires Additional Assistance","Homeless",
                               "Deficient Basic Literacy Skills","School Drop out","Foster Child",
                               "Serious Barrier-Board Defined");
        
                foreach($barriersArray as $k=>$v){
                echo "<input type='checkbox' name='barriers[]' ".
                ((isset($barriers) && in_array($v,$barriers))?"checked":"" ).
                " value='".$v."'/>".$v."<br/>";
                }
             ?> 
          <input type='text' name='barriers_other' id='barriers_other' 
            value='<?php echo (isset($barriers_other))?$barriers_other:""; ?>'/><br/>	   
        </span>
      </div>
      </li>
</ul> 