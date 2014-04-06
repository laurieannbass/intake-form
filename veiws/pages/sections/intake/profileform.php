<div class="row">
	<div class="twelve columns checkbox">
		<label class="desc" id="title116" for="uh_id">UH ID Number
			<input type='text' name='uh_id' id='uh_id' class="field text medium" maxlength="255" value = '<?php echo (isset($uh_id))?$uh_id:""; ?>'/> 
		</label>
		<span>Note: You can get this from <a href="#" target="_blank">foo</a></span>
	</div>
</div>

<h5>Name</h5>
<div class="row">
	<div class="six columns checkbox">
		<label for="last_name">First<span class="req">*</span>
			<input type='text' name='first_name' id='first_name' class="field text long"  maxlength="255" value='<?php echo (isset($first_name))?$first_name:""; ?>' required/> 
		</label>
	</div>
	<div class="six columns checkbox leftborder">
		<label for="last_name">Last<span class="req">*</span>
			<input type='text' name='last_name' id='last_name' class="field text long" maxlength="255"   value = '<?php echo (isset($last_name))?$last_name:""; ?>' required/> 
		</label>
	</div>
</div><hr/>

<h5>Phone Numbers</h5>
<div class="row">
	<div class="six columns checkbox">
		<label for="homephone">Home Phone<span class="req">*</span>
			<input type='text' name='homephone' id='homephone'  placeholder='xxx-xxx-xxxx' class="field text long"  maxlength="255" value='<?php echo (isset($homephone))?$homephone:""; ?>'/>
		</label>
	</div>
	<div class="six columns checkbox leftborder">
		<label for='cellphone'>Cell Phone Number<span class="req">*</span>
			<input type='text' name='cellphone' id='cellphone' placeholder='xxx-xxx-xxxx' class="right field text long" size="25" maxlength="255" value='<?php echo (isset($cellphone))?$cellphone:""; ?>'/>
		</label>
	</div>
</div><hr/>

<h5>Physical and Mailing address</h5>
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
	</ul><hr/>
<!--new sub section of contact -->

<h5>Contact Preferences</h5>
<div class="row">
	<div class="six columns checkbox">
		<label for='email_address'>E-mail address<span class="req">*</span>
            <input type='email' name='email_address' id='email_address' placeholder='name@domain.com' class="field select addr" maxlength="255" value ='<?php echo (isset($email_address)) ?$email_address:"";?>' />
		</label>
	</div>
	<div class="six columns checkbox leftborder">
		<label>Preferred Method of Notification. choose one<span class="req">*</span><br/>
            <?php $notificationArray = array("E-mail","Postal Mail ","Telephone");
                foreach($notificationArray as $k=>$v){
                    $is_checked =((isset($notification) && $notification==$v)?"checked":"");
                    echo "<span><input type='radio' name='notification'  value='".$v."' /> ".$v."</span>";	
                }
            ?>
		</label>
	</div>
</div><hr/>

<h3>Demographics</h3>
<div class="row">
	<div class="three columns checkbox">
		    <label for='age'>Age 
            <input type='text' name='age' id='age'  class="field select addr" maxlength="3" value='<?php echo (isset($age)) ?$age:"";?>'/></label>
	</div>
	<div class="three columns checkbox leftborder">
		            <label for='dob'>Birth Date     
             <input type='date' name='dob' id='dob' class="field select addr" placeholder='MM-DD-YYYY'  value='<?php echo (isset($dob)) ?$dob:"";?>'/></label> 
	</div>
	<div class="six columns checkbox leftborder">

	</div>
</div><hr/>


