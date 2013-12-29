<?php
require_once('controllers/general-controller.php');

if(count($_POST)>0){
    require_once('controllers/search-controller-action.php');
}else{
    include_once('veiws/pages/intake-search.php');
}//end of validation if statement 
?>