<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
    <?=generalform::getStructure('head'); ?>
</head>
<body>
    <div style="text-align:left;padding:20px">
        <?=generalform::getStructure('header');?>
		<div class="dashboard">
			<h2>Dashboard</h2>
			<div class="row">
				<div class="four columns checkbox">
							<h3>Student intake</h3>
							<a href="<?=generalform::url('intake/new');?>" class="buttons">Add new Entry</a><br/>
							<a href="<?=generalform::url('intake/list');?>" class="buttons">Look up</a><br/>
							<a href="<?=generalform::url('search');?>" class="buttons">Run reports</a><br/>
							<br/>
				</div>
				<div class="four columns checkbox leftborder">
							<h3>Outreach</h3>
							<a href="<?=generalform::url('outreach');?>" class="buttons">Add new Entries</a><br/>
							<!--<a href="list.php" class="buttons strike">Look up</a><br/>
							<a href="search.php" class="buttons strike">Run reports</a><br/>
							<b>COMING SOON</b>-->
				</div>
				<div class="four columns checkbox leftborder">
							<h3>Busniess interactions</h3>
							<a href="<?=generalform::url('biz');?>" class="buttons ">Add new CRM Entries</a><br/>
							<a href="#" class="buttons strike">Look up</a><br/>
							<a href="#" class="buttons strike">Run reports</a><br/>
							<b>COMING SOON</b>	
				</div>
			</div><hr/>

		</div>

    </div>
</body>

</html> 