<!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
    <div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
        <form name='input' action='form.php' class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" novalidate>
       
			<?php 
				echo '<input type="hidden" value="'.(isset($_GET['id'])?$_GET['id']:"").'" name="id"/>';
               if( isset($_GET['id']) && isset($first_name) ){
                    echo "<h4>Entry for $last_name, $first_name</h4>"; 
                    
               }else{
                   echo "<h4>Adding a new entry</h4>";
               }
            ?>
            <div class="uitabs">
                <ul>
                    <li><a href="#intake">Intake</a></li>
                    <li><a href="#counseling">Counseling</a></li>
                    <li><a href="#transcript-evaluation">Transcript Evaluation</a></li>
					<li><a href="#pla">PLA </a></li>
					
                    <li><a href="#internship">Internship</a></li>
                    <li><a href="#notes">Notes</a></li>
                </ul>
                <div id="intake">      
                    
                        <header id="header" class="info">
                           <h2>INTAKE FORM</h2>
                           <div>Enter the information to completion as best you can.</div>
                        </header>
                        <h3 class="block_header">Contact Information</h3>
                        <?php include_once('veiws/pages/assest/intakeform.php') ?>
                        <input type='submit' value='Submit'><input type="submit" value="cancel" name="endit" />
                </div>
                           
                        
                <div id="counseling">
                    <h2>Counseling information</h2>
                    <hr/>
                    <?php include_once('veiws/pages/assest/counselingform.php') ?><br/>
                    <input type='submit' value='Submit'><input type="submit" value="cancel" name="endit" />
                </div>  
                <div id="transcript-evaluation">
                    <h2>Transcript Evaluation</h2>
                    <hr/>
                    <?php include_once('veiws/pages/assest/transcriptform.php') ?><br/>
                    <input type='submit' value='Submit'><input type="submit" value="cancel" name="endit" />
                </div> 
                <div id="pla">
                    <h2>Prior Learning Assessment</h2>
                    <hr/>
                    <?php include_once('veiws/pages/assest/plaform.php') ?><br/>
                    <input type='submit' value='Submit'><input type="submit" value="cancel" name="endit" />
                </div>
                <div id="internship">
                    <h2>Internship information</h2>
                    <hr/>
                    <?php include_once('veiws/pages/assest/internshipform.php') ?><br/>
                    <input type='submit' value='Submit'><input type="submit" value="cancel" name="endit" />
                </div>
                <div id="notes">
                    <h2>Notes</h2>
                    <hr/>
                    <?php include_once('veiws/pages/assest/notesform.php') ?><br/>
                    <input type='submit' value='Submit'><input type="submit" value="cancel" name="endit" />
                </div>
            </div>
        </form>
    </div>
</body>

</html> 