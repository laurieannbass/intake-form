<?php

class intake_controller{
	public function __construct() {
		//load models
		//set action
	}
/*
	public static function update_Action(){
		global $params;
		$db = generalform::getDb(DB_NAME);
		$table = 'formdata';
		if(!isset($_POST['searchOn'])){
			$query = "SELECT * FROM `".$table."`";
		}
		$result = $db->query($query) or die($db->error.__LINE__);

		$objects = array(
			'internship'=>generalform::get_model('internship'),
			'counseling'=>generalform::get_model('counseling'),
			'transcript'=>generalform::get_model('transcript'),
			'pla'=>generalform::get_model('pla'),
			'note'=>array('comment'=>'text')
		);
		
		
		$query_results = array ();
		if($result->num_rows > 0) {
			$i=0;
			while($row = $result->fetch_assoc()) {

				$entryid=$row['id'];

				$uh_id=$row['uh_id'];
				$first_name=$row['first_name'];
				$last_name=$row['last_name'];
				$dob=$row['dob'];
				$address=$row['address'];
				$city=$row['city'];
				$state=$row['state'];
				$zip=$row['zip'];
				$form_object=$row['form_object'];
		
				$params = json_decode($form_object);

				$internship=isset($params->internship)&&!empty($params->internship)?$params->internship:array();
				$counseling=isset($params->counseling)&&!empty($params->counseling)?$params->counseling:array();
				$transcript=isset($params->transcript)&&!empty($params->transcript)?$params->transcript:array();
				$pla=isset($params->pla)&&!empty($params->pla)?$params->pla:array();
				$note=isset($params->note)&&!empty($params->note)?$params->note:array();



				$creation_date 	= strtotime("now");
				
				$objects = array(
					'internship'=>generalform::get_model('internship'),
					'counseling'=>generalform::get_model('counseling'),
					'transcript'=>generalform::get_model('transcript'),
					'pla'=>generalform::get_model('pla'),
					'note'=>array(
							'comment'=>array( "lable"=>"Comment", 'type'=>'text')
						)
				);
				
				foreach($objects as $code=>$model){
					//var_dump($code);
					$items=array();
					$modelHadValue=false;
					foreach($$code as $id=>$entry){
						$entry=(array)$entry;
						var_dump($entry);
						$tmp=array( 'date'=>"".$entry['date'] );			
						foreach($model as $key=>$model_item){
							//var_dump($model_item);
							$oldKey=$model_item['lable'];
							$oldKey = strtolower(str_replace('-','_',str_replace(' ','_',$oldKey)));	
							//var_dump($oldKey);
							//$k='$oldKey';
							//var_dump($entry[$oldKey]);
							
							$val="";
							$tmp[$key] = $val;
							if(isset($entry[$oldKey]) && !empty($entry[$oldKey])){
								$tmp[$key] = $entry[$oldKey];
								$modelHadValue=true;
							}
						}
						
						print('-------------the final item');
						var_dump($modelHadValue);
						if($modelHadValue){
							$items[]=$tmp;
							var_dump($items);
						}else{
							print('----had no value');
						}
					}
					//$params[$code]=$items;
					
					$varname = "${code}_object";
					$$varname = json_encode ((object)$items);
					var_dump($$varname);
					print('-----------------------------------------------------------------------------');
				}

				$jsonObj = json_encode ( json_decode($form_object) ); // this is all of the form POST data serialized
				$form_object	= $jsonObj;

				//is type a boolane? and is equal to false is the same as === false
				if (@$db->select_db(($db==null?DB_NAME:$db)) === false) {
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
							`internship_object` text,
							`counseling_object` text,
							`transcript_object` text,
							`pla_object` text,
							`note_object` text,
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
				

				$sql = "UPDATE ".$table." SET 
					uh_id='%s',first_name='%s',last_name='%s',dob='%s',address='%s',city='%s',state='%s',zip='%s',form_object='%s',internship_object='%s',counseling_object='%s',transcript_object='%s',pla_object='%s',note_object='%s'";

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
					$db->real_escape_string($form_object),
					$db->real_escape_string($internship_object),
					$db->real_escape_string($counseling_object),
					$db->real_escape_string($transcript_object),
					$db->real_escape_string($pla_object),
					$db->real_escape_string($note_object)
				);
				$sql.=sprintf(" WHERE `id`=%s",$entryid);
			
			
				if (mysqli_query($db,$sql)){
				  $mess="Inserted row successfully for ".$first_name." ".$last_name."<br/>";//.$sql;
				  generalform::setMessage($mess,"success");
				} else {
				  $mess="Error inserting rows: run it again<br/>" ;
				  $mess.=$db->error;
				  generalform::setMessage($mess,"err");
				}

				$query_results[]=array(
					'id'=>$row['id'],
					'uh_id'=>$row['uh_id'],
					'name'=>"{$row['last_name']}, {$row['first_name']}"
				);
			}
		}
		generalform::closeDbConnection();
		echo "done";
		var_dump($params);

	}
*/




