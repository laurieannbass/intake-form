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


<form name='input' action='http://local.general.dev/form.php' method='post'>

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
	   <input type='text' name='first-name' id='first-name' value=''/> <br/>
	</span> 
	   <br/>

	<span>
	   <label for='homephone'>Home Phone Number</label><br/>
       <input type='text' name='homephone' id='homephone'  placeholder='xxx-xxx-xxxx' value=''/><br/>
	</span>
	  
	<span>
	   <label for='cellphone'>Cell Phone Number</label><br/>
       <input type='text' name='cellphone' id='cellphone' placeholder='xxx-xxx-xxxx'/><br/>
	</span>
	
    <span>	
	   <label for='address'>Residence Street Address</label>
       <input type='text' name='address' id='address'  value=''/>	
    </span>
	 
    <span>	 
	   <label for='city'>City</label>
       <input type='text' name='city' id='city'  value=''/>	
    </span>
	 
	<span> 
	   <label for='zip'>Zip Code</label>
       <input type='text' name='zip' id='zip' value=''/>
	</span>  
	 
	<!-- <fieldset>
	<legend><b>Mailing Address (if different from residence)</b></legend> -->
<div><h3>Mailing Address (if different from residence)</h3>
	 
	<span>
	   <label for='mailaddress'>Mailing Address</label>
       <input type='text' name='mailaddress' id='mailaddress'  value=''/>	   
	   <label for='mailcity'>    City:</label>
       <input type='text' name='mailcity' id='mailcity'  value=''/>	   
	   <label for='mailzip'>    Zip Code:</label>
       <input type='text' name='mailzip' id='mailzip' value=''/>
	</span> 
</div> 
  <!-- </fieldset> -->

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

	  
	<span>
	   <label for='country'>Country</label>
	   <input type='text' name='country' id='country' value=''/>	   
    </span>

    <span>	 
	   <label>Are you a resident of the state of Hawaii?</label>
	   <input type='radio' name='resident'  value='yes'>Yes
	   <input type='radio' name='resident' value='no'>No<br/>
	</span>
	  
	<span>
	   <label>Did you answer yes to the last quesions?</label>
	    <br/>
	   <input type='radio' name='answer'  value='yes'>Yes
	   <input type='radio' name='answer' value='no'>No<br/>
	
	<!-- this is where If answer is yes keep going if answer is no go to last questions-->
	</span>
	 
	<span>
	   <label>Are you a U.S. Citizenship? choose one</label><br/>      
	   <?php
	    $citizenArray = array("U.S. Citizen","Non-Citizen Allowed to Work ","Non-Citizen NOT Allowed to Work");
		foreach($citizenArray as $k=>$v){
			//echo "<input type='radio' name='citizen' checked value='US Citizen' /> US Citizen";
			echo "<input type='radio' name='citizen' ". ((isset($_POST['citizen']) && $_POST['citizen']==$v)?"checked":"") ." value='".$v."' /> ".$v."";
			
		}
	   ?>	   <br/>
	   
	   
	   
	   
	   
	   
	</span>
   
    <span>
       <label for='email-address'>E-Mail address </label>
	   <input type='email' name='email-address' id='email-address' placeholder='name@domain.com'><br/><br/>
	</span>  

	   
	<span>
	   <label>Preferred Method of Notification.  choose one</label><br/>        
	   <input type='radio' name='notification' value='email'>E-mail       
	   <input type='radio' name='notification' value='postal'>Postal Mail       
	   <input type='radio' name='notification' value='phone'>Telephone<br/>
	</span> 
</div>
 <!--  </fieldset> -->
	   

<div>
	<span>
       <label>Hispanic or Latino</label>
	   <input type='radio' name='hispanic' value='yes'>Yes
	   <input type='radio' name='hispanic' value='no'>No
	</span>

    <span>	 
	   <label>Native Hawaiian Ancestry</label>
	   <input type='radio' name='nativehaw' value='yes'>Yes
	   <input type='radio' name='nativehaw' value='no'>No<br/>
	</span>
	 
	   

    <span>
	   <label>Race<br/>Select all that apply</label><br/>
       <input type='checkbox' name='race[]' value='American Indian'>American Indian<br/>
       <input type='checkbox' name='race[]' value='Alaskan Native'>Alaskan Native<br/>
	   <input type='checkbox' name='race[]' value='Native Hawaiian or Pacific Islander'>Native Hawaiian or Pacific Islander<br/>
       <input type='checkbox' name='race[]' value='Asian'>Asian<br/>
	   <input type='checkbox' name='race[]' value='Hispanic'>Hispanic<br/> 
	   <input type='checkbox' name='race[]' value='African American or Black'>African American or Black<br/>
       <input type='checkbox' name='race[]' value='Caucasian or White'>Caucasian or White<br/>
	</span>
       
	   
	<span>
       <label>Gender</label><br/>
	   <input type='radio' name='sex' value='male'>Male<br/>
       <input type='radio' name='sex' value='female'>Female<br/>
	 </span>       
	   
	<span>
	   <label for='age'>Age</label><br/>
	   <input type='text' name='age' id='age' value=''/><br/>
	</span>       
	   
	<span>
       <label for='dob'>Birth Date</label><br/> <!--ask if there is format for date-->
	   <input type='text' name='dbo' id='dob' placeholder='MM-DD-YYYY'/><br/>
	</span>      
	  
