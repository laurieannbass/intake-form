<?php
    require_once('controllers/general-controller.php');
	//make your db connection then
	// Create connection
	$db = generalform::getDb(DB_NAME);

    $table = 'formdata';
	if(isset($_POST['all'])){
		$query = "SELECT * FROM `".$table."`";
	}else{
		$query = "SELECT * FROM `".$table."` WHERE ";
		$where_query="";
		if(isset($_POST['fromdate'])&&!empty($_POST['fromdate']) && isset($_POST['todate'])&&!empty($_POST['todate'])){
			$fromdate = mysqli_real_escape_string($db, $_POST['fromdate']);
			$todate = mysqli_real_escape_string($db, $_POST['todate']);
			$where_query .= (($where_query!="")?" AND ":"" ).sprintf(" `creation_date`>'%s' ",$fromdate);
			$where_query .= (($where_query!="")?" AND ":"" ).sprintf(" `creation_date`<'%s' ",$todate);
		}
		$query = $query.$where_query;
	}
	//echo $query;
	$result = $db->query($query) or die($db->error.__LINE__);
	$file= date ('D-d-M-Y--H-i-s',strtotime("now")  ).'.csv';

	$list = array ();
	if($result->num_rows > 0) {
		$i=0;
		while($row = $result->fetch_assoc()) {
		$form_object = json_decode($row['form_object']);
		if($i==0){
			$headers=array();
			foreach($form_object as $k=>$v){
				$headers[] = ucwords( str_replace("_"," ", str_replace("-"," ",$k) ) );
			}
			$headers[]="creation_date";
			$list[]=$headers;
		}
		
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
		$formvalue[]=$row['creation_date'];
		$list[]=$formvalue;
		
		
		$creation_date = $row['creation_date'];

		$i++;
		}
	} else {
		echo 'NO RESULTS';	
	}

$fp = fopen($file, 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}



fclose($fp);


header('Pragma: public');  // required
header('Expires: 0');  // no cache
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

header('Cache-Control: private', false);
header('Content-Type: application/csv');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($file)) . ' GMT');
header('Content-disposition: attachment; filename=' . $file . '');
header("Content-Transfer-Encoding:  binary");
header('Content-Length: ' . filesize($file)); // provide file size
header('Connection: close');
readfile($file);
exit();

/*

	echo "<h2>The CSV</h2>".file_get_contents($file);
	*/
	//echo $results;
	/*while ($row=mysqli_fetch_arry($result)){
		echo $row['id']."". $row['last_name']."".$row['first_name'] ."|". $row['birth_date']."|".$row['address'] ."|". $row['city']."|".$row['state'] ."|". $row['zip']."|".$row['form_object'] ."|". $row['creation_date'];
		echo "<br/>";
   }*/
	
	mysqli_close($db);