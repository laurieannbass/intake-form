<?php
//string json_encode ( mixed $value [, int $options = 0 [, int $depth = 512 ]] )
	echo 'form was filled out<br/>';

	
	
	/* this is the basics not ideals
	-----------------------------
	|         table:formdata    |
	-----------------------------
	| id int(11) Primary key not null auto increment
	| uh_id var(8)		     	|
	| last_name  var(255)		|
	| first_name var(255)		|
	| birth_date var(255) 		|
	| address var(255)          |
	| city var(255) 
	| State var(255)
	| zip var(10)               |
	| form_object text not null	|
	| creation_date timestamp	|	
	-----------------------------
	
	
	*/
	$jsonObj = json_encode ($_POST); // this is all of the form POST data serialized
	// we are matching now for example
	// also setting up the vars
	$uh_id			= (isset($_POST['uh-id'])) ? $_POST['uh-id'] : "";//$_POST['uh-id']

	$creation_date 	= strtotime("now");
	$form_object	= $jsonObj;
	//make your db connection then
	// Create connection

	$connection = mysqli_connect('localhost', 'root', 'blank');
	if (!$connection) {
	   die('Could not connect: ' . mysqli_connect_error());
	}
	echo 'Connected successfully<br/>';
	$dbname = 'Intake';
     
	//is type a boolane? and is equal to false is the same as === false
	if ($connection->select_db($dbname) === false) {
		$sql="CREATE DATABASE ".$dbname;
		if (mysqli_query($connection,$sql)){
		  echo "Database ".$dbname." created successfully<br/>";
		  mysqli_close($connection);//close it cause why not
		  $connection = mysqli_connect('localhost', 'root', 'blank',$dbname);
		} else {
		  echo "Error creating database: " ;
		  die();
		}
	}
	//check for table
	// Select 1 from table_name will return false if the table does not exist.   
    
    $table = 'formdata';
	$sql = "SHOW TABLES LIKE '".$table."'";
    if(@mysqli_num_rows(mysqli_query($connection,$sql))==1) {
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
				`birth_date` varchar(255) NOT NULL,
				`address` varchar(255) NOT NULL,
				`city` varchar(255)     NOT NULL,
				`state` varchar(255) NOT NULL,
				`zip` varchar(10)  NOT NULL,
				`form_object` text,
				`creation_date` timestamp,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1
		";
		if (mysqli_query($connection,$sql)) {
		  echo "table ".$table." created successfully<br/>";
		} else {
		  echo "Error creating table: run it again<br/>" ;
		  echo $connection->error;
		}
	}
	//,$creation_date,,,$first_name,$birth_date,$address,$city,$zip
	//now insert row :D yes it will
	//do a select of the data, if it exist then do nothing
	//if not there then 
	$sql = sprintf(
        "INSERT INTO ".$table." 
		(uh_id,first_name,last_name,birth_date,address,city,state,zip,form_object)
		VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')",
        $connection->real_escape_string($uh_id),
		$connection->real_escape_string($first_name),
		$connection->real_escape_string($last_name),
		$connection->real_escape_string($birth_date),
		$connection->real_escape_string($address),	
		$connection->real_escape_string($city),
		$connection->real_escape_string($state),
		$connection->real_escape_string($zip),
		$connection->real_escape_string($form_object)
		
	);


	if (mysqli_query($connection,$sql)){
	  echo "inserted row successfully  for ".$first_name." ".$last_name." ".$birth_date." ".$form_object."<br/>";
	} else {
	  echo "Error inserting rows: run it again<br/>" ;
	  echo $connection->error;
	}
	
	
	
	
	mysqli_close($connection);