</div>
	 
  <!-- <fieldset>
       <legend><b>MILITARY AND VETERAN STATUS</b></legend> -->
<div><h3>Military and Veteran Status</h3>
  
<div>  
	<span>  	   
	   <label>Are you currently an active member or prior member of the armed forces?</label><br/>
	   <input type='radio' name='military' value='yes'>Yes  <br/> 
       <input type='radio' name='military' value='no'>No<br/>
	</span>

    <span>	 
	   <label>Spouse served in U.S. Military?</label><br/>	    
	   <input type='radio' name='military_spouse' value='yes'>Yes<br/>   
	   <input type='radio' name='military_spouse' value='no'>No<br/> 
    </span>
	<span>  
	   <label>Veteran Status?:</label><br/>
       <input type='radio' name='va-status' value='less180'>Less than 180 days<br/> 
       <input type='radio' name='va-status' value='self'>Eligible Vet<br/>
	   <input type='radio' name='va-status' value='spouse'>Eligible Spouse<br/>
       <input type='radio' name='va-status' value='dependent'>Dependent<br/>
       <input type='radio' name='va-status' value='noteligible'>Not Eligible<br/>
	</span>
</div>  
<div>
	<span>
	   <label>Campaign Veteran</label><br/>
	   <input type='radio' name='vet-campaign' value='yes'>Yes<br/>
	   <input type='radio' name='vet-campaign' value='no'>No<br/>
	   <input type='radio' name='vet-campaign' value='na'>N/A<br/>
	</span>

    <span> 	 
	   <label>Recently Separated Veteran</label><br/>
	   <input type='radio' name='vet-separated' value='yes'>Yes<br/>	            
	   <input type='radio' name='vet-separated' value='no'>No<br/>	
	   <input type='radio' name='vet-separated' value='na'>N/A<br/>
	</span>

	  
    <span>
       <label>Disabled Veteran</label> <br/>	             
	   <input type='radio' name='vet-disabled' value='yes'>Yes<br/>	             	   
	   <input type='radio' name='vet-disabled' value='yes-specialdisabled'>Yes, Special Disabled<br/>  	           
	   <input type='radio' name='vet-disabled' value='na'>N/A<br/> 
	</span>
</div>

</div>  
 <!--  </fieldset> -->
	  
 <!--  <fieldset>
    <legend><b>EDUCATION</b></legend> -->
	 
<div><h3>Education</h3>	 
<div>
	<span>
	   <label>What is your current educational Status?</label><br/>
       <input type='radio' name='ed-status' value='in-highschool-orlower'>In school,High School or less<br/> 	            
       <input type='radio' name='ed-status' value='in-alternative'>In School, Alternative School<br/>	            
	   <input type='radio' name='ed-status' value='in-post-hs'>In school,Post-High School<br/>	            
	   <input type='radio' name='ed-status' value='no-hs-dropout'>Not attending school, High School Dropout<br/>      
       <input type='radio' name='ed-status' value='no-hs-graduate'>Not attending school, High School Graduate<br/>	  
    </span>


	<span>
	   <label>Highest grade completed:</label><br/>
	   <input type='radio' name='highestgrade' value='noschool'>No School Grades Completed<br/>	 
	   <input type='radio' name='highestgrade' value='ged-equivalent'>GED or Equivalent<br/>   
	   <input type='radio' name='highestgrade' value='hs-diploma'>High School Diploma<br/>      
	   <input type='radio' name='highestgrade' value='certificate-attendance'>Certificate of Attendance/Completion<br/>	           
	   <input type='radio' name='highestgrade' value='other-postsecondary'>Other Post-Secondary Degree or Certificate<br/>     
	   <input type='radio' name='highestgrade' value='associate'>Associate Diploma or Degree<br/>     
	   <input type='radio' name='highestgrade' value='bachelor'>Bachelor's Degree or Equivalent<br/>   
	   <input type='radio' name='highestgrade' value='postgraduate'>Education beyond Bachelor's Degree<br/>
	</span>
