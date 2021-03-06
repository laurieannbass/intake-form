<?php
require_once('models/intake.php');
class intake_controller{
	public function __construct() {
		//load models
		//set action
	}

	public static function list_Action(){
		global $params;
		$db = snap::getDb(DB_NAME);
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
			snap::createCSV($file,$list);
		}
		return snap::getPage("intake_list",$params);
	}

	public static function new_Action(){
		return self::edit_Action(0);
	}

	public static function edit_Action($id=0){
		global $params;
		
		if(isset($params['id']) && $params['id']>0){
			$entry= intake_model::getEntry($params['id']);
			
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
			snap::setMessage("First, Last Name, Resident Address, birthday and Phone number are required fields and must be filled in.","err");
		}
		return snap::getPage("intake",$params);
	}
	
	public static function save_Action(){
		global $params;

		if( count($_POST)>0 ){
			if(isset($_POST['endit'])){
				snap::redirect('dashboard', array() );	
			}
		}
		
		$requiredFeilds = array("last_name",'first_name','dob','address','city','state','zip');
		$postValid = snap::validatePOST( $requiredFeilds );
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
			'internship'=>snap::get_model('internship'),
			'counseling'=>snap::get_model('counseling'),
			'transcript'=>snap::get_model('transcript'),
			'pla'=>snap::get_model('pla'),
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

		$jsonObj = json_encode ($params); // this is all of the form POST data serialized
		$form_object	= $jsonObj;
		
		//var_dump($form_object);die();
		
		
		//make your db connection then
		// Create connection
		$db = snap::getDb();
	
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
			snap::redirect('intake/list');
		}
		if(isset($_POST['save'])){
			snap::redirect('intake/edit', array('id'=>$entryid ) );
		}
	}

	public function remove_Action(){
		
	}

}
