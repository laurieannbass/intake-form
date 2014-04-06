<?php
require_once('models/crm.php');
class crm_controller{
	public function __construct() {
		
		//load models
		//set action
	}

	public static function list_Action(){
		global $params;
		$db = snap::getDb(DB_NAME);
		$table = 'crm_data';
		
		
		$query = "SELECT * FROM `".$table."`";
		$result = $db->query($query) or die($db->error.__LINE__);
	
		if(!isset($_POST['download'])){
			$query_results = array ();
			if($result->num_rows > 0) {
				$i=0;
				while($row = $result->fetch_assoc()) {
					$form = (array)json_decode($row['form_object']);
					$query_results[]=array(
						'id'=>$row['id'],
						'contact__organization_name'=>"{$form['contact__organization_name']}"
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
		return snap::getPage("crm_list",$params);
	}

	public static function new_Action(){
		return self::edit_Action(0);
	}

	public static function edit_Action($id=0){
		global $params;
		
		if(isset($params['id']) && $params['id']>0){
			$entry= crm_model::getEntry($params['id']);
			
			$formData = json_decode ($entry['form_object']);
			$params["entry"]=$formData;
		}
		if(count($_POST)>0){
			snap::setMessage("First, Last Name, Resident Address, birthday and Phone number are required fields and must be filled in.","err");
		}
		return snap::getPage("crm",$params);
	}
	
	public static function save_Action(){
		global $params;

		if( count($_POST)>0 ){
			if(isset($_POST['endit'])){
				snap::redirect('dashboard', array() );	
			}
		}
		
		
		$models = crm_model::get_models();
		$requiredFeilds = snap::get_required($models);
		
		$postValid = snap::validatePOST( $requiredFeilds );
		if(!$postValid){
			self::edit_Action($id=0);
		}
		
		$entryid=isset($_POST['id'])&&$_POST['id']>0?$_POST['id']:0;
		foreach($_POST as $key=>$value){
			   $$key=$value;
			   $params[$key]=$value;
		}

		$creation_date 	= strtotime("now");
		


		$jsonObj = json_encode ($params); // this is all of the form POST data serialized
		$form_object	= $jsonObj;

		$db = snap::getDb();
	
		//is type a boolane? and is equal to false is the same as === false
		if ($db->select_db(($db==null?DB_NAME:$db)) === false) {
			echo "Error connecting too database: " ;
			die();
		}
		//check for table
		// Select 1 from table_name will return false if the table does not exist.   
		
		$table = 'crm_data';
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
		//,$creation_date,,,$first_name,$birth_date,$address,$city,$zip
		//now insert row :D yes it will
		//do a select of the data, if it exist then do nothing
		//if not there then 
		
		$update = isset($_POST['id'])&&$_POST['id']>0;
		if($update){
			$sql = "UPDATE ".$table." SET form_object='%s' ";
		}else{
			$sql = "INSERT INTO ".$table." 
				(form_object)
				VALUES ('%s')";
		}
		$sql = sprintf(
			$sql,
			$db->real_escape_string($form_object)
		);
		if($entryid>0){
			$sql.=sprintf(" WHERE `id`=%s",$entryid);
		}
	
	
		if (mysqli_query($db,$sql)){
		  $mess="Inserted row successfully for ".$params['contact__organization_name']."<br/>";//.$sql;
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
			snap::redirect('crm/list');
		}
		if(isset($_POST['save'])){
			snap::redirect('crm/edit', array('id'=>$entryid ) );
		}
	}

	public function remove_Action(){
		
	}

}//end of validation if statement 


