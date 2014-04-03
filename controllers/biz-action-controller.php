<?php
function proccessPost(){
	
	$params=array();
	$entryid=isset($_POST['id'])&&$_POST['id']>0?$_POST['id']:0;
    foreach($_POST as $key=>$value){
           $$key=$value;
		   $params[$key]=$value;
    }
	echo 'form was filled out<br/>';
	$creation_date 	= strtotime("now");
	
	

	//Start by filtering the expando fields
	$INTERNSHIP = generalform::get_INTERNSHIP();
	
	$internship=$params['internship'];
	$internships=array();
	foreach($internship as $id=>$entry){
		if(isset($entry['date']) && $entry['date']!="" && $entry['remove']!=1){
			$tmp=array( 'date'=>"".$entry['date'] );			
			foreach($INTERNSHIP as $key=>$type){	
				$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));		
				$tmp[$key] = "".isset($entry[$key])?$entry[$key]:"";
			}
			$internships[]=$tmp;
		}
	}
	$params['internship']=$internships;



	$COUNSELING = generalform::get_COUNSELING();
	
	$counseling=$params['counseling'];
	$counselings=array();
	foreach($counseling as $id=>$entry){
		if(isset($entry['date']) && $entry['date']!="" && $entry['remove']!=1){
			$tmp=array( 'date'=>"".$entry['date'] );			
			foreach($COUNSELING as $key=>$type){	
				$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));		
				$tmp[$key] = "".isset($entry[$key])?$entry[$key]:"";
			}
			$counselings[]=$tmp;
		}
	}
	$params['counseling']=$counselings;	

	$TRANSCRIPT_EVALUATIONS = generalform::get_TRANSCRIPT_EVALUATIONS();
	
	$transcript=$params['transcript'];
	$transcripts=array();
	foreach($transcript as $id=>$entry){
		if(isset($entry['date']) && $entry['date']!="" && $entry['remove']!=1){
			$tmp=array( 'date'=>"".$entry['date'] );			
			foreach($TRANSCRIPT_EVALUATIONS as $key=>$type){	
				$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));		
				$tmp[$key] = "".isset($entry[$key])?$entry[$key]:"";
			}
			$transcripts[]=$tmp;
		}
	}
	$params['transcript']=$transcripts;	

	$PRIOR_LEARNING_ASSESSMENT = generalform::get_PRIOR_LEARNING_ASSESSMENT();
	$pla=$params['pla'];
	$plas=array();
	foreach($pla as $id=>$entry){
		if(isset($entry['date']) && $entry['date']!="" && $entry['remove']!=1){
			$tmp=array( 'date'=>"".$entry['date'] );			
			foreach($PRIOR_LEARNING_ASSESSMENT as $key=>$type){	
				$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));		
				$tmp[$key] = "".isset($entry[$key])?$entry[$key]:"";
			}
			$plas[]=$tmp;
		}
	}
	$params['pla']=$plas;	

	//var_dump($params);
	
    $jsonObj = json_encode ($params); // this is all of the form POST data serialized
	$form_object	= $jsonObj;
	
	//var_dump($form_object);die();
	
	
	//make your db connection then
	// Create connection
    $db = generalform::getDb();

	//is type a boolane? and is equal to false is the same as === false
	if ($db->select_db(($db==null?DB_NAME:$db)) === false) {
        echo "Error connecting too database: " ;
        die();
	}
	//check for table
	// Select 1 from table_name will return false if the table does not exist.   
    
    $table = 'formdata';
	$sql = "SHOW TABLES LIKE '".$table."'";
    if(@mysqli_num_rows(mysqli_query($db,$sql))==1) {
          echo "Table exists";
	} else { 
		//if table not exists create
		echo "Table does not exist-- going to create table<br/>";
		echo "".""."";
		$sql = "CREATE TABLE ".$table." (
				`id` int NOT NULL AUTO_INCREMENT,
				`uh_id` varchar(8),		     	
				`last_name`  varchar(255)	NOT NULL,
				`first_name` varchar(255)	NOT NULL,
				`dob` varchar(255) NOT NULL,
				`address` varchar(255) NOT NULL,
				`city` varchar(255)     NOT NULL,
				`state` varchar(255) NOT NULL,
				`zip` varchar(10)  NOT NULL,
				`form_object` text,
				`creation_date` timestamp,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1
		";
		if (mysqli_query($db,$sql)) {
		  echo "table ".$table." created successfully<br/>";
		} else {
		  echo "Error creating table: run it again<br/>" ;
		  echo $db->error;
		}
	}
	//,$creation_date,,,$first_name,$birth_date,$address,$city,$zip
	//now insert row :D yes it will
	//do a select of the data, if it exist then do nothing
	//if not there then 
	
	$update = isset($_POST['id'])&&$_POST['id']>0;
	if($update){
		$sql = "UPDATE ".$table." SET 
		uh_id='%s',first_name='%s',last_name='%s',dob='%s',address='%s',city='%s',state='%s',zip='%s',form_object='%s'";
	}else{
		$sql = "INSERT INTO ".$table." 
			(uh_id,first_name,last_name,dob,address,city,state,zip,form_object)
			VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')";
	}
	$sql = sprintf(
		$sql,
		$db->real_escape_string($uh_id),
		$db->real_escape_string($first_name),
		$db->real_escape_string($last_name),
		$db->real_escape_string($dob),
		$db->real_escape_string($address),	
		$db->real_escape_string($city),
		$db->real_escape_string($state),
		$db->real_escape_string($zip),
		$db->real_escape_string($form_object)
	);
	if($entryid>0){
		$sql.=sprintf(" WHERE `id`=%s",$entryid);
	}


	if (mysqli_query($db,$sql)){
	  $mess="Inserted row successfully for ".$first_name." ".$last_name."<br/>";//.$sql;
	  generalform::setMessage($mess,"success");
	} else {
	  $mess="Error inserting rows: run it again<br/>" ;
	  $mess.=$db->error;
	  generalform::setMessage($mess,"err");
	}
	if($entryid>0){
		
	}else{
		$entryid=mysqli_insert_id($db);
	}
	generalform::closeDbConnection();
	generalform::redirect('form', array('id'=>$entryid ) );
	
}


if( count($_POST)>0 ){
	if(isset($_POST['endit'])){
		generalform::redirect('dashboard', array() );	
	}
}

$requiredFeilds = array("last_name",'first_name','dob','address','city','state','zip');
$postValid = generalform::validatePOST( $requiredFeilds );
if($postValid){
    //proccessPost();
}else{
	// we will have a conflict of the new post and the old data
	// to get around this we need to first have the queried data
	// in the array, then loop over the post and merge it with the record
	// when we do this we can overwrite old data from the query with the
	// post .
	
	//do query if $_GET['id'] exist
	
	// if id exists then loop over post
	// while looping over post assign to the 
	// row IE: if( isset($_POST['dob']) )$row['dob'] = $_POST['dob'];
	// while looping over the data and reassigning it, then create vars on
	// the fly IE: $$key= $row['dob'];
	// which then produces $dob="the row value";
	if(isset($_GET['id'])){
        $entry= generalform::getEntry($_GET['id']);
		$formData = json_decode ($entry['form_object']);
		$id=$_GET['id'];
        foreach($formData as $key=>$value){
               $$key=$value;
        }
		$entry=$formData;
    }
	
    

    
    
    if(count($_POST)>0){
        foreach($_POST as $key=>$value){
               $$key=$value;
        }
        generalform::setMessage("First, Last Name, Resident Address, birthday and Phone number are required fields and must be filled in.","err");
    }
    include_once('veiws/pages/biz.php');
}//end of validation if statement 