<div class="row">
	<div class="four columns checkable">
          <label>Single Parent</label>
             <?php
              $single_parentArray = array("Yes","No");
              foreach($single_parentArray as $k =>$v){
               echo "<span><input type='radio' name='single_parent' ". ((isset($single_parent) && $single_parent==$v)?"checked":"")." value='".$v."' /> ".$v."</span>";
           }
           ?> 
	</div>
	<div class="four columns checkable leftborder">
         <label>Is English your First language?</label>			
          <?php
           $englishArray = array("Yes","No");
           foreach($englishArray as $k =>$v){
           echo "<span><input type='radio' name='english' ". ((isset($english) && $english==$v)?"checked":""). " value='".$v."' /> ".$v."</span>";
          }
          ?>
	</div>
	<div class="four columns checkable leftborder">
         <label>Gender</label>
            <?php $genderArray = array("Male","1"=>"Female");
               foreach($genderArray as $v){
               $is_checked=((isset($gender) && $gender==$v)?"checked":"");
               //we now replace the template with the vars holding the data
               $thePattern_aka_template = "<span><input type='radio' name='gender' {$is_checked} value='{$v}' /> {$v}</span>";
                echo $thePattern_aka_template;

            }
         ?>
	</div>
</div><hr/>

<div class="row">
	<div class="twelve columns checkbox">
		<label>Are you a U.S. Citizenship? choose one</label>
		<?php $citizenArray = array("U.S. Citizen","Non-Citizen Allowed to Work ","Non-Citizen NOT Allowed to Work");
			foreach($citizenArray as $k=>$v){
			   echo "<span><input type='radio' name='citizen' ". ((isset($citizen) && $citizen==$v)?"checked":"")."value='".$v."' /> ".$v."</span>";
			}
		 ?>	 
	</div>
</div><hr/>

<div class="row">
	<div class="four columns checkable">
            <label>Are you a resident of the state of Hawaii?</label>

            <?php $residentArray = array("Yes","No");
                foreach($residentArray as $v){
                    echo "<span><input type='radio' name='resident' ". ((isset($resident) && $resident==$v)?"checked":"")." value='".$v."' /> ".$v."</span>";
                }
            ?>
	</div>
	<div class="four columns checkable leftborder">
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
	</div>
	<div class="four columns checkbox leftborder">

	</div>
</div><hr/>

<div class="row">
	<div class="four columns checkable">
             <label>Hispanic or Latino</label>
             <?php
             $hispanicArray = array("Yes","No");
              foreach($hispanicArray as $k =>$v){
               echo "<span><input type='radio' name='hispanic'  ". ((isset($hispanic) && $hispanic==$v)?"checked":"")." value='".$v."' /> ".$v."</span>";
            }
          ?>
	</div>
	<div class="four columns checkable leftborder">
             <label>Native Hawaiian Ancestry</label>
             
                <?php
                 $nativehawArray = array("Yes","No");
                 foreach($nativehawArray as $k =>$v){
                 echo "<span><input type='radio' name='nativehaw' ". ((isset($nativehaw) && $nativehaw==$v)?"checked":"")." value='".$v."' /> ".$v."</span>";
               }
             ?> 
	</div>
	<div class="four columns checkbox leftborder">

	</div>
</div><hr/>
<div class="row">
	<div class="twelve columns checkable">
	   <label>Race Select all that apply</label>
		<?php $raceArray = array("American Indian","Alaskan Native","Native Hawaiian or Pacific Islander","Asian","Hispanic","African American or Black","Caucasian or White");
		   foreach($raceArray as $k =>$v){
			echo "<span><input type='checkbox' name='race[]' ". ((isset($race) && in_array($v,$race))?"checked":""). " value='".$v."' />".$v."</span>"; 
			}
		 ?> 
	</div>
</div><hr/>



<h3 class="block_header">Military and Veteran Status</h3>
<div class="row">
	<div class="six columns checkable">
         <label>Active or prior member of the Military?</label>
                <?php
                $militaryArray = array("Yes","No");
                foreach($militaryArray as $k =>$v){
              echo "<span><input type='radio' name='military' ". ((isset($military) && $military==$v)?"checked":"")." value='".$v."' /> ".$v."</span>";
             }
            ?> 
	</div>
	<div class="six columns checkable leftborder">
         <label>Spouse served in U.S. Military? </label>
             <?php
             $military_spouseArray = array("Yes","No");
             foreach($military_spouseArray as $k =>$v){
             echo "<span><input type='radio' name='military_spouse' ". ((isset($military_spouse) && $military_spouse==$v)?"checked":"")." value='".$v."' /> ".$v."</span>";
             }
           ?>
	</div>
