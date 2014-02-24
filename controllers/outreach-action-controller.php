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

	//var_dump($params);
	
    $jsonObj = json_encode ($params); // this is all of the form POST data serialized
	$form_object	= $jsonObj;

    $db = generalform::getDb();

	echo 'Connected successfully<br/>';
    $table = 'outreach';
	$sql = "SHOW TABLES LIKE '".$table."'";
    if(@mysqli_num_rows(mysqli_query($db,$sql))==1) {
          echo "Table exists";
	} else { 
		//if table not exists create
		echo "Table does not exist-- going to create table<br/>";
		echo "".""."";
		$sql = "CREATE TABLE ".$table." (
				`id` int NOT NULL AUTO_INCREMENT,
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

	
	$update = isset($_POST['id'])&&$_POST['id']>0;
	if($update){
		$sql = "UPDATE ".$table." SET form_object='%s'";
	}else{
		$sql = "INSERT INTO ".$table." (form_object) VALUES ('%s')";
	}
	$sql = sprintf(
		$sql,
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


$postValid = generalform::validatePOST( array('zip') );
if( $postValid ){
    proccessPost();
}else{
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
        generalform::setMessage("There were missing required fields","err");
    }
    include_once('veiws/pages/outreachform.php');
}//end of validation if statement 


