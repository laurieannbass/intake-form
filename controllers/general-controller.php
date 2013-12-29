<?php

    function validatePOST($required=array()){
        $valid=true;
        foreach($required as $watch){
            if(!in_array($watch,$_POST) || (isset($_POST[$watch])&&empty($_POST[$watch])) ){
               $valid=false; 
            }
        }
        return $valid;
    }





    /* messaging */
    function setMessage($message,$level="warn"){
        session_start();
        
        switch($level) {
            case "warn":
                $_SESSION['warnings']=$message;
                break;
            case "err":
                $_SESSION['errors']=$message;
                break;    
        }
    }
    function getMessage(){
        if(isset($_SESSION['errors']))echo '<h3 class="error">'.$_SESSION['errors']."</h3>";
        if(isset($_SESSION['warnings']))echo '<h3 class="warnings">'.$_SESSION['warnings']."</h3>";
        
        if(isset($_SESSION['errors']))unset($_SESSION['errors']);
        if(isset($_SESSION['warnings']))unset($_SESSION['warnings']);
    }





?>