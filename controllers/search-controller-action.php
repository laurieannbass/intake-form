<?php
    require_once('controllers/general-controller.php');
	//make your db connection then
	// Create connection
	$dbname = 'Intake';
	$connection = mysqli_connect('localhost', 'root', 'blank',$dbname);
	if (!$connection) {
	   die('Could not connect: ' . mysqli_connect_error());
	}
	echo 'Connected successfully<br/>';
	
    $table = 'formdata';
	if(isset($_POST['all'])){
		$query = "SELECT * FROM `".$table."`";
	}else{
		$query = "SELECT * FROM `".$table."` WHERE ";
		$where_query="";
		if(isset($_POST['uh-id'])&&!empty($_POST['uh-id'])){
			$uh_id = mysqli_real_escape_string($connection, $_POST['uh-id']);
			$where_query .= (($where_query!="")?" AND ":"" ).sprintf(" `uh_id`='%s' ",$uh_id);
		}

		$query = $query.$where_query;
	}
	//echo $query;
	$result = $connection->query($query) or die($connection->error.__LINE__);
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
			if(is_array($v)){
				$v='"'.implode(',',$v).'"';
			}
			$formvalue[]=$v;
		}
		$formvalue[]=$row['creation_date'];
		$list[]=$formvalue;
		
		
		$creation_date = $row['creation_date'];
		/*
			echo "uh_id::".$row['uh_id']."</br>";	
			echo "Last Name::".$row['last_name']."</br>";
            echo "First Name::".$row['first_name']."</br>";		
			echo "Birth Date::".$row['birth_date']."</br>";
			echo "Address::".$row['address']."</br>";	
			echo "City::".$row['city']."</br>";	
			echo "State::".$row['state']."</br>";	
			echo "Zip::".$row['zip']."</br>";	
			
			echo "form-object::</br>";	
			var_dump();
			echo "</br>";	
			echo "creation_date::".."</br>";
		*/
		$i++;
		}
	}

	else {

		echo 'NO RESULTS';	

	}

$fp = fopen($file, 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
	echo "<h2>The CSV</h2>".file_get_contents($file);
	
	//echo $results;
	/*while ($row=mysqli_fetch_arry($result)){
		echo $row['id']."". $row['last_name']."".$row['first_name'] ."|". $row['birth_date']."|".$row['address'] ."|". $row['city']."|".$row['state'] ."|". $row['zip']."|".$row['form_object'] ."|". $row['creation_date'];
		echo "<br/>";
   }*/
	
	mysqli_close($connection);