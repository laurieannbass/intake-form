<?php
class generalform {
    public static $connection = null;
    public static function validatePOST($required=array()){
        $valid=true;
        foreach($required as $watch){
            if(!isset($_POST[$watch]) || (isset($_POST[$watch]) && empty($_POST[$watch])) ){
               $valid=false; 
            }
        }
        return $valid;
    }

	public static function redirect($location){
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$location= trim($location,'/');
		$url = "http://$host$uri/$location.php";
		header("Location: $url");
		exit();
	}


    /* messaging */
    public static function setMessage($message,$level="warn"){
        session_start();
        
        switch($level) {
            case "warn":
                $_SESSION['warnings']=$message;
                break;
            case "err":
                $_SESSION['errors']=$message;
                break;    
            case "success":
                $_SESSION['success']=$message;
                break;
        }
    }
    public static function getMessage(){
        if(isset($_SESSION['errors']))echo '<h3 class="error">'.$_SESSION['errors']."</h3>";
        if(isset($_SESSION['warnings']))echo '<h3 class="warning">'.$_SESSION['warnings']."</h3>";
        if(isset($_SESSION['success']))echo '<h3 class="success">'.$_SESSION['success']."</h3>";
        if(isset($_SESSION['errors']))unset($_SESSION['errors']);
        if(isset($_SESSION['warnings']))unset($_SESSION['warnings']);
		if(isset($_SESSION['success']))unset($_SESSION['success']);
    }



    public static function makeDbConnection($db=null){
        self::$connection = mysqli_connect('localhost', 'root', 'blank', $db);
        if (!self::$connection) {
           die('Could not connect: ' . mysqli_connect_error());
        }
        return self::$connection;
    }
    public static function closeDbConnection(){
        mysqli_close(self::$connection);
    }

    public static function getDb($db=null){
        if(self::$connection==null){
           self::$connection = self::makeDbConnection($db);
        }
        return self::$connection;
    }


    public static function getEntry($id){
		$dbname = 'Intake';
		$db = generalform::getDb($dbname);
		$table = 'formdata';
		if(!isset($_POST['searchOn'])){
			$query = "SELECT * FROM `".$table."` WHERE ".sprintf(" `id`='%s' ",$id);
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



?>