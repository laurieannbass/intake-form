<?php
/* the base of php
if(){}
foreach(){}
function name($foo=null){

return $foo;
}




echo name("bar");//<= bar
print(name("bar"));//<= bar
print_r(name("bar"));//<= string=>bar
var_dump(name("bar"));//<= string(3) bar

LOOKUP FIRST
--------------------------------------------
for loops 	- this will be used on  the number
foreach 	-
arrays 		- this is for the name="foo[]"



*/


	$last_name		= (isset($_POST['last-name'])) ? trim($_POST['last-name']) : "";//$_POST['last-name']
	$first_name		= (isset($_POST['first-name'])) ? trim($_POST['first-name']) : "";//$_POST['first-name']
	$birth_date		= (isset($_POST['dob'])) ? trim($_POST['dob']) : "";//$_POST['first-name']
	$address		= (isset($_POST['address'])) ? trim($_POST['address']) : "";//$_POST['address']
	$city           = (isset($_POST['city'])) ? trim($_POST['city']) : "";//$_POST['city']
	$state          = (isset($_POST['state'])) ? trim($_POST['state']) : "";//$_POST['state']
	$zip            = (isset($_POST['zip'])) ? trim($_POST['zip']) : "";//$_POST['zip']

if(!empty($last_name) 
	&& !empty($first_name) 
	&& !empty($birth_date) 
	&& !empty($address) 
	&& !empty($city) 
	&& !empty($state) 
	&& !empty($zip) ){
		//require_once is equal to "open file" and put the
		//code here as if i wrote it here
		//include -- ""
		//require -- ""
		//include_once -- ""
		
		require_once('form-action-controller.php');
}else{

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Title of the document</title>

	<!-- CSS -->
	<link href="css/structure.css" rel="stylesheet">
	<link href="css/form.css" rel="stylesheet">

	<!-- JavaScript -->
	<script src="scripts/wufoo.js"></script>

	<!--[if lt IE 10]>
	<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head> 



<body id="public">
<div id="container" class="ltr">
<?php 
if(count($_POST)>0){
	echo "<h3 style='color:red;'>There were missing required fields </h3>";
}


?>
    <!-- http://www.w3schools.com/html/html_forms.asp -->


<form name='input' action='http://local.general.dev/intake-form/form.php' class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" novalidat>

        <!-- slskdhlsk -->	                                                
  <!-- <fieldset><legend><b>Contact Information</b></legend> -->
  
    <header id="header" class="info">
       <h2>INTAKE FORM</h2>
       <div>This is my form. Please fill it out. It's awesome!</div>
	</header>
	
	<h3>Contact Information</h3>
	<ul>
		<li id="foli101" class="notranslate">
			<label class="desc" id="title116" for="uh-id">UH ID Number</label>
			<div>
			<input type='text' name='uh-id' id='uh-id' class="field text medium" 
			     maxlength="255" tabindex="1" onkeyup=""
				 value = '<?php echo (isset($_POST['uh-id']))?$_POST['uh-id']:""; ?>'/> 
			</div>
		</li>
		<li id="foli102" class="notranslate ">
			<label class="desc" id="title101" for="last-name"> <!--header for the block-->
				Name
			</label>

			<span> <!-- fields with in the block-->
				<input type='text' name='first-name' id='first-name' class="field text long" 
				   maxlength="255" tabindex="2" onkeyup=""
				   value = '<?php echo (isset($_POST['first-name']))?$_POST['first-name']:""; ?>' required/> 
			   <label for="last-name">First<span class="req">*</span></label>
			</span>
			<span>
				<input type='text' name='last-name' id='last-name' class="field text long" 
				   maxlength="255" tabindex="3" onkeyup=""
				   value = '<?php echo (isset($_POST['last-name']))?$_POST['last-name']:""; ?>' required/> 
			   <label for="last-name">Last<span class="req">*</span></label>
			</span>

		</li>
		
		<li id="foli103" class="notranslate ">
			<label class="desc" id="title103" for="homephone"> <!--header for the block-->
               Phone Numbers
			</label>
			
			<span>
	            <input type='text' name='homephone' id='homephone'  placeholder='xxx-xxx-xxxx' 
				   class="field text long"  maxlength="255" tabindex="4" onkeyup=""
				   value='<?php echo (isset($_POST['homephone']))?$_POST['homephone']:""; ?>'/>
                <label for="homephone">Home Phone<span class="req">*</span></label>
	        </span>
	        <span>
               <input type='text' name='cellphone' id='cellphone' placeholder='xxx-xxx-xxxx'
			   class="right field text long" size="25" maxlength="255" tabindex="5" onkeyup=""
			   value='<?php echo (isset($_POST['cellphone']))?$_POST['cellphone']:""; ?>'/>
	           <label for='cellphone'>Cell Phone Number<span class="req">*</span></label>
	        </span>
		
		
		</li>

		<!-- put the address row-block here -->
		<li id="foli104" class="complex notranslate      ">
            <label class="desc" id="title107" for="address">
              Residence Address
              <span id="req_107" class="req">
                *
              </span>
            </label>
            <div>
              <span class="full addr1">
                <input id="address" name="address" type="text" class="field text addr" 
				     value='<?php echo (isset($_POST['address'])) ?$_POST['address']:"";?>'
					 tabindex="5" required />
				<label for="address">Street Address<span class="req">*</span>
                </label>
              </span>
              <span class="left city">
                <input id="city" name="city" type="text" class="field text addr" 
				value='<?php echo (isset($_POST['city'])) ?$_POST['city']:"";?>'
				tabindex="6" required />
                <label for="City">
                  City
                </label>
              </span>
              <span class="right state">
                <input id="state" name="state" type="text" class="field text addr" 
				value= '<?php echo (isset($_POST['state'])) ?$_POST['state']:"";?>'
				tabindex="7" required />
                <label for="state">
                  State / Province / Region
                </label>
              </span>
              <span class="left zip">
                <input id="zip" name="zip" type="text" class="field text addr" 
				value='<?php echo (isset($_POST['zip'])) ?$_POST['zip']:"";?>' 
				maxlength="15" tabindex="8" required />
                <label for="zip">
                  Postal / Zip Code
                </label>
              </span>
			  <span class="right country">   
		      <select name='country' id='country' 
			        class="field select addr" tabindex="9">
	            <option <?php echo (isset($_POST['country']))?"":"selected";?> 
	                value="" selected="selected">
	            </option>
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
				          echo'<option '.((isset($_POST['country'])&& $_POST['country']==$value)?"selected":"").'>'.$value.'</option>';
				}
	            ?>	
                </select>	
                     <label for="country">Country</label>	
              </span> 
            </div>
        </li>		
		
		<!-- put the Mailing address row-block here -->
		<li id="foli105" class="complex notranslate      ">
            <label class="desc" id="title109" for="address">
              Mailing Address if different from residence address
              <span id="req_107" class="req">
                *
              </span>
            </label>
            <div>
              <span class="full addr1">
                <input id="mailaddress" name="mailaddress" type="text" class="field text addr" 
				     value='<?php echo (isset($_POST['mailaddress'])) ?$_POST['mailaddress']:"";?>'
					 tabindex="10" required />
				<label for="mailaddress">Street Address<span class="req">*</span>
                </label>
              </span>
              <span class="left city">
                <input id="mailcity" name="mailcity" type="text" class="field text addr" 
				value='<?php echo (isset($_POST['mailcity'])) ?$_POST['mailcity']:"";?>'
				tabindex="11" required />
                <label for="mailCity">
                  City
                </label>
              </span>
              <span class="right state">
                <input id="mailstate" name="mailstate" type="text" class="field text addr" 
				value= '<?php echo (isset($_POST['mailstate'])) ?$_POST['mailstate']:"";?>'
				tabindex="12" required />
                <label for="mailstate">
                  State / Province / Region
                </label>
              </span>
              <span class="left zip">
                <input id="mailzip" name="mailzip" type="text" class="field text addr" 
				value='<?php echo (isset($_POST['mailzip'])) ?$_POST['mailzip']:"";?>' 
				maxlength="15" tabindex="13" required />
                <label for="zip">
                  Postal / Zip Code
                </label>
              </span>
			  <span class="right country">   
		      <select name='mailcountry' id='mailcountry' 
			        class="field select addr" tabindex="14">
	            <option <?php echo (isset($_POST['mailcountry']))?"":"selected";?> 
	                value="" selected="selected">
	            </option>
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
				          echo'<option '.((isset($_POST['country'])&& $_POST['country']==$value)?"selected":"").'>'.$value.'</option>';
				}
	            ?>	
                </select>	
                     <label for="mailcountry">Country</label>	
              </span> 
            </div>
        </li>	
