<?php
//echo phpinfo();



var_dump($_POST);

foreach($_POST as $key=>$value){
	if(is_array($value))$value=implode(",",$value);
	echo "POST VALUE::$key => $value <br/>";
}

var_dump($_GET);

foreach($_GET as $key=>$value){
	if(is_array($value))$value=implode(",",$value);
	echo "GET VALUE::$key => $value <br/>";
}

