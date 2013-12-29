<?php
require_once('controllers/general-controller.php');

if(count($_POST)>0){
    require_once('controllers/search-action-controller.php');
}else{
    include_once('veiws/pages/search.php');
}//end of validation if statement 
?>