<!--new sub section of contact -->
        <li id="foli106" class="notranslate">	
		    <label class="desc" id="title110" for="address">
                Email Address And Preferred Method of contact
            <span id="req_107" class="req">*</span>
            </label>
		  <div>
		       <!--text field-->
			<span>
                <input type='email' name='email-address' id='email-address' placeholder='name@domain.com' 
	               class="field select addr" maxlength="255" tabindex="15" onkeyup=""
		            value ='<?php echo (isset($_POST['email-address'])) ?$_POST['email-address']:"";?>'>
	         <label for='email-address'>E-mail address<span class="req">*</span></label>
	        </span>
        
		<!--   THREE CHOICE ARRAY choose one-->
			
			<span class="center radio field"> <label for="notification"> Preferred Method of Notification. choose one<span class="req">*</span></label>
	           
	         <input type= 'radio' name='notification' id='notification' 
			        maxlength="255" tabindex="16" onkeyup=""
	                value ='<?php $notificationArray = array("E-mail","Postal Mail ","Telephone");
		              foreach($notificationArray as $k=>$v){
                    echo "<input type='radio' name='notification' ". 
					((isset($_POST['notification']) && $_POST['notification']==$v)?"checked":"").
					" value='".$v."' /> ".$v."";			
		        }
				?>'

	        </span>
		</div>	
		</li>
		<h3>Demographics</h3>
        <li>  
		<div>
		<!--TWO RADIO BUTTON-->
			<span class="radio field"> 
			<label for="resident">Are you a resident of the state of Hawaii?</label>
	           <input type='radio' name='resident' id=`resident` 
			          maxlength="255" tabindex="18" onkeyup=""
	                  value='<?php $residentArray = array("Yes","No");
	                  foreach($residentArray as $k =>$v){
		             echo "<input type='radio' name='resident' ". 
					((isset($_POST['resident']) && $_POST['resident']==$v)?"checked":"")." 
					value='".$v."' /> ".$v."";
		         }
				 ?>'
           <!--    <label for="resident">Are you a resident of the state of Hawaii?</label> -->
			</span>
		<!--short dropdown select -->
			<span><!--<label for='island'>Island</label>-->
	           <select name='island' id='island' class="field select addr" tabindex="17 ">
	            <option <?php echo (isset($_POST['island']))?"":"selected"; ?> 
			     value="" selected="selected">
	            </option>
			   <?php
	              $islandArray = array("Hawai`i","Maui","O`ahu","Kaua`i","Moloka`i","Lana`i");
		          foreach($islandArray as $k=>$value){
			      echo '<option '. ((isset($_POST['island']) && $_POST['island']==$value)?"selected":"") .'>'.$value.'</option>';
		       }
	           ?>
	          </select>
			 <label for='island'>Island</label> 
	        </span>
			<!--TWO RADIO BUTTON-->
			<span class="center radio field"> 
			<label for="resident">Are you a resident of the state of Hawaii?</label>
	           <input type='radio' name='resident' id=`resident` 
			          maxlength="255" tabindex="18" onkeyup=""
	                  value='<?php $residentArray = array("Yes","No");
	                  foreach($residentArray as $k =>$v){
		             echo "<input type='radio' name='resident' ". 
					((isset($_POST['resident']) && $_POST['resident']==$v)?"checked":"")." 
					value='".$v."' /> ".$v."";
		         }
				 ?>'
           <!--    <label for="resident">Are you a resident of the state of Hawaii?</label> -->
			</span>

		
		    <span class= "radio field"> 
				<label for="citizen">Are you a U.S. Citizenship? choose one</label><br/> 
	            <input type="radio" name="citizen" id="citizen"
				       maxlenght="255" tabindex="19" onkeyup=""
					   value=`<?php $citizenArray = array("U.S. Citizen","Non-Citizen Allowed to Work ","Non-Citizen NOT Allowed to Work");
		               foreach($citizenArray as $k=>$v){
			           echo "<input type='radio' name='citizen' ". 
				     ((isset($_POST['citizen']) && $_POST['citizen']==$v)?"checked":"")."value='".$v."' /> ".$v."";
		         }
				 ?>`
			</span>	
		</li>
	    </div>
		
		
		
	

	   
	</ul>





	
	


	   