</div><hr/>


<div class="row">
	<div class="six columns checkable">
        <label>Veteran Status?:</label>
             <?php
            $va_statusArray = array("Less than 180 days","Eligible Vet","Eligible Spouse","Dependent","Not Eligible");
            foreach($va_statusArray as $k =>$v){
            echo "<span><input type='radio' name='va_status' ". ((isset($va_status) && $va_status==$v)?"checked":"")." value='".$v."' /> ".$v."</span>";
           }
          ?> 
	</div>
	<div class="six columns checkable leftborder">
       <label class="radio field">Campaign Veteran</label>
           <?php
            $vet_campaignArray = array("Yes","No","N/A");
            foreach($vet_campaignArray as $k =>$v){
             echo "<span><input type='radio' name='vet_campaign' ". ((isset($vet_campaign) && $vet_campaign==$v)?"checked":"")." value='".$v."' /> ".$v."</span>";
           }
           ?>  
	</div>
</div><hr/>


<div class="row">
	<div class="six columns checkable">
           <label>Recently Separated Veteran</label>
                <?php
                 $vet_separatedArray = array("Yes","No","N/A");
                 foreach($vet_separatedArray as $k =>$v){
                 echo "<span><input type='radio' name='vet_separated' ". ((isset($vet_separated) && $vet_separated==$v)?"checked":"")." value='".$v."' /> ".$v."</span>";
               }
               ?> 
	</div>
	<div class="six columns checkable leftborder">
           <label>Disabled Veteran </label>          
               <?php
                $vet_disabledArray = array("Yes","Yes, Special Disabled","N/A");
                foreach($vet_disabledArray as $k =>$v){
                echo "<span><input type='radio' name='vet_disabled' ". ((isset($vet_disabled) && $vet_disabled==$v)?"checked":"")." value='".$v."' /> ".$v."</span>";
              }
              ?>	
	</div>
</div><hr/>



<h3 class="block_header">Education</h3>

<div class="row">
	<div class="six columns checkbox">
        <label>What is your current educational Status?</label>
            <?php
            $ed_statusArray = array("In school,High School or less","In School, Alternative School","In school,Post-High School","Not attending school, High School Drop-out","Not attending school, High School Graduate");
            foreach($ed_statusArray as $k =>$v){
            echo "<input type='radio' name='ed_status' ". ((isset($ed_status) && $ed_status==$v)?"checked":"")." value='".$v."' /> ".$v."<br/>";
          }
          ?>
	</div>
	<div class="six columns checkbox leftborder">
           <label>Highest grade completed:</label>
               <?php
                $highestgradeArray = array("No School Grades Completed","GED or Equivalent","High School Diploma","Certificate of Attendance/Completion","Associate Diploma or Degree","Bachelor's Degree or Equivalent","Other Post-Secondary Degree or Certificate","Education beyond Bachelor's Degree");
                foreach($highestgradeArray as $k =>$v){
                echo "<input type='radio' name='highestgrade' ". ((isset($highestgrade) && $highestgrade==$v)?"checked":"")." value=\"".$v."\" /> ".$v."<br/>";
               }
               ?>
	</div>
</div><hr/>
<div class="row">
	<div class="four columns checkbox">
           <label>Pell Grant Recipient</label>
               <?php
                $pellArray = array("Yes","No");
                foreach($pellArray as $k =>$v){
                echo "<input type='radio' name='pell' ". ((isset($pell) && $pell==$v)?"checked":"")." value='".$v."' /> ".$v."<br/>";
               }
              ?>   
	</div>
	<div class="four columns checkbox">

	</div>
	<div class="four columns checkbox">

	</div>
</div><hr/>




