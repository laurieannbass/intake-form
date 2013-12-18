<?php



	$last_name		= (isset($_POST['last-name'])) ? trim($_POST['last-name']) : "";//$_POST['last-name']
	$first_name		= (isset($_POST['first-name'])) ? trim($_POST['first-name']) : "";//$_POST['first-name']
	$birth_date		= (isset($_POST['dob'])) ? trim($_POST['dob']) : "";//$_POST['dob']
	$address		= (isset($_POST['address'])) ? trim($_POST['address']) : "";//$_POST['address']
	$city           = (isset($_POST['city'])) ? trim($_POST['city']) : "";//$_POST['city']
	$state          = (isset($_POST['state'])) ? trim($_POST['state']) : "";//$_POST['state']
	$zip            = (isset($_POST['zip'])) ? trim($_POST['zip']) : "";//$_POST['zip']

if(count($_POST)>0){

		require_once('search-controller-action.php');
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


					<span> <label for="last-name">First</label>
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