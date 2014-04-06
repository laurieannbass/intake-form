<?php
    foreach($params as $key=>$value){
		$$key=$value;
    }
	
?><!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
    <?=snap::getStructure('head'); ?>
</head>
<body>
    <div style="text-align:left;padding:20px">
        <?=snap::getStructure('header');?>

		<?=html_blocks::startForm(array(
			"action" => snap::url('intake/save'),
			"edit_header" => "<h4>Entry for ".(isset($last_name)?$last_name:"").", ".(isset($first_name)?$first_name:"")."</h4>",
			"new_header" => "<h4>Adding a new entry</h4>",
			"class"=>""
		));?>
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
					<?=snap::getPageSection('intake/profileform');?><br/>
					<?=html_blocks::formSubmitBlock();?>
                </div>
                <div id="counseling">
                    <h2>Counseling information</h2>
                    <hr/>
					<?=snap::getPageSection('intake/counselingform');?><br/>
					<?=html_blocks::formSubmitBlock();?>
                </div>  
                <div id="transcript-evaluation">
                    <h2>Transcript Evaluation</h2>
                    <hr/>
					<?=snap::getPageSection('intake/transcriptform');?><br/>
					<?=html_blocks::formSubmitBlock();?>
                </div> 
                <div id="pla">
                    <h2>Prior Learning Assessment</h2>
                    <hr/>
					<?=snap::getPageSection('intake/plaform');?><br/>
					<?=html_blocks::formSubmitBlock();?>
                </div>
                <div id="internship">
                    <h2>Internship information</h2>
                    <hr/>
 					<?=snap::getPageSection('intake/internshipform');?><br/>
					<?=html_blocks::formSubmitBlock();?>
                </div>
                <div id="notes">
                    <h2>Notes</h2>
                    <hr/>
 					<?=snap::getPageSection('intake/notesform');?><br/>
					<?=html_blocks::formSubmitBlock();?>
                </div>
            </div>
        <?=html_blocks::endForm();?>
    </div>
</body>

</html> 