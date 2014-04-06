<?php
function proccessPost(){
	if(isset($_POST['download'])){
		
		$db = snap::getDb(DB_NAME);
		$table = 'outreach';
		$query = "SELECT * FROM `".$table."`";
		$result = $db->query($query) or die($db->error.__LINE__);
		$file= date ('D-d-M-Y--H-i-s',strtotime("now")  ).'.csv';
		$list = array ();
		if($result->num_rows > 0) {
			$i=0;
			$forms = array();
			while($row = $result->fetch_assoc()) {
				$form = json_decode($row['form_object']);
				$form->creation_date=$row['creation_date'];

				$forms[] = $form;
			}
			$headers=array();
			$default=array();			
			foreach($forms as $form_object) {
				foreach($form_object as $k=>$v){
					if( !in_array($k,$default) ){
						$default[$k] = "";
						$headers[$k] = ucwords( str_replace("_"," ", str_replace("-"," ",$k) ) );
					}
				}
			}
			$list[]=$headers;
			foreach($forms as $form) {
				$form_object = (object)array_merge((array)$default,(array)$form);
				$formvalue=array();
				foreach($form_object as $k=>$v){
					//var_dump($v);
					$value="";
					if(gettype($v)=="array"){
						$value='"';
						$i=0;
						foreach($v as $k=>$val){
							if(gettype($val)!="object"){
								$value.=($i>0?",":"").$val;
								$i++;
							}
						}
						$value.='"';
					}else{
						if(gettype($v)!="object"){$value=$v;}
					}
					$formvalue[]=$value;
				}
				$list[]=$formvalue;
			}
		}
		
		//$result = $db->query($query) or die($db->error.__LINE__);
	
		snap::createCSV($file,$list);
	}	
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

    $db = snap::getDb();

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
	  $mess="Inserted row successfully<br/>";//.$sql;
	  snap::setMessage($mess,"success");
	} else {
	  $mess="Error inserting rows: run it again<br/>" ;
	  $mess.=$db->error;
	  snap::setMessage($mess,"err");
	}
	if($entryid>0){
		
	}else{
		$entryid=mysqli_insert_id($db);
	}
	snap::closeDbConnection();
	
	if(isset($_POST['submit'])){
		snap::redirect('dashborad');
	}
	if(isset($_POST['save'])){
		snap::redirect('outreach', array('id'=>$entryid ) );
	}	
}


if( count($_POST)>0 ){
	if(isset($_POST['endit'])){
		snap::redirect('outreach', array() );	
	}
}

$requiredFeilds = array();
$postValid = snap::validatePOST( $requiredFeilds );
if(count($_POST)>0){
    proccessPost();
}else{
	if(isset($_GET['id'])){
		
        $entry = array();//snap::getEntry($_GET['id']);
		if(!empty($entry)){
			$formData = json_decode ($entry['form_object']);
			$id=$_GET['id'];
			foreach($formData as $key=>$value){
				   $$key=$value;
			}
			$entry=$formData;
		}else{
			$entry = array();	
		}
    }

    if(count($_POST)>0){
        foreach($_POST as $key=>$value){
               $$key=$value;
        }
        snap::setMessage("There were missing required fields","err");
    }
	return snap::getPage("outreach");
    //include_once('veiws/pages/outreachform.php');
}//end of validation if statement 


