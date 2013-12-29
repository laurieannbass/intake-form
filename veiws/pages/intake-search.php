<?php
require_once('controllers/general-controller.php');

if(count($_POST)>0){
		require_once('controllers/search-controller-action.php');
}else{

?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
	<div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
		<form name='input' action='http://local.general.dev/intake-form/Searchform.php' class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" novalidate>
			<header id="header" class="info">
			   <h2>INTAKE Search FORM</h2>
                
			</header>
			
			<h3>Contact Information</h3>
			<ul>
				<li>
					<input type='submit' value='Run for All' name="all">
					<hr/>
				</li>
				<li id="foli101" class="notranslate">
					<label class="desc" id="title116" for="uh-id">UH ID Number</label>
					<div>
					<input type='text' name='uh-id' id='uh-id' class="field text medium" maxlength="255"/> 
					</div>
				</li>
				<li id="foli102" class="notranslate ">
					<span><label for="last-name">First</label>
						<input type='text' name='first-name' id='first-name' class="field text long"  maxlength="255" /> 
					</span>
						</li>
				<li id="foli102" class="notranslate ">	
					<span><label for="last-name">Last</label>
						<input type='text' name='last-name' id='last-name' class="field text long" maxlength="255" /> 
					</span>
				</li>
				<li id="foli102" class="notranslate ">	
					<span><label for="address">Street Address</label>
						<input type='text' name='address' id='address' class="field text long" maxlength="255" /> 
					</span>
				</li>
				<li id="foli102" class="notranslate ">	
					<span><label for="City">City</label>
						<input type='text' name='City' id='City' class="field text long" maxlength="255" /> 
					</span>
				</li>
				<li id="foli102" class="notranslate ">	
					<span><label for="state">State / Province / Region</label>
						<input type='text' name='state' id='state' class="field text long" maxlength="255" /> 
					</span>
				</li>
				<li id="foli102" class="notranslate ">	
					<span><label for="zip">Postal / Zip Code</label>
						<input type='text' name='zip' id='zip' class="field text long" maxlength="255" /> 
					</span>
				</li>
				<li id="foli102" class="notranslate ">	
					<span><label for="dob">Birth Date</label>
						<input type='text' name='dob' id='dob' class="field text long" placeholder='MM-DD-YYYY' /> 
					   
					</span>
				</li>
				<li id="foli102" class="notranslate ">	
						<label>Gender</label>
						<select name='gender'>
						<?php $genderArray = array("Male","1"=>"Female");
						   foreach($genderArray as $v){
							echo "<option  ".((isset($_POST['gender']) && $_POST['gender']==$v)?"selected":"")." value='".$v."' > ".$v."</option>";
							}
						 ?>
						</select>
				</li>
				<li id="foli102" class="notranslate ">	
					<span><label for="other">Other fields (Full text search)</label>
						<input type='text' name='other' id='other' class="field text long" /> 
					   
					</span>
				</li>
			</ul>
			<!--  </fieldset> -->
			<input type='submit' value='Submit'>
		</form>
	</div>
</body>
</html> 
<?php 
}//end of validation if statement 


?>