<div>
	<span>
       <label>Hispanic or Latino</label>
	    <?php
	    $hispanicArray = array("Yes","No");
	    foreach($hispanicArray as $k =>$v){
		 echo "<input type='radio' name='hispanic' ". ((isset($_POST['hispanic']) && $_POST['hispanic']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> <br/>
	</span>

    <span>	 
	   <label>Native Hawaiian Ancestry</label>
	    <?php
	    $nativehawArray = array("Yes","No");
	    foreach($nativehawArray as $k =>$v){
		 echo "<input type='radio' name='nativehaw' ". ((isset($_POST['nativehaw']) && $_POST['nativehaw']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> 
	   <br/>
	</span>
	 
	   

    <span> 
	   <label>Race<br/>Select all that apply</label><br/>
	   <?php
	    $raceArray = array("American Indian","Alaskan Native","Native Hawaiian or Pacific Islander","Asian","Hispanic","African American or Black","Caucasian or White");
	    foreach($raceArray as $k =>$v){
		 echo "<input type='checkbox' name='race[]' ".
		 ((isset($_POST['race']) && in_array($v,$_POST['race']))?"checked":"").
		 " value='".$v."' />".$v."<br/>"; 
		}
	    ?> 
	   <br/>
	</span>
       
	   
	<span>
       <label>Gender</label><br/>
<!--	   <input type='radio' name='gender' value='male'>Male<br/>
       <input type='radio' name='gender' value='female'>Female<br/> -->
	   <?php
	    $genderArray = array("Male","Female");
	    foreach($genderArray as $k =>$v){
		 echo "<input type='radio' name='gender' ". ((isset($_POST['gender']) && $_POST['gender']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> <br/>
	 </span>       
	   
	<span>
	   <label for='age'>Age</label>
	   <input type='text' name='age' id='age' value='<?php echo (isset($_POST['age'])) ?$_POST['age']:"";?>'/><br/>
	</span>       
	   
	<span>
       <label for='dob'>Birth Date</label><br/> <!--ask if there is format for date-->
	   <input type='text' name='dob' id='dob' placeholder='MM-DD-YYYY' value='<?php echo (isset($_POST['dob'])) ?$_POST['dob']:"";?>'/><br/>
	</span>      
	  
</div>
	 
  <!-- <fieldset>
       <legend><b>MILITARY AND VETERAN STATUS</b></legend> -->
<div><h3>Military and Veteran Status</h3>
  
<div>  
	<span>  	   
	   <label>Are you currently an active member or prior member of the armed forces?</label><br/>
	    <?php
	    $militaryArray = array("Yes","No");
	    foreach($militaryArray as $k =>$v){
		 echo "<input type='radio' name='military' ". ((isset($_POST['military']) && $_POST['military']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> <br/>
	</span>

    <span>	 
	   <label>Spouse served in U.S. Military?</label><br/>	    
	   <?php
	    $military_spouseArray = array("Yes","No");
	    foreach($military_spouseArray as $k =>$v){
		 echo "<input type='radio' name='military_spouse' ". ((isset($_POST['military_spouse']) && $_POST['military_spouse']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> <br/>
    </span>
	<span>  
	   <label>Veteran Status?:</label>
 	   <?php
	    $va_statusArray = array("Less than 180 days","Eligible Vet","Eligible Spouse","Dependent","Not Eligible");
	    foreach($va_statusArray as $k =>$v){
		 echo "<br/><input type='radio' name='va_status' ". ((isset($_POST['va_status']) && $_POST['va_status']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> <br/> 
	</span>
</div>  
<div>
	<span>
	   <label>Campaign Veteran</label><br/>
	   <?php
	    $vet_campaignArray = array("Yes","No","N/A");
	    foreach($vet_campaignArray as $k =>$v){
		 echo "<br/><input type='radio' name='vet_campaign' ". ((isset($_POST['vet_campaign']) && $_POST['vet_campaign']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> <br/> 
	</span>

    <span> 	 
	   <label>Recently Separated Veteran</label><br/>
	   <?php
	    $vet_separatedArray = array("Yes","No","N/A");
	    foreach($vet_separatedArray as $k =>$v){
		 echo "<br/><input type='radio' name='vet_separated' ". ((isset($_POST['vet_separated']) && $_POST['vet_separated']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> <br/> 
	</span>

	  
    <span>
       <label>Disabled Veteran</label> <br/>	             
	   <?php
	    $vet_disabledArray = array("Yes","Yes, Special Disabled","N/A");
	    foreach($vet_disabledArray as $k =>$v){
		 echo "<br/><input type='radio' name='vet_disabled' ". ((isset($_POST['vet_disabled']) && $_POST['vet_disabled']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> <br/> 
	</span>
</div>

</div>  
 <!--  </fieldset> -->
	  
 <!--  <fieldset>
    <legend><b>EDUCATION</b></legend> -->
	 
<div><h3>Education</h3>	 
<div>
	<span>
	   <label>What is your current educational Status?</label>
	   <?php
	    $ed_statusArray = array("In school,High School or less","In School, Alternative School","In school,Post-High School","Not attending school, High School Dropout","Not attending school, High School Graduate");
	    foreach($ed_statusArray as $k =>$v){
		 echo "<br/><input type='radio' name='ed_status' ". ((isset($_POST['ed_status']) && $_POST['ed_status']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> <br/> 	   
    </span>


	<span>
	   <label>Highest grade completed:</label>
	   <?php
	    $highestgradeArray = array("No School Grades Completed","GED or Equivalent","High School Diploma","Certificate of Attendance/Completion","Associate Diploma or Degree","Bachelor's Degree or Equivalent","Other Post-Secondary Degree or Certificate","Education beyond Bachelor's Degree");
	    foreach($highestgradeArray as $k =>$v){
		 echo "<br/><input type='radio' name='highestgrade' ". ((isset($_POST['highestgrade']) && $_POST['highestgrade']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> <br/> 	  	   
    </span>
</div>

<div>   
    <span>
	   <label>Pell Grant Recipient</label>
	    <?php
	    $pellArray = array("Yes","No");
	    foreach($pellArray as $k =>$v){
		 echo "<br/><input type='radio' name='pell' ". ((isset($_POST['pell']) && $_POST['pell']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	   ?> <br/>	   
	</span>

	
	   
	<span>
	   <label>Low Income</label>	   
	    <?php
	    $lowincomeArray = array("Yes","No");
	    foreach($lowincomeArray as $k =>$v){
		 echo "<br/><input type='radio' name='lowincome' ". ((isset($_POST['lowincome']) && $_POST['lowincome']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	   ?> <br/>	   	   
	</span>
</div>

</div>
 <!--  </fieldset> -->
 <!--  <fieldset>
	<legend><b>ECONOMICS</b></legend> -->
<h3>Economics</h3>
<div>
<div>
	<span>
	   <label>Food Stamp Recipient</label>
	    <?php
	    $foodstampsArray = array("Yes","No");
	    foreach($foodstampsArray as $k =>$v){
		 echo "<br/><input type='radio' name='foodstamps' ". ((isset($_POST['foodstamps']) && $_POST['foodstamps']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	   ?> <br/>	 	   
    </span>

		
	<span>
	   <label>Foster Child</label>
	    <?php
	    $fosterchildArray = array("Yes","No");
	    foreach($fosterchildArray as $k =>$v){
		 echo "<br/><input type='radio' name='fosterchild' ". ((isset($_POST['fosterchild']) && $_POST['fosterchild']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	   ?> <br/>	 	   	   
    </span>
		
	<span>
	   <label for='familysize'>Family Size</label><br/>
	   <select name='familysize' id='familysize'>
       <option <?php echo (isset($_POST['familysize']))?"":"selected"; ?> value=''>Size of family</option>
	   <?php
	    $familysizeArray = array("1","2","3","4","5","6","7","8","9","10 or More");
		foreach($familysizeArray as $k=>$value){
			echo '<option '. ((isset($_POST['familysize']) && $_POST['familysize']==$value)?"selected":"") .'>'.$value.'</option>';
		}
	   ?>
	   </select>
	   <br/><br/>
	</span>
</div>
	 
<div>
    <span>	 
	   <label for='income'>Annual Family Income</label><br/>
	    <select name='income' id='income'>
        <option <?php echo (isset($_POST['income']))?"":"selected"; ?> value=''>Annual Household Income</option>
	    <?php
	     $incomeArray = array("$0 to $20,000","$21,000 to $35,000","$36,000 to $50,000","$50,000 to $70,000","$71,000 to $150,000");
	     foreach($incomeArray as $k=>$value){
			echo '<option '. ((isset($_POST['income']) && $_POST['income']==$value)?"selected":"") .'>'.$value.'</option>';
		}
	   ?>	
	    </select> <br/>
	</span>

    <span>	 
	   <label for='laborstatus'>Labor Force Status</label><br/>
		<select name='laborstatus' id='laborstatus'>
		<option <?php echo (isset($_POST['laborstatus']))?"":"selected"; ?> value=''>Labor Force Status</option>
	    <?php
	     $laborstatusArray = array("Employed","Not Employed","Employed, but Received Notice of Termination or Military Separation");
	     foreach($laborstatusArray as $k=>$value){
			echo '<option '. ((isset($_POST['laborstatus']) && $_POST['laborstatus']==$value)?"selected":"") .'>'.$value.'</option>';
		}
	   ?>
        </select><br/>
	</span>

    <span>	 
	   <label for='unemp-comp'>Unemployment Compensation</label><br/>
		<select name='unemp-comp' id='unemp-comp'>
	 	<option <?php echo (isset($_POST['unemp_comp']))?"":"selected"; ?> value=''>Unemployment Compensation</option>
	    <?php
	     $unemp_compArray = array("Claimant","Exhaustee","None");
	     foreach($unemp_compArray as $k=>$value){
			echo '<option '. ((isset($_POST['unemp_comp']) && $_POST['unemp_comp']==$value)?"selected":"") .'>'.$value.'</option>';
		}
	   ?>
        </select>
	</span>
</div>
<div>
	 <span>
	   <label>Single Parent</label><br/>
	    <?php
	    $single_parentArray = array("Yes","No");
	    foreach($single_parentArray as $k =>$v){
		 echo "<input type='radio' name='single_parent' ". ((isset($_POST['single_parent']) && $_POST['single_parent']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	    ?> <br/>
     </span>
	   
	 <span>
	   <label>Is English your First language? </label><br/>
	   <?php
	    $englishArray = array("Yes","No");
	    foreach($englishArray as $k =>$v){
		 echo "<input type='radio' name='english' ".
			((isset($_POST['english']) && $_POST['english']==$v)?"checked":"").
			" value='".$v."' /> ".$v."";
		}
	    ?> <br/>  
     </span>
</div>
</div> 
	 
 <!--  </fieldset>
   <fieldset> -->
<div><h3>Barriers to Employment and College</h3>
    <span>	 
	 <!-- <legend><b>BARRIERS TO EMPLOYMENT AND COLLEGE</b></legend>-->
	  Select all that apply:
	   <br/>
		<?php
	    $barriersArray = array("Limited English","Displaced Home-maker","Single Parent","Offender","Runaway under 18",
		                       "Pregnant or Parenting","Requires Additional Assistance","Homeless",
							   "Deficient Basic Literacy Skills","School Drop out","Foster Child",
							   "Serious Barrier-Board Defined");
		
	    foreach($barriersArray as $k=>$v){
			echo "<input type='checkbox' name='barriers[]' ".
					( (isset($_POST['barriers']) && in_array($v,$_POST['barriers']))?"checked":"" ).
					" value='".$v."'/>".$v."<br/>";
		}
	    ?> 
		<input type='text' name='barriers_other' id='barriers_other' 
		value='<?php echo (isset($_POST['barriers_other']))?$_POST['barriers_other']:""; ?>'/><br/>	   
	</span>
</div>

		<br/>
	
		
	<span>
		<label>this is just for jumping to another location</label>
			<input type='text' name='jump' id='jump' value=''/><br/>
	</span>	
	
	
	
		
 <!--  </fieldset> -->
	   
    <input type='submit' value='Submit'>

  

</ul>

</form>
</div>
</body>

</html> 
<?php 
}//end of validation if statment 


?>

