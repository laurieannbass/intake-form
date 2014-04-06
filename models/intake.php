<?php

define('CRM_TABLE', "formdata");
class intake_model{
	public function __construct() {
		//load models
		//set action
	}

	public static function getEntry($id){
		$db = snap::getDb(DB_NAME);
		if($id>0){
			$query = "SELECT * FROM `".CRM_TABLE."` WHERE ".sprintf(" `id`='%s' ",$id);
		}
		$result = $db->query($query) or die($db->error.__LINE__);
	
		$query_results = array ();
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$query_results=$row;
			}
		}
		return $query_results;
	}
}