<!doctype html>
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
			"action" => 'search',
			"edit_header" => "",
			"new_header" => "",
			"class"=>"",
			"form_attr"=>""
		));?>
		<header id="header" class="info">
			<h2>Run Reports</h2>
		</header>
		<ul>
			<li>
				<label>Choose an area (required):</label>
				<select name="by_area">
					<option value='select' selected>Select</option>
					<option value='counseling'>Counseling</option>
					<option value='internship'>Internship</option>
					<option value='transcript'>Transcript Evaluation</option>
					<option value='pla'>PLA</option>
				</select>
				<hr/>
			</li>
			<li>
				<label>Date Range:</label>
				<?=html_blocks::formField(array('type'=>'date','name'=>"fromdate",'label'=>false,"required"=>true,"field_attr"=>" data-end='+1d'"))?>
				to:
				<?=html_blocks::formField(array('type'=>'date','name'=>"todate",'label'=>false,"required"=>true,"field_attr"=>" data-end='+1d'"))?>
				<hr/>
			</li>           
		
			<li>
				<label>Limit to unique students:</label>
				<input type='checkbox' value='1' name="unique_students" />
				<hr/>
			</li>        
			<li>
				<label>Limit to veterans:</label>
				<input type='checkbox' value='1' name="veterans" />
				<hr/>
			</li>      
			<li>
				<input type='submit' value='Run report' name="all" />
				<hr/>
			</li>
		</ul>
		<?=html_blocks::endForm();?>
	</div>
</body>
</html>