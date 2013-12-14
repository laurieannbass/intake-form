<?php

	//make your db connection then
	// Create connection
	$dbname = 'Intake';
	$connection = mysqli_connect('localhost', 'root', 'blank',$dbname);
	if (!$connection) {
	   die('Could not connect: ' . mysqli_connect_error());
	}
	echo 'Connected successfully<br/>';
	
    $table = 'formdata';
	
	$query = "SELECT * FROM `".$table."` WHERE ";
	$where_query="";
	if(isset($_POST['uh-id'])&&!empty($_POST['uh-id'])){
		$uh_id = mysqli_real_escape_string($connection, $_POST['uh-id']);
		$where_query .= (($where_query!="")?" AND ":"" ).sprintf(" `uh_id`='%s' ",$uh_id);
	}

	$query = $query.$where_query;
	//echo $query;
	$result = $connection->query($query) or die($connection->error.__LINE__);


	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "uh_id::".$row['uh_id']."</br>";	
			echo "last_name::".$row['last_name']."</br>";	
		}
	}

	else {

		echo 'NO RESULTS';	

	}

	
	
	//echo $results;
	/*while ($row=mysqli_fetch_arry($result)){
		echo $row['id']."". $row['last_name']."".$row['first_name'] ."|". $row['birth_date']."|".$row['address'] ."|". $row['city']."|".$row['state'] ."|". $row['zip']."|".$row['form_object'] ."|". $row['creation_date'];
		echo "<br/>";
   }*/
	
	mysqli_close($connection);