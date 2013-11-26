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
	$brith_date		= (isset($_POST['dbo'])) ? trim($_POST['dbo']) : "";//$_POST['first-name']
	$address		= (isset($_POST['address'])) ? trim($_POST['address']) : "";//$_POST['address']





if(!empty($last_name) && !empty($first_name) && !empty($brith_date) && !empty($address) ){


//string json_encode ( mixed $value [, int $options = 0 [, int $depth = 512 ]] )
	echo "form was filled out";
	
	/* this is the basics not ideals
	-----------------------------
	|         table:formdata    |
	-----------------------------
	| id int(11) Primary key not null auto increment
	| uh_id var(8)			|
	| last_name  var(255)		|
	| first_name var(255)		|
	| brith_date var(255) 		|
	| address var(255)			|
	| form_object text not null	|
	| creation_date timestamp	|	
	-----------------------------
	
	
	*/
	$jsonObj = json_encode ($_POST); // this is all of the form POST data serialized
	// we are matching now for example
	// also setting up the vars
	$uh_id			= (isset($_POST['uh-id'])) ? $_POST['uh-id'] : "";//$_POST['uh-id']

	$creation_date 	= strtotime("now");
	$form_object	= $jsonObj;
	//make your db connection then
	//insert your row
	//then close db connect
	echo "<h1>Thank you for filling the form out bra</h1>";
	
	
	/*
	For the output stage, a simple example
	this is an example of when we read from db adn 
	then we take the data and prep it to output
	
	echo $jsonObj;
	$jsonExpandedObj = json_decode ($jsonObj);
	var_dump($jsonExpandedObj);
	//example single call
	$jsonExpandedObj['uh-id'];
	
	//an example of iterating over the json array
	foreach($jsonExpandedObj as $k=>$v){
		if(is_array($v))$v = implode(",",$v); // check to see if it's an array and handle
		echo $k . " :: " . $v ."\n";
	}
	
	
	*/
}else{

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Title of the document</title>
</head> 



<body>
<?php 
if(count($_POST)>0){
	echo "<h3 style='color:red;'>There were missing required fields </h3>";
}


?>
    <!-- http://www.w3schools.com/html/html_forms.asp -->


<form name='input' action='http://local.general.dev/intake-form/form.php' method='post'>

        <!-- slskdhlsk -->	                                                
  <!-- <fieldset><legend><b>Contact Information</b></legend> -->
  
<div><h3>Contact Information</h3>

    <span>
	   <label for='uh-id'>UH ID Number</label><br/>
	   <input type='text' name='uh-id' id='uh-id' value = '<?php echo (isset($_POST['uh-id']))?$_POST['uh-id']:""; ?>'/> <br/>
	</span>
	  
    <span>	  
	   <label for='last-name'>Last Name</label><br/>
       <input type='text' name='last-name' id='last-name' value='<?php echo (isset($_POST['last-name']))?$_POST['last-name']:""; ?>'/><br/>	   
    </span>
	  
	<span>
	   <label for='first-name'>First Name</label><br/>
	   <input type='text' name='first-name' id='first-name' value='<?php echo (isset($_POST['first-name']))?$_POST['first-name']:""; ?>'/> <br/>
	</span> 
	   <br/>

	<span>
	   <label for='homephone'>Home Phone Number</label><br/>
       <input type='text' name='homephone' id='homephone'  placeholder='xxx-xxx-xxxx' value='<?php echo (isset($_POST['homephone']))?$_POST['homephone']:""; ?>'/><br/>
	</span>
	  
	<span>
	   <label for='cellphone'>Cell Phone Number</label><br/>
       <input type='text' name='cellphone' id='cellphone' placeholder='xxx-xxx-xxxx' value='<?php echo (isset($_POST['cellphone']))?$_POST['cellphone']:""; ?>'/><br/>
	</span>
	
    <span>	
	   <label for='address'>Residence Street Address</label>
       <input type='text' name='address' id='address'  value='<?php echo (isset($_POST['address'])) ?$_POST['address']:"";?>'/>	
    </span>
	 
    <span>	 
	   <label for='city'>City</label>
       <input type='text' name='city' id='city'  value='<?php echo (isset($_POST['city'])) ?$_POST['city']:"";?>'/>	
    </span>
	 
	<span> 
	   <label for='zip'>Zip Code</label>
       <input type='text' name='zip' id='zip' value='<?php echo (isset($_POST['zip'])) ?$_POST['zip']:"";?>'/>
	</span>  
	 
	<!-- <fieldset>
	<legend><b>Mailing Address (if different from residence)</b></legend> -->
<div><h3>Mailing Address (if different from residence)</h3>
	 
	<span>
	   <label for='mailaddress'>Mailing Address</label>
       <input type='text' name='mailaddress' id='mailaddress'  value='<?php echo (isset($_POST['mailaddress'])) ?$_POST['mailaddress']:"";?>'/>	   
	   <label for='mailcity'>    City:</label>
       <input type='text' name='mailcity' id='mailcity'  value='<?php echo (isset($_POST['mailcity'])) ?$_POST['mailcity']:"";?>'/>	   
	   <label for='mailzip'>    Zip Code:</label>
       <input type='text' name='mailzip' id='mailzip' value='<?php echo (isset($_POST['mailzip'])) ?$_POST['mailzip']:"";?>'/>
	</span> 
</div> 
  <!-- </fieldset> -->
<div>
	<span>
	   <label for='island'>Island</label>
	   <select name='island' id='island'>
	   <option <?php echo (isset($_POST['island']))?"":"selected"; ?> value=''>Select an Island Please</option>
	   <?php
	    $islandArray = array("Hawai`i","Maui","O`ahu","Kaua`i","Moloka`i","Lana`i");
		foreach($islandArray as $k=>$value){
			echo '<option '. ((isset($_POST['island']) && $_POST['island']==$value)?"selected":"") .'>'.$value.'</option>';
		}
	   ?>

	   </select>
	</span>
<br/>
	  
	<span>
       <label for 'country'>Country</label>
    <select name='country' id='country'>
	   <option <?php echo (isset($_POST['country']))?"":"selected";?> value=''>Select the country you are from Please</option>
	   <?php
	     $countryArray = array("Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia",
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
						  "Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Vanuatu",
						  "Venezuela","Vietnam","Yemen","Zambia","Zimbabwe");
	       foreach($countryArray as $k=>$value){
				echo'<option '.((isset($_POST['country'])&& $_POST['country']==$value)?"selected":"").'>'.$value.'</option>';
				}
	   ?>	
    </select>	   
    </span>
<br/>
    <span>
	  <label>Are you a resident of the state of Hawaii?</label>
	    <?php
	    $residentArray = array("Yes","No");
	    foreach($residentArray as $k =>$v){
		 echo "<br/><input type='radio' name='resident' ". ((isset($_POST['resident']) && $_POST['resident']==$v)?"checked":"")." value='".$v."' /> ".$v."";
		}
	   ?> <br/>
	</span> 
	
<!--	<span>
	   <label>Did you answer yes to the last questions?</label>
	    <br/>
	   <input type='radio' name='answer'  value='yes'>Yes
	   <input type='radio' name='answer' value='no'>No<br/> -->
	
	<!-- this is where If answer is yes keep going if answer is no go to last questions-->
<!--	</span> -->
	 
	<span>
	   <label>Are you a U.S. Citizenship? choose one</label>     
	   <?php
	    $citizenArray = array("U.S. Citizen","Non-Citizen Allowed to Work ","Non-Citizen NOT Allowed to Work");
		foreach($citizenArray as $k=>$v){
			//echo "<input type='radio' name='citizen' checked value='US Citizen' /> US Citizen";
			echo "<br/><input type='radio' name='citizen' ". ((isset($_POST['citizen']) && $_POST['citizen']==$v)?"checked":"")." value='".$v."' /> ".$v."";
			
		}
	   ?>	   <br/>
	   
</div>	   
	   
	   
<div>	   
	   
	</span>
   
    <span>
       <label for='email-address'>E-Mail address </label>
	   <input type='email' name='email-address' id='email-address' placeholder='name@domain.com' value ='<?php echo (isset($_POST['email-address'])) ?$_POST['email-address']:"";?>'><br/><br/>
	</span>  

	   
	<span>
	   <label>Preferred Method of Notification.  choose one</label><br/>        
	   <?php
	    $notificationArray = array("E-mail","Postal Mail ","Telephone");
		foreach($notificationArray as $k=>$v){
         echo "<input type='radio' name='notification' ". ((isset($_POST['notification']) && $_POST['notification']==$v)?"checked":"")." value='".$v."' /> ".$v."";
			
		}
	   ?>	<br/>
	</span> 
</div>	
</div>
 <!--  </fieldset> -->
	   

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
	   <label>Race<br/>Select all that apply</label>
	   <?php
	    $raceArray = array("American Indian","Alaskan Native","Native Hawaiian or Pacific Islander","Asian","Hispanic","African American or Black","Caucasian or White");
	    foreach($raceArray as $k =>$v){
		 echo "<br/><input type='checkbox' name='race' ". ((isset($_POST['race']) && $_POST['race']==$v)?"checked":"")." value='".$v."' />".$v.""; 
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
		 echo "<input type='radio' name='english' ". ((isset($_POST['english']) && $_POST['english']==$v)?"checked":"")." value='".$v."' /> ".$v."";
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
	    foreach($barriersArray as $k =>$v){
		 echo "<br/><input type='checkbox' name='barriers' ". ((isset($_POST['barriers']) && $_POST['barriers']==$v)?"checked":"")." value='".$v."' />".$v.""; 
		}
	    ?> 
		<input type='text' name='barriers_other' id='barriers_other' value='<?php echo (isset($_POST['barriers_other']))?$_POST['barriers_other']:""; ?>'/><br/>	   
	</span>
</div>
<!--	What is that barrier?<input type=”text” name='barriers[]' id='barriers[]'  value=''/><br/> -->
	    
		<br/>
	
		
	<span>
		<label>this is just for jumping to another location</label>
			<input type='text' name='jump' id='jump' value=''/><br/>
	</span>	
		
 <!--  </fieldset> -->
	   
    <input type='submit' value='Submit'>

  



</form>
</body>

</html> 
<?php 
}//end of validation if statment 


?>