	public static function list_Action(){
		global $params;
		$db = generalform::getDb(DB_NAME);
		$table = 'formdata';
		if(!isset($_POST['searchOn'])){
			$query = "SELECT * FROM `".$table."`";
		}
		$result = $db->query($query) or die($db->error.__LINE__);
	
		if(!isset($_POST['download'])){
			$query_results = array ();
			if($result->num_rows > 0) {
				$i=0;
				while($row = $result->fetch_assoc()) {
					$query_results[]=array(
						'id'=>$row['id'],
						'uh_id'=>$row['uh_id'],
						'name'=>"{$row['last_name']}, {$row['first_name']}"
					);
				}
			}
			$params['query_results']=$query_results;
		}else{
			$file= date ('D-d-M-Y--H-i-s',strtotime("now")  ).'.csv';
			$list = array ();
			if($result->num_rows > 0) {
				$i=0;
				$forms = array();
				while($row = $result->fetch_assoc()) {
					$form = json_decode($row['form_object']);
					$form->creation_date=$row['creation_date'];
					
					unset($form->counseling);
					unset($form->internship);
					unset($form->transcript);
					unset($form->pla);
					unset($form->note);
					
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
			generalform::createCSV($file,$list);
		}
		return generalform::getPage("intake_list",$params);
	}

	public static function new_Action(){
		return self::edit_Action(0);
	}

	public static function edit_Action($id=0){
		global $params;
		
		if(isset($params['id']) && $params['id']>0){
			$entry= generalform::getEntry($params['id']);
			
			$objects = array('form','internship','counseling','transcript','pla','note');//note this would be from model
			foreach($objects as $object){
				$formData = json_decode ($entry["${object}_object"]);
				//$id=$params['id'];
				if(count($formData)>0){
					foreach($formData as $key=>$value){
						$$key=$value;
						$params[$key]=$value;
					}
				}
				$tmp["${object}_object"]=$formData;
			}
			$params["entry"]=$tmp;
		}
		if(count($_POST)>0){
			generalform::setMessage("First, Last Name, Resident Address, birthday and Phone number are required fields and must be filled in.","err");
		}
		return generalform::getPage("intake",$params);
	}
	
	public static function save_Action(){
		global $params;

		if( count($_POST)>0 ){
			if(isset($_POST['endit'])){
				generalform::redirect('dashboard', array() );	
			}
		}
		
		$requiredFeilds = array("last_name",'first_name','dob','address','city','state','zip');
		$postValid = generalform::validatePOST( $requiredFeilds );
		if(!$postValid){
			self::edit_Action($id=0);
		}
		
		$entryid=isset($_POST['id'])&&$_POST['id']>0?$_POST['id']:0;
		foreach($_POST as $key=>$value){
			   $$key=$value;
			   $params[$key]=$value;
		}
		echo 'form was filled out<br/>';
		$creation_date 	= strtotime("now");
		
		$objects = array(
			'internship'=>generalform::get_model('internship'),
			'counseling'=>generalform::get_model('counseling'),
			'transcript'=>generalform::get_model('transcript'),
			'pla'=>generalform::get_model('pla'),
			'note'=>array('comment'=>'text')
		);

		foreach($objects as $code=>$model){
			//Start by filtering the expando fields
			
			
			$submitted_items=$params[$code];
			$items=array();
			foreach($submitted_items as $id=>$entry){
				if(isset($entry['date']) && $entry['date']!="" && $entry['remove']!=1){
					$tmp=array( 'date'=>"".$entry['date'] );			
					foreach($model as $key=>$item){
						$objProp = '$key';
						$tmp[$key] = "".isset($entry[$key])?$entry[$key]:"";
					}
					$items[]=$tmp;
				}
			}
			$params[$code]=$items;
			$varname = "${code}_object";
			$$varname = json_encode ((object)$items);
		}
	/*
	
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
		$internship_object = json_encode ((object)$internships);

*/
		
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
					`internship_object` text,
					`counseling_object` text,
					`transcript_object` text,
					`pla_object` text,
					`note_object` text,
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
			uh_id='%s',first_name='%s',last_name='%s',dob='%s',address='%s',city='%s',state='%s',zip='%s',form_object='%s',internship_object='%s',counseling_object='%s',transcript_object='%s',pla_object='%s',note_object='%s'";
		}else{
			$sql = "INSERT INTO ".$table." 
				(uh_id,first_name,last_name,dob,address,city,state,zip,form_object,internship_object,counseling_object,transcript_object,pla_object,note_object)
				VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
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
			$db->real_escape_string($form_object),
			$db->real_escape_string($internship_object),
			$db->real_escape_string($counseling_object),
			$db->real_escape_string($transcript_object),
			$db->real_escape_string($pla_object),
			$db->real_escape_string($note_object)
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
		if(isset($_POST['submit'])){
			generalform::redirect('intake/list');
		}
		if(isset($_POST['save'])){
			generalform::redirect('intake/edit', array('id'=>$entryid ) );
		}
	}

	public function remove_Action(){
		
	}


	
	
}

/*



function proccessPost(){
	global $params;

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
	$internship_object = json_encode ($internships);


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
	$counseling_object = json_encode ($counselings);

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
	$transcript_object = json_encode ($transcripts);

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
	$pla_object = json_encode ($plas);
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
				`internship_object` text,
				`counseling_object` text,
				`transcript_object` text,
				`pla_object` text,
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
		uh_id='%s',first_name='%s',last_name='%s',dob='%s',address='%s',city='%s',state='%s',zip='%s',form_object='%s',internship_object='%s',counseling_object='%s',transcript_object='%s',pla_object='%s'";
	}else{
		$sql = "INSERT INTO ".$table." 
			(uh_id,first_name,last_name,dob,address,city,state,zip,form_object,internship_object,counseling_object,transcript_object,pla_object)
			VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
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
		$db->real_escape_string($form_object),
		$db->real_escape_string($internship_object),
		$db->real_escape_string($counseling_object),
		$db->real_escape_string($transcript_object),
		$db->real_escape_string($pla_object)
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
	if(isset($_POST['submit'])){
		generalform::redirect('intake_list');
	}
	if(isset($_POST['save'])){
		generalform::redirect('intake', array('id'=>$entryid ) );
	}
}


if( count($_POST)>0 ){
	if(isset($_POST['endit'])){
		generalform::redirect('dashboard', array() );	
	}
}

$requiredFeilds = array("last_name",'first_name','dob','address','city','state','zip');
$postValid = generalform::validatePOST( $requiredFeilds );
if($postValid){
    proccessPost();
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
			   $params[$key]=$value;
        }
		$entry=$formData;
		$params['entry']=$entry;
    }
	
    

	 
    
    if(count($_POST)>0){
        generalform::setMessage("First, Last Name, Resident Address, birthday and Phone number are required fields and must be filled in.","err");
    }
	return generalform::getPage("intake",$params);
}//end of validation if statement 

*/
