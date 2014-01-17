<?php
    require_once('controllers/general-controller.php');
	//make your db connection then
	// Create connection
	$dbname = 'Intake';
	$db = generalform::getDb($dbname);

    $table = 'formdata';
	if(isset($_POST['all'])){
		$query = "SELECT * FROM `".$table."`";
	}else{
		$query = "SELECT * FROM `".$table."` WHERE ";
		$where_query="";
		if(isset($_POST['uh-id'])&&!empty($_POST['uh-id'])){
			$uh_id = mysqli_real_escape_string($db, $_POST['uh-id']);
			$where_query .= (($where_query!="")?" AND ":"" ).sprintf(" `uh_id`='%s' ",$uh_id);
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


// rewrind the "file" with the csv lines
fseek($fp, 0);
// tell the browser it's going to be a csv file
header('Content-Type: application/csv');
// tell the browser we want to save it instead of displaying it
header('Content-Disposition: attachement; filename="'.$file.'"');
// make php send the generated csv lines to the browser
fpassthru($fp);

/*

	echo "<h2>The CSV</h2>".file_get_contents($file);
	*/
	//echo $results;
	/*while ($row=mysqli_fetch_arry($result)){
		echo $row['id']."". $row['last_name']."".$row['first_name'] ."|". $row['birth_date']."|".$row['address'] ."|". $row['city']."|".$row['state'] ."|". $row['zip']."|".$row['form_object'] ."|". $row['creation_date'];
		echo "<br/>";
   }*/
	
	mysqli_close($db);