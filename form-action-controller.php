<?php
//string json_encode ( mixed $value [, int $options = 0 [, int $depth = 512 ]] )
	echo "form was filled out<br/>";

	
	
	/* this is the basics not ideals
	-----------------------------
	|         table:formdata    |
	-----------------------------
	| id int(11) Primary key not null auto increment
	| uh_id var(8)		     	|
	| last_name  var(255)		|
	| first_name var(255)		|
	| brith_date var(255) 		|
	| address var(255)          |
	| city var(255)             |
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
		} else {
		  echo "Error creating database: " ;
		  die();
		}
	}
	//check for table
	// Select 1 from table_name will return false if the table does not exist.    
     $val = mysql_query('select 1 from `table_name`')
	 {   //do something it exists
	 }
	 else{ //I cant find it...
	 }

if($val !== FALSE)
{
   //DO SOMETHING! IT EXISTS!
}
else
{
    //I can't find it...
}
	
	//if table not exists create


	
	//insert row
	
	
	
	
	//if can't find the database, create
	//insert your row
	//then close db connect
	echo "<h1>Thank you for filling the form out bra</h1>";
	
	
	/*
	For the output stage, a simple example
	this is an example of when we read from db adn 
	then we take the data and prep it to output
	
	echo $jsonObj;
	$jsonExpandedObj = json_decode ($jsonObj);
	var_dump($jsonExpandedObj);
	//example single call
	$jsonExpandedObj['uh-id'];
	
	//an example of iterating over the json array
	foreach($jsonExpandedObj as $k=>$v){
		if(is_array($v))$v = implode(",",$v); // check to see if it's an array and handle
		echo $k . " :: " . $v ."\n";
	}
	
	
	*/
	mysqli_close($connection);