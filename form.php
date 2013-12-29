<?php
    require_once('controllers/general-controller.php');

    $postValid = validatePOST( array("last-name",'first-name','dob','address','city','state','zip') );

if( $postValid ){
    require_once('controllers/form-action-controller.php');
}else{
	// we will have a conflict of the new post and the old data
	// to get around this we need to first have the queried data
	//in the array, then loop over the post and merge it with the record
	// when we do this we can overwrite old data from the query with the
	// post .
	
	//do query if $_GET['id'] exist
	
	// if id exists then loop over post
	// while looping over post assign to the 
	// row IE: if( isset($_POST['dob']) )$row['dob'] = $_POST['dob'];
	// while looping over the data and reassigning it, then create vars on
	// the fly IE: $$key= $row['dob'];
	// which then produces $dob="the row value";
	
	
    if(count($_POST)>0){
       setMessage("There were missing required fields","err");
    }
    include_once('veiws/pages/form.php');

}//end of validation if statement 


?>