<h3 class="block_header">Economics</h3>
<div class="row">
	<div class="four columns checkbox">
           <label>Low Income</label>	   
                <?php
                 $lowincomeArray = array("Yes","No");
                 foreach($lowincomeArray as $k =>$v){
                 echo "<input type='radio' name='lowincome' ". ((isset($lowincome) && $lowincome==$v)?"checked":"")." value='".$v."' /> ".$v."";
                }
               ?>   
	</div>
	<div class="four columns checkbox leftborder">
           <label>Food Stamp Recipient</label>
                <?php
                $foodstampsArray = array("Yes","No");
                 foreach($foodstampsArray as $k =>$v){
                 echo "<input type='radio' name='foodstamps' ". ((isset($foodstamps) && $foodstamps==$v)?"checked":"")." value='".$v."' /> ".$v."";
                }
               ?>	
	</div>
	<div class="four columns checkbox leftborder">
           <label>Foster Child</label>
                <?php
                $fosterchildArray = array("Yes","No");
                foreach($fosterchildArray as $k =>$v){
                echo "<input type='radio' name='fosterchild' ". ((isset($fosterchild) && $fosterchild==$v)?"checked":"")." value='".$v."' /> ".$v."";
               }
              ?> 	
	</div>
</div><hr/>
<div class="row">
	<div class="four columns checkbox">
             <label for='familysize'>Family Size<br/>
                 <select name='familysize' id='familysize'>
                  <option value="">Family Size</option>
                      <?php
                     $familysizeArray = array("1","2","3","4","5","6","7","8","9","10 or More");
                     foreach($familysizeArray as $k=>$value){
                     echo '<option '. ((isset($familysize) && $familysize==$value)?"selected":"") .'>'.$value.'</option>';
                     }
                     ?>
                </select> </label>
	</div>
	<div class="four columns checkbox leftborder">
          <label for='income'>Annual Family Income<br/>
               <select name='income' id='income'>
               <option value="">Income</option>
                    <?php
                    $incomeArray = array("$0 to $20,000","$21,000 to $35,000","$36,000 to $50,000","$50,000 to $70,000","$71,000 to $150,000");
                    foreach($incomeArray as $k=>$value){
                    echo '<option '. ((isset($income) && $income==$value)?"selected":"") .'>'.$value.'</option>';
                   }
                  ?>	
              </select></label>
	</div>
	<div class="four columns checkbox leftborder">
            <label for='unemp-comp'>Unemployment Compensation<br/>
              <select name='unemp-comp' id='unemp-comp'>
               <option value="">Receiving Unemployment?</option>
                   <?php
                    $unemp_compArray = array("Claimant","Exhaustee","None");
                    foreach($unemp_compArray as $k=>$value){
                    echo '<option '. ((isset($unemp_comp) && $unemp_comp==$value)?"selected":"") .'>'.$value.'</option>';
                  }
                  ?>
             </select></label>
	</div>
</div><hr/>

<div class="row">
	<div class="twelve columns checkbox">
            <label for='laborstatus'>Labor Force Status<br/>
              <select name='laborstatus' id='laborstatus'>
               <option value="">Employment Status</option>
                    <?php
                     $laborstatusArray = array("Employed","Not Employed","Employed, but Received Notice of Termination or Military Separation");
                     foreach($laborstatusArray as $k=>$value){
                     echo '<option '. ((isset($laborstatus) && $laborstatus==$value)?"selected":"") .'>'.$value.'</option>';
                   }
                   ?>
              </select></label>
	</div>
</div><hr/>




<h3 class="block_header">Barriers to Employment and College</h3> 
<div class="row">
	<div class="twelve columns checkbox">
        <label>Select all that apply</label>
             <?php
               $barriersArray = array("Limited English","Displaced Home-maker","Single Parent","Offender","Runaway under 18",
                               "Pregnant or Parenting","Requires Additional Assistance","Homeless",
                               "Deficient Basic Literacy Skills","School Drop out","Foster Child",
                               "Serious Barrier-Board Defined");
        
                foreach($barriersArray as $k=>$v){
                	echo "<input type='checkbox' name='barriers[]' ". ((isset($barriers) && in_array($v,$barriers))?"checked":"" ). " value='".$v."'/>".$v."<br/>";
                }
             ?> 
          <input type='text' name='barriers_other' id='barriers_other' value='<?php echo (isset($barriers_other))?$barriers_other:""; ?>'/><br/>	 
	</div>
</div><hr/>
