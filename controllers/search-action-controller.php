<?php

if(count($_POST)>0){
	$params=array();
	/* the models can be used to build alot of this logic.  
	If this is going to be long term then it should be abstracted! */

	//make your db connection then
	// Create connection
	$db = snap::getDb(DB_NAME);
	$where_query="";
	$from="1/1/1900";
	$to="1/1/2100"; 
	if(!isset($_POST['by_area']) || $_POST['by_area']=="select"){
		snap::setMessage("Sorry, you must select area to run the reports on.","err");
		snap::redirect('search', array() );
	}
	
	if(		!isset($_POST['fromdate'])
		||	empty($_POST['fromdate'])
		||	!isset($_POST['todate'])
		||	empty($_POST['todate'])
		){
		snap::setMessage("Sorry, you must select a valid date range.","err");
		snap::redirect('search', array() );
	}
	
	
    $table = 'formdata';
		$query = "SELECT * FROM `".$table."` ";

		if(		isset($_POST['fromdate'])
			&& !empty($_POST['fromdate'])
			&& isset($_POST['todate'])
			&& !empty($_POST['todate'])
		){
			$from = mysqli_real_escape_string($db, $_POST['fromdate']);
			$to = mysqli_real_escape_string($db, $_POST['todate']);
			if(!isset($_POST['by_area']) ){
				$where_query .= (($where_query!="")?" AND ":"" ).sprintf(" `creation_date`>'%s' ",$from);
				$where_query .= (($where_query!="")?" AND ":"" ).sprintf(" `creation_date`<'%s' ",$to );
			}
		}
		

		$countable_objects = array('internship','counseling','transcript','pla');//note this would be from model
		
		
		if(isset($_POST['by_area']) && $_POST['by_area']!=""){
			foreach($countable_objects as $code){
				if($_POST['by_area']==$code)$where_query .=  (($where_query!="")?" AND ":"" )." `${code}_object` IS NOT NULL AND `${code}_object`<>'{}'  ";
			}
		}
		$params['veteran']=false;
		if(isset($_POST['veterans']) && $_POST['veterans']==1){
			$params['veteran']=true;
			$where_query .= (($where_query!="")?" AND  (":"(" );
			$where_query .=  " `form_object` LIKE '%\"military\":\"Yes\"%' ";
			$where_query .=  " OR (`form_object` LIKE '%\"military_spouse\":\"Yes\"%' AND `form_object` LIKE '%\"va_status\":\"Eligible Spouse\"%') ";
			$where_query .= ")" ;
		}
	
		$query = $query.($where_query!=""?" WHERE ":"").$where_query;
		//var_dump($query);//die();
		//echo $query;
		$result = $db->query($query) or die($db->error.__LINE__);
	
		$query_results = array ();
		$fullquery_results = array ();
		if($result->num_rows > 0) {
			$i=0;
			while($row = $result->fetch_assoc()) {
				
				$objects = array('form','internship','counseling','transcript','pla','note');//note this would be from model
				foreach($objects as $object){
					$formData = json_decode ($row["${object}_object"]);
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
				$params["entry"]['form_object']->id=$row['id'];
				$fullquery_results[] = $params["entry"];
				
				$query_results[]=array(
					'id'=>$row['id'],
					'uh_id'=>$row['uh_id'],
					'name'=>"{$row['last_name']}, {$row['first_name']}"
				);
			}
		}
	
		mysqli_close($db);

		$unique=$params['unique']=false;
		if(isset($_POST['unique_students']))$unique=true;
		if($_POST['by_area']=="counseling")$params['Type'] = 'COUNSELING';
		if($_POST['by_area']=="internship")$params['Type'] = 'INTERNSHIP';
		if($_POST['by_area']=="transcript")$params['Type'] = 'TRANSCRIPT EVALUATION';	
		if($_POST['by_area']=="pla")$params['Type'] = 'PLA';
		
		$totals=array();
		$totals_sub=array();

		$objects = array(
			'internship'=>snap::get_model('internship'),
			'counseling'=>snap::get_model('counseling'),
			'transcript'=>snap::get_model('transcript'),
			'pla'=>snap::get_model('pla'),
		);

		foreach($objects as $code=>$model){
			if($_POST['by_area']==$code){				
				foreach($model as $key=>$item){	
					$totals[$item['lable']]=0;
				}
			}
		}
		$items=array();

		foreach($fullquery_results as $item){
			//var_dump($item);die();
			$id=$item['form_object']->id;
			$items[$id]=array();
			foreach($objects as $code=>$model){
				if($_POST['by_area']==$code){		
					$totals_sub=array();
					foreach($model as $key=>$modelitem){	
						//$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
						$totals_sub[$modelitem['lable']]=0;
					}
					if(isset($item["${code}_object"])){
						foreach($item["${code}_object"] as $citem){
							if(snap::testdate($citem->date,$from,$to)){
								foreach($model as $key=>$modelitem){	
									$objProp = '$key';
									$value = isset($citem->$key)?$citem->$key:0;
									if($modelitem['type'] == 'checkbox'){
										$value = ($value=='YES'?1:0);
										if( $value >0 && ( !$unique || $totals_sub[$modelitem['lable']]<1) )$totals_sub[$modelitem['lable']]++;
									}elseif($modelitem['type'] == 'number'){
										if( $value >0 && ( !$unique || $totals_sub[$item['lable']]<1) ) $totals_sub[$modelitem['lable']]+=$value;
									}
								}
							}
						}
					}
				}
			}
			//put the totals back together
			foreach($totals as $key=>$Titem){
				$totals[$key]=$totals[$key]+$totals_sub[$key];
			}
			$items[$id]=$totals_sub;
		}


		$params['from'] = $from;
		$params['to'] = $to;			
		//$params['results']=$fullquery_results;
		$params['query_results']=$query_results;
		$params['query']=$query;
		$params['totals']=$totals;
		$params['items']=$items;

	return snap::getPage("search_result",$params);
}else{
	return snap::getPage("search");
    //include_once('veiws/pages/outreachform.php');
}//end of validation if statement 	
?>