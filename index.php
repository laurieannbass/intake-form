<?php
	//start the app
	define('BASEDIR', dirname( __FILE__ ));

    require_once(BASEDIR.'/controllers/general-controller.php');
	return new generalform();
?>