</div>

<div>   
    <span>
	   <label>Pell Grant Recipient</label><br/>
	   <input type='radio' name='pell' value='yes'>Yes<br/>	            
	   <input type='radio' name='pell' value='no'>No<br/>	            
	</span>

	
	   
	<span>
	   <label>Low Income</label><br/>	   
	   <input type='radio' name='lowincome' value='yes'>Yes<br/>		
	   <input type='radio' name='lowincome' value='no'>No<br/>
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
	   <label>Food Stamp Recipient</label><br/>
	   <input type='radio' name='foodstamps' value='yes'>Yes<br/>
	   <input type='radio' name='foodstamps' value='no'>No<br/>
    </span>

		
	<span>
	   <label>Foster Child</label><br/>
	   <input type='radio' name='fosterchild' value='yes'>Yes<br/>
	   <input type='radio' name='fosterchild' value='no'>No<br/>
    </span>
		
	<span>
	   <label for='familysize'>Family Size</label><br/>
		<select name='familysize' id='familysize'>
	     <option></option>
		 <option >1</option>
         <option >2</option>
         <option >3</option>
         <option >4</option>
	     <option >5</option>
	     <option >6</option>
		 <option >7</option>
		 <option >8</option>
		 <option >9</option>
		 <option >10 or more</option>
	   </select><br/><br/>
	</span>
</div>
	 
<div>
    <span>	 
	   <label for='income'>Annual Family Income</label><br/>
		<select name='income' id='income'>
		 <option></option>
	     <option >Less than $20,000</option>
         <option >$21,000 to $35,000</option>
         <option >$36,000 to $50,000</option>
         <option >$50,000 to $70,000</option>
	     <option >over $70,000</option>
	    </select>
	</span>

    <span>	 
	   <label for='laborstatus'>Labor Force Status</label><br/>
		<select name='laborstatus' id='laborstatus'>
	     <option></option>
		 <option >Employed</option>
         <option >Not Employed</option>
         <option >Employed, but Received Notice of Termination or Military Separation</option>
        </select><br/><br/>
	</span>

    <span>	 
	   <label for='unemp-comp'>Unemployment Compensation</label><br/>
		<select name='unemp-comp' id='unemp-comp'>
	     <option></option>
		 <option >Claimant</option>
         <option >Exhaustee</option>
         <option >None</option>
        </select>
	</span>
</div>
<div>
	 <span>
	   <label>Single Parent</label><br/>
	   <input type='radio' name='single-parent' value='yes'>Yes<br/>
	   <input type='radio' name='single-parent' value='no'>No<br/>
     </span>
	   
	 <span>
	   <label>Is English your Second language? </label><br/>
	   <input type='radio' name='english' value='yes'>Yes<br/>
	   <input type='radio' name='english' value='no'>No<br/>
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
        <input type='checkbox' name='barriers[]' value='Limited English'>Limited English<br/>
        <input type='checkbox' name='barriers[]' value='Displaced Home-maker'>Displaced Home-maker<br/>
	    <input type='checkbox' name='barriers[]' value='Single Parent'>Single Parent<br/>
        <input type='checkbox' name='barriers[]' value='Offender'>Offender<br/>
	    <input type='checkbox' name='barriers[]' value='Runaway under 18'>Runaway under 18<br/> 
	    <input type='checkbox' name='barriers[]' value='Pregnant or Parenting'>Pregnant or Parenting<br/>
        <input type='checkbox' name='barriers[]' value='Requires Additional Assistance'>Requires Additional Assistance<br/>
		<input type='checkbox' name='barriers[]' value='Homeless'>Homeless<br/>
        <input type='checkbox' name='barriers[]' value='Deficient Basic Literacy Skills'>Deficient Basic Literacy Skills<br/>
	    <input type='checkbox' name='barriers[]' value='School Drop out'>School Drop out<br/>
        <input type='checkbox' name='barriers[]' value='Foster Child'>Foster Child<br/>
	    <input type='checkbox' name='barriers[]' value='Serious Barrier-Board Defined'>Serious Barrier - Board Defined<br/> 
		<input type='text' name='barriers-other' id='barriers-other' value=''>What is that barrier?
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

