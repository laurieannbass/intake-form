<!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
    <div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
        <form name='input' action='http://local.general.dev/intake-form/form.php' class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" novalidate>
       
<?php 
   if( isset($_GET['id']) && isset($first_name) ){
		echo "<h4>Entry for $last_name, $first_name</h4>"; 
   }else{
	   echo "<h4>Adding a new entry</h4>";
   }
?>
       
       
       
       
       
        
<div class="uitabs">
    <ul>
        <li><a href="#intake">intake</a></li>
        <li><a href="#counseling">Counseling</a></li>
        <li><a href="#transcript-evaluation">Transcript Evaluation/ PLA </a></li>
        <li><a href="#internship">Internship</a></li>
    </ul>
    <div id="intake">      
        
            <header id="header" class="info">
               <h2>INTAKE FORM</h2>
               <div>Enter the information to completion as best you can.</div>
            </header>
            <h3 class="block_header">Contact Information</h3>
			<?php include_once('veiws/pages/assest/intakeform.php') ?>
            <input type='submit' value='Submit'>
	</div>
               
            
    <div id="counseling">
        <h2>counseling</h2>
        <h3>counseling form</h3>
        <hr/>
        <?php include_once('veiws/pages/assest/counselingform.php') ?>
        
        <input type='submit' value='Submit'>
	</div>  
    <div id="transcript-evaluation">
        <h2>Transcript Evaluation/ PLA</h2>
        <h3>her form</h3>
        <hr/>
        <?php include_once('veiws/pages/assest/transcriptform.php') ?>
        <input type='submit' value='Submit'>
	</div>        
    <div id="internship">
        <h2>Internship</h2>
        <h3>internship form</h3>
        <hr/>
        <?php include_once('veiws/pages/assest/internshipform.php') ?>
        <input type='submit' value='Submit'>
	</div>

</div>

        
        
        
        
        </form>
    </div>
</body>

</html> 